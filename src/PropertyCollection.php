<?php


namespace Programster\JsonSchema;


final class PropertyCollection implements \JsonSerializable
{
    private $m_map;


    public function __construct(Types\InterfaceType ...$types)
    {
        $this->m_keys = [];

        foreach ($types as $element)
        {
            /* @var $element Types\InterfaceType */
            if (!isset($this->m_map[$element->getName()]))
            {
                $this->m_map[$element->getName()] = $element;
            }
            else
            {
                throw new \Exception("Duplicate property '{$element->getName()}' when creating a property collection.");
            }
        }
    }


    public function getMap() : array
    {
        return $this->m_map;
    }


    public function toArrayList() : array
    {
        return array_values($this->m_map);
    }


    public function jsonSerialize()
    {
        return $this->m_map;
    }
}