<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Programster\JsonSchema\Types;


class Enum extends AbstractType
{
    private ?array $m_possibleValues;
    private mixed $m_default;


    /**
     *
     * @param string $name - the name of this property
     * @param array $possibleValues
     * @param mixed|null $defaultValue - When data doesn’t have a corresponding value, the value of this keyword will
     * be used instead to do the validation checks.
     */
    public function __construct(string $name, ?array $possibleValues = null, mixed $defaultValue = null)
    {
        parent::__construct($name);
        $this->m_possibleValues = $possibleValues;
        $this->m_default = $default;
    }


    public function getDataType(): \DataType
    {
        return DataType::createInteger();
    }


    public function toArray() : array
    {
        $arrayForm = [
            "type" => "enum"
        ];

        return $arrayForm;
    }

}