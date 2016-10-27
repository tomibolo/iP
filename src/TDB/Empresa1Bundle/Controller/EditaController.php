<?php

namespace TDB\Empresa1Bundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TDB\Empresa1Bundle\Entity\FactMovimientos;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use TDB\Empresa1Bundle\Form\MovimientosForm;


class EditaController extends Controller
{
    private $manager = 'empresa1';
    private $repository1 = 'TDBEmpresa1Bundle:FactMovimientos';
    private $editatwig = 'TDBEmpresa1Bundle::edita.html.twig';
    private $tdb_x_movimientos = 'tdb_empresa1_movimientos';

    public function editaAction(Request $request,$id)
    {
        //Seteo Usuario Login para guardar en registro usuMod
        $user = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        //CONSTANTES
        define('titulo','Estampida | Editar');

        //Busca Datos de tabla
        $movimientosId=$this->getDoctrine()
            ->getManager($this->manager)
            ->getRepository($this->repository1)
            ->find($id);
        $em= $this->getDoctrine()->getManager($this->manager);
        $movimientos2= $em->getRepository($this->repository1)->findBy(array('estado'=>'1'),array('fecAlta' => 'DESC'));
        $paginator= $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $movimientos2, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            15/*limit per page*/
        );
        //Busca Datos de tabla
        //Crea Objeto Movimiento y Formulario para insertar

        $movimiento=new FactMovimientos();
        $fechaHoy=new \DateTime();
        $movimiento->setFecha($fechaHoy->format('d-m-Y'));
        $movimiento->setIdTipo($movimientosId->getIdTipo());
        $movimiento->setIdAplicarsea($movimientosId->getIdAplicarsea());
        $movimiento->setIdItem($movimientosId->getidItem());
        $movimiento->setIdProveedor($movimientosId->getIdProveedor());
        $movimiento->setIdMediopago($movimientosId->getIdMediopago());
        $movimiento->setNota($movimientosId->getNota());
        $movimiento->setValor($movimientosId->getValor());
        $movimiento->setConcepto($movimientosId->getConcepto());
        $movimiento->setFecAlta($movimientosId->getFecAlta());

        $form = $this->createForm(MovimientosForm::class,$movimiento)
            ->add('submit',SubmitType::class,array('label'=>'Guardar','attr'=>array('class'=>'btn btn-success btn-sm submit','onclick'=>"this.form.submit(); this.disabled=true; this.value='Sending…'; ")));

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            //Busca datos del formulario
            $fecha=$form['fecha']->getData();
            $tipo=$form['idTipo']->getData();
            $aplicarsea=$form['idAplicarsea']->getData();
            $item=$form['idItem']->getData();
            $proveedor=$form['idProveedor']->getData();
            $mediopago=$form['idMediopago']->getData();
            $nota=$form['nota']->getData();
            $concepto=$form['Concepto']->getData();
            //SETEO EL VALOR DEPENDIENDO SI ES INGRESO O EGRESO
            if($form['idTipo']->getViewData()=='2' && $form['valor']->getData()>0){
                $valor=$form['valor']->getData()*-1;
            } elseif($form['idTipo']->getViewData()=='1' && $form['valor']->getData()<0){
                $valor=$form['valor']->getData()*-1;
            } else { $valor=$form['valor']->getData(); }
            $em = $this->getDoctrine()->getManager($this->manager);
            $movimiento = $em->getRepository($this->repository1)->find($id);
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
            $movimiento->setFecMod($fechaHoy);
            $movimiento->setConcepto($concepto);
            $movimiento->setUsuMod($user);
            $em->flush();
            $this->addFlash('warning','Modificado correctamente');
            return $this->redirectToRoute($this->tdb_x_movimientos);
        }
        // replace this example code with whatever you need
        return $this->render($this->editatwig, array('id'=>$id,'titulo'=>titulo,'form'=>$form->createView(),'movimientos'=>$pagination));
    }






}


