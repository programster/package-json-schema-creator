<?php

declare(strict_types = 1);

namespace Programster\JsonSchema\Types;


class ObjectType extends AbstractType
{
    private ?\Programster\JsonSchema\RequiredPropertiesCollection $m_requiredProperties;
    private ?\Programster\JsonSchema\PropertyCollection $m_properties;
    private ?array $m_patternProperties;


    public function __construct(
        string $name,
        ?\Programster\JsonSchema\PropertyCollection $propertyDefintions = null,
        ?\Programster\JsonSchema\RequiredPropertiesCollection $namesOfRequiredProperties = null,
        ?\Programster\JsonSchema\PatternPropertiesCollection $propertyPatterns = null,
    )
    {
        $this->m_properties = $propertyDefintions;
        $this->m_requiredProperties = $namesOfRequiredProperties;
        $this->m_patternProperties = null;

        if ($propertyPatterns !== null)
        {
            $this->m_patternProperties = array();

            foreach ($propertyPatterns as $proprtyPattern)
            {
                /* @var $proprtyPattern \Programster\JsonSchema\PatternProperty */
                $this->m_patternProperties[$proprtyPattern->getRegexp()] = $proprtyPattern->getType();
            }
        }

        parent::__construct($name);
    }


    public function toArray() : array
    {
        $arrayForm = [
            "name" => $this->m_name,
            "type" => "object",
        ];

        if ($this->m_description !== null)
        {
            $arrayForm['description'] = $this->m_description;
        }

        if ($this->m_properties !== null)
        {
            $arrayForm['properties'] = $this->m_properties;
        }

        if ($this->m_patternProperties !== null)
        {
            $arrayForm['patternProperties'] = $this->m_patternProperties;
        }

        if ($this->m_properties !== null)
        {
            $arrayForm['required'] = $this->m_requiredProperties;
        }

        return $arrayForm;
    }
}

