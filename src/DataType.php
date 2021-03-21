<?php

/*
 * https://opis.io/json-schema/1.x/structure.html
 */

namespace Programster\JsonSchema;


class DataType
{
    private string $m_type;


    private function __construct(string $type)
    {
        $this->m_type = $type;
    }


    public static function createString() : DataType { return new DataType("string"); }
    public static function createNumber() : DataType { return new DataType("number"); }
    public static function createInteger() : DataType { return new DataType("integer"); }
    public static function createBool() : DataType { return new DataType("boolean"); }
    public static function createNull() : DataType { return new DataType("null"); }
    public static function createObject() : DataType { return new DataType("object"); }
    public static function createArray() : DataType { return new DataType("array"); }


    public function __toString()
    {
        return $this->m_type;
    }
}