<?php

/*
 * Test that we can create a schema.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

$requiredProperties = array(
    new \Programster\JsonSchema\Types\StringType(name: "barcode", minLength: 12),
    new \Programster\JsonSchema\Types\StringType(name: "name", minLength: 3),
);

// brand is optional, so it may or may not be specified, and we will allow it to be specified with a value of null.
$brand = new \Programster\JsonSchema\Types\MultiType(
    "brand",
    new \Programster\JsonSchema\Types\StringType(name: "brand", minLength: 3),
    new Programster\JsonSchema\Types\NullType("brand")
);

$nonRequiredProperties = array($brand);

$object = new Programster\JsonSchema\Types\ObjectType(
    "Product",
    new Programster\JsonSchema\PropertyCollection(...$requiredProperties, ...$nonRequiredProperties),
    new Programster\JsonSchema\RequiredPropertiesCollection(...$requiredProperties)
);

$possibleItems = new Programster\JsonSchema\PropertyCollection($object);
$arrayOfItems = new Programster\JsonSchema\Types\ArrayType("Products Array", minNumItems: 1, possibleItems: $possibleItems);

$schema = new \Programster\JsonSchema\Schema($arrayOfItems, title: "Data file validator");
print($schema) . PHP_EOL;

