<?php

/*
 * https://opis.io/json-schema/1.x/structure.html
 */

namespace Programster\JsonSchema;


class Schema implements \JsonSerializable
{
    private string $m_schemaUrl;
    private ?string $m_id;
    private ?string $m_title;
    private ?string $m_description;
    private Types\InterfaceType $m_type;
    private ?array $m_exampleValues;


    /**
     *
     * @param string|null $id - A unique ID for a document or a document subschemas. The value of this keyword must be
     * a string representing an URI. All subschema IDs are resolved relative to the document’s ID. It is not a required
     * keyword, but we recommend you using it, as a best practice.
     *
     * @param string|null $title - Contains a short description about the validation. E.g. "Test if it is a number".
     *
     * @param DataType $type
     *
     * @param string|null $description - A long description about the validation.
     *
     * @param array $exampleValues
     */
    public function __construct(
        Types\InterfaceType $type,
        ?string $id = null,
        ?string $title = null,
        ?string $description = null,
        ?array $exampleValues = null
    )
    {
        $this->m_type = $type;
        $this->m_title = $title;
        $this->m_exampleValues = $exampleValues;
        $this->m_description = $description;
        $this->m_id = $id;
        $this->m_schemaUrl = "http://json-schema.org/draft-07/schema#";
    }


    public function __toString()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }


    public function toArray() : array
    {
        $arrayForm = array(
            '$schema' => $this->m_schemaUrl,
        );

        if ($this->m_id !== null)
        {
            $arrayForm['$id'] = $this->m_id;
        }

        if ($this->m_title !== null)
        {
            $arrayForm['title'] = $this->m_title;
        }

        if ($this->m_description !== null)
        {
            $arrayForm['description'] = $this->m_description;
        }

        foreach ($this->m_type->toArray() as $key => $value)
        {
            $arrayForm[$key] = $value;
        }

        return $arrayForm;
    }


    public function jsonSerialize()
    {
        return $this->toArray();
    }
}

