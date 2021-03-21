<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Programster\JsonSchema\Types;


class Number extends AbstractType
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
        ?float $minimum = null,
        ?float $maximum = null,
        ?float $multipleOf = null
    )
    {
        parent::__construct($name);
        $this->m_minimum = $minimum;
        $this->m_maximum = $maximum;
        $this->m_multipleOf = $multipleOf;
    }


    public function toArray() : array
    {
        $arrayForm = [
            "type" => "number",
        ];

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