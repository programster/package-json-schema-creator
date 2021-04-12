<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Programster\JsonSchema\Types;

final class MultiType extends AbstractType
{
    private array $m_subTypes;


    public function __construct(string $name, InterfaceType ...$possibleTypes)
    {
        if (count($possibleTypes) < 2)
        {
            throw new \Exception("You need to provide at least two types when creating a multi-type.");
        }

        $this->m_name = $name;
        $this->m_subTypes = $possibleTypes;
    }


    public function toArray() : array
    {
        $types = [];
        $arrayForm = array();

        foreach ($this->m_subTypes as $subType)
        {
            $subTypeArrayForm = $subType->toArray();
            $subType = $subTypeArrayForm['type'];

            if (is_array($subType))
            {
                // gracefully handle a situation where someone passes a multitype to a multi-type.
                foreach ($subTypes as $subTypeType)
                {
                    if (isset($types[$subTypeType]))
                    {
                        throw new \Exception("Trying to create a multitype from two of the same types.");
                    }

                    $types[$subTypeType] = 1;
                }
            }
            else
            {
                if (isset($types[$subType]))
                {
                    throw new \Exception("Trying to create a multitype from two of the same types.");
                }

                $types[$subType] = 1;
            }
        }

        $arrayForm = [
            "type" => array_keys($types),
        ];

        // now just merge all the definitions together, which is perfectly legal
        // https://cswr.github.io/JsonSchema/spec/multiple_types/
        foreach ($this->m_subTypes as $subType)
        {
            $subTypeArrayForm = $subType->toArray();

            foreach ($subTypeArrayForm as $key => $value)
            {
                if ($key !== "type")
                {
                    $arrayForm[$key] = $value;
                }
            }
        }

        return $arrayForm;
    }

}
