<?php

declare(strict_types = 1);

namespace Programster\JsonSchema\Types;


class ObjectType extends AbstractType
{
    private ?\Programster\JsonSchema\RequiredPropertiesCollection $m_requiredProperties;
    private ?\Programster\JsonSchema\PropertyCollection $m_properties;


    public function __construct(
        string $name,
        ?\Programster\JsonSchema\PropertyCollection $propertyDefintions = null,
        ?\Programster\JsonSchema\RequiredPropertiesCollection $namesOfRequiredProperties = null,
    )
    {
        $this->m_properties = $propertyDefintions;
        $this->m_requiredProperties = $namesOfRequiredProperties;
        parent::__construct($name);
    }


    public function toArray() : array
    {
        $arrayForm = [
            "name" => $this->m_name,
            "type" => "object",
        ];

        if ($this->m_properties !== null)
        {
            $arrayForm['properties'] = $this->m_properties;
        }

        if ($this->m_properties !== null)
        {
            $arrayForm['required'] = $this->m_requiredProperties;
        }

        return $arrayForm;
    }
}

