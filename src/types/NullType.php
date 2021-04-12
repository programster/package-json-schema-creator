<?php


namespace Programster\JsonSchema\Types;


final class NullType extends AbstractType
{
    public function __construct(
        string $name
    )
    {
        parent::__construct($name);
    }


    public function toArray() : array
    {
        $arrayForm = [
            "type" => "null",
        ];

        return $arrayForm;
    }
}
