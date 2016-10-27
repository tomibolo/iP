<?php

namespace TDB\Empresa1Bundle\Entity;

/**
 * DimProveedor
 */
class DimProveedor
{
    /**
     * @var string
     */
    private $proveedor;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set proveedor
     *
     * @param string $proveedor
     *
     * @return DimProveedor
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string
     */
    public function getProveedor()
    {
        return $this->proveedor;
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
