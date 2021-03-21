<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types = 1);

namespace Programster\JsonSchema\Types;


abstract class AbstractType implements InterfaceType, \JsonSerializable
{
    protected string $m_name;


    public function __construct(string $name)
    {
        $this->m_name = $name;
    }


    public function getName() : string
    {
        return $this->m_name;
    }


    public function __toString()
    {
        return json_encode($this);
    }


    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
