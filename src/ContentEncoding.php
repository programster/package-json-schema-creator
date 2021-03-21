<?php

/*
 * An "enum" for the possible content encoding values.
 */

namespace Programster\JsonSchema;


class ContentEncoding implements \JsonSerializable
{
    private $m_value;


    public function __construct(string $value)
    {
        $this->m_value = $value;
    }


    public function createBase64() : ContentEncoding { return new ContentEncoding("base64"); }
    public function createBinary() : ContentEncoding { return new ContentEncoding("binary"); }


    public function __toString()
    {
        return $this->m_value;
    }


    public function jsonSerialize()
    {
        return $this->m_value;
    }
}