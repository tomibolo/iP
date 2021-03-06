<?php

namespace TDB\Empresa1Bundle\Entity;

/**
 * DimTipo
 */
class DimTipo
{
    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return DimTipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
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
