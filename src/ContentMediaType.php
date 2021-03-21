<?php

/*
 * A string is valid against this keyword if its content has the media type
 * (MIME type) indicated by the value of this keyword. If the contentEncoding
 * keyword is also specified, then the decoded content must have the indicated
 * media type. Value of this keyword must be a string.
 */

namespace Programster\JsonSchema;


class ContentMediaType
{
    private string $m_value;


    private function __construct(string $type)
    {
        $this->m_value = $value;
    }


    public function createJson() : ContentMediaType
    {
        return new ContentMediaType("application/json");
    }


    public function createText() : ContentMediaType
    {
        return new ContentMediaType("text/plain");
    }
}
