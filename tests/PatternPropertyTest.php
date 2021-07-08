<?php

/*
 * Test that we can create a schema in which we have a list of employees, who are mapped by their ID.
 * The the result is an object whose keys are the employee ID, isntead of just a list of employee objects.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

$employeeProperties = array(
    new Programster\JsonSchema\Types\StringType("id"),
    new Programster\JsonSchema\Types\StringType("first_name"),
    new Programster\JsonSchema\Types\StringType("last_name"),
    new Programster\JsonSchema\Types\Integer("age"),
);

$subObjectType = new Programster\JsonSchema\Types\ObjectType(
    "employeeObject",
    new \Programster\JsonSchema\PropertyCollection(...$employeeProperties),
    new Programster\JsonSchema\RequiredPropertiesCollection(...$employeeProperties)
);

# You need to *not* add start/end slashes on these regexp.
# always good to test with https://www.jsonschemavalidator.net/
$regexpForEmployeeId = '^[a-f0-9]{8}\-[a-f0-9]{4}\-4[a-f0-9]{3}\-(8|9|a|b)[a-f0-9]{3}\-[a-f0-9]{12}$';
$patternProperty = new Programster\JsonSchema\PatternProperty($regexpForEmployeeId, $subObjectType);
$patternPropertyCollection = new Programster\JsonSchema\PatternPropertiesCollection($patternProperty);

$myMapOfObjects = new Programster\JsonSchema\Types\ObjectType(
    "EmployeeMap",
    propertyPatterns: $patternPropertyCollection
);


$schema = new \Programster\JsonSchema\Schema($myMapOfObjects, title: "Employee map validator");

$validJsonToValidate = '{
    "93dc975e-5233-4961-8f55-442665041c2f" : {
      "id" : "93dc975e-5233-4961-8f55-442665041c2f",
        "first_name" : "Brad",
        "last_name" : "Pitt",
        "age" : 57
    },
    "93dc9a68-3dd2-425f-895b-eb0a35b51f20" : {
      "id" : "93dc9a68-3dd2-425f-895b-eb0a35b51f20",
        "first_name" : "Joanna",
        "last_name" : "Lumley",
        "age" : 75
    }
}';


$invalidJsonToValidate = '{
    "93dc975e-5233-4961-8f55-442665041c2f" : {
      "id" : "93dc975e-5233-4961-8f55-442665041c2f",
        "first_name" : "Brad",
        "last_name" : "Pitt",
        "age" : 57
    },
    "93dc9a68-3dd2-425f-895b-eb0a35b51f20" : {
      "id" : "93dc9a68-3dd2-425f-895b-eb0a35b51f20",
        "first_name" : "Joanna",
        "last_nam" : "Lumley",
        "age" : 75
    }
}';



$schemaString = (string)$schema;

print "Generated schema is: " . PHP_EOL . $schemaString . PHP_EOL;

$schemaValidator = Swaggest\JsonSchema\Schema::import(json_decode($schemaString));
$schemaValidator->in(json_decode($validJsonToValidate));


try
{
    $schemaValidator->in(json_decode($invalidJsonToValidate));
    die("Test failed - validation schema failed to pick up the typo in 'last_nam' of JSON" . PHP_EOL);
}
catch (Exception $ex)
{
    die("Test passed because schema validation picked up error in erronous JSON using the generated schema." . PHP_EOL);
}




