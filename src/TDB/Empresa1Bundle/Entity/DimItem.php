<?php

namespace TDB\Empresa1Bundle\Entity;

/**
 * DimItem
 */
class DimItem
{
    /**
     * @var string
     */
    private $item;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set item
     *
     * @param string $item
     *
     * @return DimItem
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
