<?php

/*
 *
 */

declare(strict_types = 1);

namespace Programster\JsonSchema\Types;

class ArrayType extends AbstractType
{
    private ?int $m_minNumItems;
    private ?int $m_maxNumItems;
    private ?bool $m_containsUniqueValues;
    private ?\Programster\JsonSchema\PropertyCollection $m_possibleDataTpes;


    /**
     * Create an array property.
     * @param string $name - the name of this property.
     * @param int|null $minNumItems - optionally set a minimum number of items in the array.
     * @param int|null $maxNumItems - optionally set a maximum number of items in the array.
     * @param bool|null $containsUniqueItems - set to true if this array should only contain unique items.
     * @param DataTypeCollection|null $possibleItems
     */
    public function __construct(
        string $name,
        ?int $minNumItems = null,
        ?int $maxNumItems = null,
        ?bool $containsUniqueItems = null,
        ?\Programster\JsonSchema\PropertyCollection $possibleItems = null
    )
    {
        $this->m_minNumItems = $minNumItems;
        $this->m_maxNumItems = $maxNumItems;
        $this->m_containsUniqueValues = $containsUniqueItems;
        $this->m_possibleDataTpes = $possibleItems;
        parent::__construct($name);
    }


    public function toArray() : array
    {
        $arrayForm = [
            "name" => $this->m_name,
            "type" => "array",
        ];

        if ($this->m_description !== null)
        {
            $arrayForm['description'] = $this->m_description;
        }

        if ($this->m_minNumItems !== null)
        {
            $arrayForm["minItems"] = $this->m_minNumItems;
        }

        if ($this->m_maxNumItems !== null)
        {
            $arrayForm["maxItems"] = $this->m_maxNumItems;
        }

        if ($this->m_containsUniqueValues !== null)
        {
            $arrayForm["uniqueItems"] = $this->m_containsUniqueValues;
        }

        if ($this->m_possibleDataTpes !== null)
        {
            $arrayForm['items'] = $this->m_possibleDataTpes->toArrayList();
        }

        return $arrayForm;
    }


    # Accessors
    public function getMinNumItems(): ?int { return $this->m_minNumItems; }
    public function getMaxNumItems(): ?int { return $this->m_maxNumItems; }
    public function isUniqueItems() : ?bool { return $this->m_containsUniqueValues; }
}

