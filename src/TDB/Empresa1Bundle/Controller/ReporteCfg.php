<?php
/**
 * Created by PhpStorm.
 * User: tomi_
 * Date: 17/10/2016
 * Time: 17:00
 */

namespace TDB\Empresa1Bundle\Controller;


class ReporteCfg
{
    /*
     * CARGA REPORTES
     */
    public function reportesAction($carpetaReporte,$nombreReporte,$render)
    {
        $options = array(
            'username' => 'MTB',
            'password' => 'dinero',
            'cache_wsdl_path' => 'C:\PATH\reportes'
        );
        $ssrs=$ssrs = new \SSRS\Report('http://192.168.1.103/ReportServer/', $options);
        $result = $ssrs->loadReport("/".$carpetaReporte."/".$nombreReporte);
        $ssrs->setSessionId($result->executionInfo->ExecutionID);

        $reporte=$ssrs->render($render); // PDF | XML | CSV
        return $reporte;


    }
}