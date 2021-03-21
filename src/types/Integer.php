<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Programster\JsonSchema\Types;


class Integer extends AbstractType
{
    private ?int $m_minimum;
    private ?int $m_maximum;
    private ?int $m_multipleOf;


    /**
     *
     * @param string $name - the name of this property
     * @param string $format - e.g. "email"
     */
    public function __construct(
        string $name,
        ?int $min = null,
        ?int $max = null,
        ?int $multipleOf  = null
    )
    {
        parent::__construct($name);
        $this->m_minimum = $min;
        $this->m_maximum = $max;
        $this->m_multipleOf = $multipleOf;
    }


    public function toArray() : array
    {
        $arrayForm = [
            "type" => "integer",
        ];

        if ($this->m_description !== null)
        {
            $arrayForm['description'] = $this->m_description;
        }

        if ($this->m_minimum !== null)
        {
            $arrayForm['minimum'] = $this->m_minimum;
        }

        if ($this->m_maximum !== null)
        {
            $arrayForm['maximum'] = $this->m_maximum;
        }

        if ($this->m_multipleOf !== null)
        {
            $arrayForm['multipleOf'] = $this->m_multipleOf;
        }

        return $arrayForm;
    }
}