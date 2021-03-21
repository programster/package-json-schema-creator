<?php

/*
 * Test that we can create a schema.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

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

$object = new Programster\JsonSchema\Types\ObjectType(
    "Product",
    new Programster\JsonSchema\PropertyCollection(...$requiredProperties, ...$nonRequiredProprties),
    new Programster\JsonSchema\RequiredPropertiesCollection(...$requiredProperties)
);

$schema = new \Programster\JsonSchema\Schema($object, "Product Schema", "A product definition");
print($schema) . PHP_EOL;

