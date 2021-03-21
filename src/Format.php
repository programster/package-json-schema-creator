<?php

/*
 * An "enum" to represent the different possible allowed formats.
 */

namespace Programster\JsonSchema;

class Format implements \JsonSerializable
{
    private string $m_format;


    /**
     * Create a format.
     * Refer to https://opis.io/json-schema/1.x/formats.html for more details.
     */
    private function __construct(string $format)
    {
        $this->m_format = $format;
    }


    public function __toString()
    {
        return $this->m_format;
    }


    public function jsonSerialize()
    {
        return $this->m_format;
    }


    public static function createDate() { return new Format("date"); }
    public static function createTime() { return new Format("time"); }
    public static function createDateTime() { return new Format("date-time"); }
    public static function createRegex() { return new Format("regex"); }
    public static function createEmail() { return new Format("email"); }
    public static function createIdnEmail() { return new Format("idn-email"); }
    public static function createHostname() { return new Format("hostname"); }
    public static function createIdnHostname() { return new Format("idn-hostname"); }
    public static function createIpv4() { return new Format("ipv4"); }
    public static function createIpv6() { return new Format("ipv6"); }
    public static function createJsonPointer() { return new Format("json-pointer"); }
    public static function createRelativeJsonPointer() { return new Format("relative-json-pointer"); }
    public static function createUri() { return new Format("uri"); }
    public static function createUriReference() { return new Format("uri-reference"); }
    public static function createUriTemplate() { return new Format("uri-template"); }
    public static function createIri() { return new Format("iri"); }
    public static function createIriReference() { return new Format("iri-reference"); }
}