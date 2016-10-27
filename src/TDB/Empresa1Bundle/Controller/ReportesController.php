<?php

namespace TDB\Empresa1Bundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class ReportesController extends Controller
{
    /*
     * **********************************************
     * **********************************************
     *           GENERADORES DE URLS
      * **********************************************
     * **********************************************
     */
    private $todoreportestwig = 'TDBEmpresa1Bundle::todoreportes.html.twig';
    private $folderReport = 'Reporte_Ejemplo';
    private $reporteEgresos = 'Report2';

    public function reporteEgresosAction()
    {
        $reporteCfg=new ReporteCfg();
        $reporte = $reporteCfg->reportesAction(
            $this->folderReport, /*Directorio Reporte*/
            $this->reporteEgresos,/*Nombre Reporte*/
            'HTML4.0');/*Formato*/


        return $this->render($this->todoreportestwig, array(
            'titulo' => 'Reportes',
            'reporte' => $reporte
        ));
    }


    public function reporteEgresosExportaAction($formato)
    {
        $reporteCfg=new ReporteCfg();
        $reporte = $reporteCfg->reportesAction('Reporte_Ejemplo', $this->reporteEgresos, $formato);
        $extension = '.xls';
        if ($formato == 'PDF') {
            $extension = '.pdf';
        }
        $reporte->download($this->reporteEgresos . $extension);
    }



}