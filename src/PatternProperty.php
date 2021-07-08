<?php

/*
 * A pattern property for validating an object
 * This is useful when you don't necessarily know what the property of the object is going to be called,
 * probably because this object is a map, rather than a list. E.g. the properties could be the IDs of the objects,
 * such as random UUIDs or integer values etc.
 * Refer here for more info: https://json-schema.org/understanding-json-schema/reference/object.html#pattern-properties
 */


namespace Programster\JsonSchema;


class PatternProperty implements \JsonSerializable
{
    private Types\InterfaceType $m_type;
    private string $m_regexp;


    public function __construct(string $regexp, Types\InterfaceType $type)
    {
        $this->m_regexp = $regexp;
        $this->m_type = $type;
    }

    
    public function toArray()
    {
        return array($this->getRegexp() => array($this->m_type));
    }


    public function jsonSerialize(): array
    {
        return $this->toArray();
    }


    # Accessors
    public function getRegexp() : string { return $this->m_regexp; }
    public function getType() : Types\InterfaceType { return $this->m_type; }
}