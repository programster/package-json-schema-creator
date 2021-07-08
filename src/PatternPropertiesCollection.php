<?php

declare(strict_types = 1);

namespace Programster\JsonSchema;


final class PatternPropertiesCollection extends \ArrayObject implements \JsonSerializable
{
    public function __construct(PatternProperty ...$properties)
    {
        $elemetsToInsert = array();

        foreach ($properties as $index => $element)
        {
            $elemetsToInsert[] = $element;
        }

        parent::__construct($elemetsToInsert);
    }


    public function append($value)
    {
        if ($value instanceof PatternProperty)
        {
            parent::append($value);
        }
        else
        {
            throw new Exception("Cannot append non PatternProperty to a " . __CLASS__);
        }
    }


    public function offsetSet($index, $newval)
    {
        if ($value instanceof PatternProperty)
        {
            parent::offsetSet($index, $newval);
        }
        else
        {
            throw new Exception("Cannot add a non PatternProperty value to a " . __CLASS__);
        }
    }


    public function jsonSerialize(): mixed
    {
        return $this->getArrayCopy();
    }
}