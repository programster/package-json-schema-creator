<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Programster\JsonSchema\Types;


class StringType extends AbstractType
{
    private ?\Programster\JsonSchema\Format $m_format;
    private ?int $m_minLength;
    private ?int $m_maxLength;
    private ?string $m_pattern;
    private ?\Programster\JsonSchema\ContentMediaType $m_contentMediaType;
    private ?\Programster\JsonSchema\ContentEncoding $m_contentEncoding;


    /**
     *
     * @param string $name - the name of this property
     * @param string $pattern - A string is valid against this keyword if it matches the regular expression specified by the value of this keyword. Value of this keyword must be a string representing a valid regular expression.
     * @param string $format - e.g. "email"
     * @param int|null $minLength
     * @param int|null $maxLength
     * @param ContentEncoding|null $contentEncoding
     */
    public function __construct(
        string $name,
        ?string $pattern = null,
        ?\Programster\JsonSchema\Format $format = null,
        ?int $minLength = null,
        ?int $maxLength = null,
        ?\Programster\JsonSchema\ContentEncoding $contentEncoding = null,
        ?\Programster\JsonSchema\ContentMediaType $contentMediaType = null
    )
    {
        parent::__construct($name);
        $this->m_format = $format;
        $this->m_minLength = $minLength;
        $this->m_maxLength = $maxLength;
        $this->m_pattern = $pattern;
        $this->m_contentEncoding = $contentEncoding;
        $this->m_contentMediaType = $contentMediaType;
    }


    public function toArray(): array
    {
        $arrayForm = array(
            'type' => "string"
        );

        if ($this->m_format !== null)
        {
            $arrayForm['format'] = $this->m_format;
        }

        if ($this->m_maxLength !== null)
        {
            $arrayForm['maxLength'] = $this->m_maxLength;
        }

        if ($this->m_minLength !== null)
        {
            $arrayForm['minLength'] = $this->m_minLength;
        }

        if ($this->m_pattern !== null)
        {
            $arrayForm['pattern'] = $this->m_pattern;
        }

        if ($this->m_contentEncoding !== null)
        {
            $arrayForm['contentEncoding'] = (string)$this->m_contentEncoding;
        }

        if ($this->m_contentMediaType !== null)
        {
            $arrayForm['contentMediaType'] = (string)$this->m_contentMediaType;
        }

        return $arrayForm;
    }

}