<?php

namespace TDB\Empresa1Bundle\Entity;

/**
 * DimAplicarsea
 */
class DimAplicarsea
{
    /**
     * @var string
     */
    private $aplicarsea;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set aplicarsea
     *
     * @param string $aplicarsea
     *
     * @return DimAplicarsea
     */
    public function setAplicarsea($aplicarsea)
    {
        $this->aplicarsea = $aplicarsea;

        return $this;
    }

    /**
     * Get aplicarsea
     *
     * @return string
     */
    public function getAplicarsea()
    {
        return $this->aplicarsea;
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
