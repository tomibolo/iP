<?php

namespace TDB\Empresa1Bundle\Entity;

/**
 * FactMovimientos
 */
class FactMovimientos
{
    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $concepto;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var string
     */
    private $nota;

    /**
     * @var \DateTime
     */
    private $fecAlta;

    /**
     * @var \DateTime
     */
    private $fecMod;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \TDB\Empresa1Bundle\Entity\DimTipo
     */
    private $idTipo;

    /**
     * @var \TDB\Empresa1Bundle\Entity\DimProveedor
     */
    private $idProveedor;

    /**
     * @var \TDB\Empresa1Bundle\Entity\DimMediopago
     */
    private $idMediopago;

    /**
     * @var \TDB\Empresa1Bundle\Entity\DimItem
     */
    private $idItem;

    /**
     * @var \TDB\Empresa1Bundle\Entity\DimAplicarsea
     */
    private $idAplicarsea;


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return FactMovimientos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     *
     * @return FactMovimientos
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return FactMovimientos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set nota
     *
     * @param string $nota
     *
     * @return FactMovimientos
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set fecAlta
     *
     * @param \DateTime $fecAlta
     *
     * @return FactMovimientos
     */
    public function setFecAlta($fecAlta)
    {
        $this->fecAlta = $fecAlta;

        return $this;
    }

    /**
     * Get fecAlta
     *
     * @return \DateTime
     */
    public function getFecAlta()
    {
        return $this->fecAlta;
    }

    /**
     * Set fecMod
     *
     * @param \DateTime $fecMod
     *
     * @return FactMovimientos
     */
    public function setFecMod($fecMod)
    {
        $this->fecMod = $fecMod;

        return $this;
    }

    /**
     * Get fecMod
     *
     * @return \DateTime
     */
    public function getFecMod()
    {
        return $this->fecMod;
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

    /**
     * Set idTipo
     *
     * @param \TDB\Empresa1Bundle\Entity\DimTipo $idTipo
     *
     * @return FactMovimientos
     */
    public function setIdTipo(\TDB\Empresa1Bundle\Entity\DimTipo $idTipo = null)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return \TDB\Empresa1Bundle\Entity\DimTipo
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set idProveedor
     *
     * @param \TDB\Empresa1Bundle\Entity\DimProveedor $idProveedor
     *
     * @return FactMovimientos
     */
    public function setIdProveedor(\TDB\Empresa1Bundle\Entity\DimProveedor $idProveedor = null)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \TDB\Empresa1Bundle\Entity\DimProveedor
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set idMediopago
     *
     * @param \TDB\Empresa1Bundle\Entity\DimMediopago $idMediopago
     *
     * @return FactMovimientos
     */
    public function setIdMediopago(\TDB\Empresa1Bundle\Entity\DimMediopago $idMediopago = null)
    {
        $this->idMediopago = $idMediopago;

        return $this;
    }

    /**
     * Get idMediopago
     *
     * @return \TDB\Empresa1Bundle\Entity\DimMediopago
     */
    public function getIdMediopago()
    {
        return $this->idMediopago;
    }

    /**
     * Set idItem
     *
     * @param \TDB\Empresa1Bundle\Entity\DimItem $idItem
     *
     * @return FactMovimientos
     */
    public function setIdItem(\TDB\Empresa1Bundle\Entity\DimItem $idItem = null)
    {
        $this->idItem = $idItem;

        return $this;
    }

    /**
     * Get idItem
     *
     * @return \TDB\Empresa1Bundle\Entity\DimItem
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set idAplicarsea
     *
     * @param \TDB\Empresa1Bundle\Entity\DimAplicarsea $idAplicarsea
     *
     * @return FactMovimientos
     */
    public function setIdAplicarsea(\TDB\Empresa1Bundle\Entity\DimAplicarsea $idAplicarsea = null)
    {
        $this->idAplicarsea = $idAplicarsea;

        return $this;
    }

    /**
     * Get idAplicarsea
     *
     * @return \TDB\Empresa1Bundle\Entity\DimAplicarsea
     */
    public function getIdAplicarsea()
    {
        return $this->idAplicarsea;
    }
    /**
     * @var string
     */
    private $usuAlta;

    /**
     * @var string
     */
    private $usuMod;

    /**
     * @var integer
     */
    private $estado;


    /**
     * Set usuAlta
     *
     * @param string $usuAlta
     *
     * @return FactMovimientos
     */
    public function setUsuAlta($usuAlta)
    {
        $this->usuAlta = $usuAlta;

        return $this;
    }

    /**
     * Get usuAlta
     *
     * @return string
     */
    public function getUsuAlta()
    {
        return $this->usuAlta;
    }

    /**
     * Set usuMod
     *
     * @param string $usuMod
     *
     * @return FactMovimientos
     */
    public function setUsuMod($usuMod)
    {
        $this->usuMod = $usuMod;

        return $this;
    }

    /**
     * Get usuMod
     *
     * @return string
     */
    public function getUsuMod()
    {
        return $this->usuMod;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return FactMovimientos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
