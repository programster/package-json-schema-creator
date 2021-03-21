<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Programster\JsonSchema\Types;

interface InterfaceType
{
    public function getName() : string;
    public function toArray() : array;
}