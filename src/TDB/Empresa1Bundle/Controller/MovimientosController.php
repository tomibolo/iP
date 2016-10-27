<?php

namespace TDB\Empresa1Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TDB\Empresa1Bundle\Entity\FactMovimientos;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use TDB\Empresa1Bundle\Form\MovimientosForm;


class MovimientosController extends Controller
{
    private $manager = 'empresa1';
    private $repository1 = 'TDBEmpresa1Bundle:FactMovimientos';
    private $folderReport = 'Empresa1';
    private $tdb_x_movimientos = 'tdb_empresa1_movimientos';


    private $indextwig = 'TDBEmpresa1Bundle::index.html.twig';
    private $movimientostwig = 'TDBEmpresa1Bundle::movimientos.html.twig';
    private $editatwig = 'TDBEmpresa1Bundle::edita.html.twig';
    private $todoreportestwig = 'TDBEmpresa1Bundle::todoreportes.html.twig';


    public function indexAction(Request $request)
    {
        //constantes
        define('titulo','Estampida');

        // replace this example code with whatever you need
        return $this->render($this->indextwig, array('titulo'=>titulo));
    }


    public function movimientosAction(Request $request)
    {
        $reporteCfg=new ReporteCfg();
        $form= $this->insertaAction($request);
        $movimientos= $this->listarAction($request);
        $reporte=$reporteCfg->reportesAction(
                $this->folderReport, /*Directorio Reporte*/
                'Movimientos',/*Nombre Reporte*/
                'HTML4.0');/*Formato*/
        //Redirecciono para blanquear campos del formulario
        if ($form->isValid()){
            return $this->redirectToRoute($this->tdb_x_movimientos);
        }

        return $this->render($this->movimientostwig,array(
            'form'=>$form->createView(),
            'movimientos'=>$movimientos,
            'titulo'=>'Estampida',
            'reporte'=>$reporte
        ));
    }
    

    public function borraAction($id)
    {
        $em=$this->getDoctrine()->getManager($this->manager);
        $movimiento = $em->getRepository($this->repository1)->find($id);
        $movimiento->setEstado('2');
        $em->flush();
        $this->addFlash('error','Eliminado correctamente');
        return $this->redirectToRoute($this->tdb_x_movimientos);


    }

    public function listarAction (Request $request)
    {

        $em= $this->getDoctrine()->getManager($this->manager);
        $movimientos= $em->getRepository($this->repository1)->findBy(array('estado'=>'1'),array('fecAlta' => 'DESC'));
        $paginator= $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $movimientos, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            15/*limit per page*/
        );
        return $pagination;

    }



    public function insertaAction ($request)
    {
        //Seteo Usuario Login para guardar en registro usuAlta y usuMod
        $user = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        //Crea Objeto Movimiento y Formulario para insertar

        $movimiento=new FactMovimientos();
        $fechaHoy=new \DateTime();
        $movimiento->setFecha($fechaHoy->format('d-m-Y'));
        $form = $this->createForm(MovimientosForm::class,$movimiento)
                     ->add('submit',SubmitType::class,array('label'=>'Agregar','attr'=>array('class'=>'btn btn-success btn-sm submit','onclick'=>"this.form.submit(); this.disabled=true; this.value='Sending…'; ")));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            //Busca datos del formulario

            $fecha=$form['fecha']->getData();
            $tipo=$form['idTipo']->getData();
            $aplicarsea=$form['idAplicarsea']->getData();
            $item=$form['idItem']->getData();
            $proveedor=$form['idProveedor']->getData();
            $mediopago=$form['idMediopago']->getData();
            $concepto=$form['Concepto']->getData();
            $nota=$form['nota']->getData();
            //SETEO EL VALOR DEPENDIENDO SI ES INGRESO O EGRESO
            if($form['idTipo']->getViewData()=='2' && $form['valor']->getData()>0){
                $valor=$form['valor']->getData()*-1;
            } elseif($form['idTipo']->getViewData()=='1' && $form['valor']->getData()<0){
                $valor=$form['valor']->getData()*-1;
            } else { $valor=$form['valor']->getData(); }

            //Modifica formato por validacion de string a date
            $date = new \DateTime($fecha.' 00:00:00');
            $date->format('Y-m-d H-i-s');
            //Setea datos a entidad $movimientos
            $movimiento->setFecha($date);
            $movimiento->setIdTipo($tipo);
            $movimiento->setIdAplicarsea($aplicarsea);
            $movimiento->setIdItem($item);
            $movimiento->setIdProveedor($proveedor);
            $movimiento->setIdMediopago($mediopago);
            $movimiento->setValor($valor);
            $movimiento->setNota($nota);
            $movimiento->setFecAlta($fechaHoy);
            $movimiento->setFecMod($fechaHoy);
            $movimiento->setConcepto($concepto);
            $movimiento->setUsuAlta($user);
            $movimiento->setUsuMod($user);
            $movimiento->setEstado('1');

            $em = $this->getDoctrine()->getManager($this->manager);
            $em->persist($movimiento);
            $em->flush();
            $this->addFlash('notice','Agregado correctamente');
        }
        return $form;
    }





}


