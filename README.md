JSON Schema Creator
This is a simple PHP package to make it quick and easy to generate a [JSON schema](https://json-schema.org/) 
that can then be used for validation and documentation.

## Install

```bash
composer require programster/json-schema-creator
```

## Example

```php
<?php
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
```

That would generate the following schema:

```json
{
    "$schema": "http://json-schema.org/draft-07/schema#",
    "$id": "Product Schema",
    "title": "A product definition",
    "name": "Product",
    "type": "object",
    "properties": {
        "product_name": {
            "type": "string",
            "minLength": 3
        },
        "barcode": {
            "type": "string",
            "minLength": 12
        },
        "description": {
            "type": "string",
            "minLength": 12
        }
    },
    "required": [
        "product_name",
        "barcode"
    ]
}
```

