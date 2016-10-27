<?php
/**
 * Created by PhpStorm.
 * User: tomi_
 * Date: 19/10/2016
 * Time: 18:18
 */

namespace TDB\Empresa1Bundle\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MovimientosForm extends AbstractType
{
    /*
     * CREA FORMULARIOS DE CARGA
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',TextType::class,array(    
                    'attr'=>array(
                        'class'=>'datepicker input-sm',
                        'data-provide'=>'datepicker')))

            ->add('idTipo', EntityType::class,array(
                'class'=>'TDBEmpresa1Bundle:DimTipo',
                'choice_label' => 'tipo',
                'attr'=>array(
                    'class'=>'form-control input-sm tipo')))

            ->add('idAplicarsea', EntityType::class,array(
                'class'=>'TDBEmpresa1Bundle:DimAplicarsea',
                'choice_label' => 'aplicarsea',
                'query_builder' => function (EntityRepository $er) {return $er->createQueryBuilder('u')->orderBy('u.aplicarsea','ASC');},
                'attr'=>array(
                    'class'=>'form-control input-sm aplicaa')))

            ->add('idItem', EntityType::class,array(
                'class'=>'TDBEmpresa1Bundle:DimItem',
                'choice_label' => 'item',
                'query_builder' => function (EntityRepository $er) {return $er->createQueryBuilder('u')->orderBy('u.item', 'ASC');},
                'attr'=>array(
                    'class'=>'form-control input-sm concepto')))

            ->add('Concepto', TextType::class,array(
                'required'=>false,
                'attr'=>array(
                    'class'=>'form-control input-sm nota')))

            ->add('idProveedor', EntityType::class,array(
                'class'=>'TDBEmpresa1Bundle:DimProveedor',
                'query_builder' => function (EntityRepository $er) {return $er->createQueryBuilder('u')->orderBy('u.proveedor', 'ASC');},
                'choice_label' => 'proveedor','attr'=>array(
                    'class'=>'form-control input-sm proveedor')))

            ->add('idMediopago', EntityType::class,array(
                'class'=>'TDBEmpresa1Bundle:DimMediopago',
                'choice_label' => 'mediopago',
                'attr'=>array(
                    'class'=>'form-control input-sm medio')))

            ->add('valor',NumberType::class,array(
                'attr'=>array('class'=>'form-control input-sm importe ')))

            ->add('nota', TextType::class,array(
                'required'=>false,'attr'=>array(
                    'class'=>'form-control input-sm nota')))
            ;


    }


}