<?php

namespace TDB\Empresa1Bundle\Entity;

/**
 * DimMediopago
 */
class DimMediopago
{
    /**
     * @var string
     */
    private $mediopago;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set mediopago
     *
     * @param string $mediopago
     *
     * @return DimMediopago
     */
    public function setMediopago($mediopago)
    {
        $this->mediopago = $mediopago;

        return $this;
    }

    /**
     * Get mediopago
     *
     * @return string
     */
    public function getMediopago()
    {
        return $this->mediopago;
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
