<?php

declare(strict_types = 1);

namespace Programster\JsonSchema;


final class RequiredPropertiesCollection extends \ArrayObject implements \JsonSerializable
{
    public function __construct(Types\InterfaceType | string ...$elements)
    {
        $elemetsToInsert = array();

        foreach ($elements as $index => $element)
        {
            if (is_object($element))
            {
                $elemetsToInsert[] = $element->getName();
            }
            elseif (is_string($element))
            {
                print "inserting:" . print_r($element, true);
                $elemetsToInsert[] = $element;
            }
        }

        parent::__construct($elemetsToInsert);
    }


    public function append($value)
    {
        if ($value instanceof InterfaceType)
        {
            print "appending string NAME" . PHP_EOL;
            parent::append($value->getName());
        }
        elseif (is_string($value))
        {
            print "appending string directly" . PHP_EOL;
            parent::append($value);
        }
        else
        {
            throw new Exception("Cannot append non sring or InterfaceType to a " . __CLASS__);
        }
    }


    public function offsetSet($index, $newval)
    {
        if (is_string($newval))
        {
            parent::offsetSet($index, $newval);
        }
        else
        {
            throw new Exception("Cannot add a non string or InterfaceType value to a " . __CLASS__);
        }
    }

    
    public function jsonSerialize(): mixed
    {
        return $this->getArrayCopy();
    }
}