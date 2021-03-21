<?php

/*
 * Test that we can create a schema.
 */

declare(strict_types = 1);


require_once(__DIR__ . '/../vendor/autoload.php');



$number = new \Programster\JsonSchema\Types\Number("myNumber", 0);

$name = new \Programster\JsonSchema\Types\StringType(name: "product_name", minLength: 3);
$barcode = new \Programster\JsonSchema\Types\StringType(name: "barcode", minLength: 12);
$description = new \Programster\JsonSchema\Types\StringType(name: "description", minLength: 12);

$requiredProperties = array(
    $name,
    $barcode,
);

$nonRequiredProprties = array(
    $description
);

$namesOfRequiredProperties = new Programster\JsonSchema\RequiredPropertiesCollection(...$requiredProperties);
$propertyDefinitions = new Programster\JsonSchema\PropertyCollection(...$requiredProperties, ...$nonRequiredProprties);
$object = new Programster\JsonSchema\Types\ObjectType("Product", $propertyDefinitions, $namesOfRequiredProperties);
$schema = new \Programster\JsonSchema\Schema($object, "Product Schema", "A product definition");



print($schema) . PHP_EOL;

