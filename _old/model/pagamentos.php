<?php

class Pagamentos extends appModel 
{
	public function dataBoleto($incremento)
	{
        $hoje  = date("m");
        $vencimento = $hoje+$incremento;

        return "15/".$vencimento."/2012";
    }

    public function calculaParcela($parcelas, $pacote, $idUsuario )
    {

        $day = date("d");
        $month = date("m");

        if($day > "15"){
            $month = $month + 1;
        }


        switch($pacote){
            case 1:
                break;
            case 2:
                break;
            case 3:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        460;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        230;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        230;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        153.35;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        153.35;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        153.30;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        115;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        115;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        115;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        115;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 4:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        480;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        240;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        240;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        160;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        160;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        160;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        120;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        120;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        120;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        120;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 5:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        500;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        250;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        250;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        168;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        166;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        166;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        125;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        125;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        125;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        125;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 6:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        460;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        230;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        230;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        153.35;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        153.35;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        153.30;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        115;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        115;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        115;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        115;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 7:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        460;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        230;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        230;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        153.35;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        153.35;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        153.30;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        115;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        115;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        115;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        115;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 8:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        460;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        230;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        230;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        153.35;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        153.35;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        153.30;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        115;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        115;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        115;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        115;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 9:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        460;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        230;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        230;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        153.35;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        153.35;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        153.30;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        115;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        115;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        115;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        115;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 10:
                switch($parcelas){
                    case 1:
                        $retorno[0]['pagamentos']['valor'] =        322;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 2:
                        $retorno[0]['pagamentos']['valor'] =        161;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        161;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 3:
                        $retorno[0]['pagamentos']['valor'] =        108;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        107;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        107;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                    case 4:
                        $retorno[0]['pagamentos']['valor'] =        80.5;
                        $retorno[0]['pagamentos']['parcelaNum'] =   1;
                        $retorno[0]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[0]['pagamentos']['idUsuario'] =    $idUsuario;
                        $retorno[0]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[1]['pagamentos']['valor'] =        80.5;
                        $retorno[1]['pagamentos']['parcelaNum'] =   2;
                        $retorno[1]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[1]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[1]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[2]['pagamentos']['valor'] =        80.5;
                        $retorno[2]['pagamentos']['parcelaNum'] =   3;
                        $retorno[2]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[2]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[2]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        $retorno[3]['pagamentos']['valor'] =        80.5;
                        $retorno[3]['pagamentos']['parcelaNum'] =   4;
                        $retorno[3]['pagamentos']['numParcelas'] =  $parcelas;
                        $retorno[3]['pagamentos']['idUsuario'] =    $idUsuario;
                        $month = $month + 1;
                        $retorno[3]['pagamentos']['vencimento'] =   "2012-".$month."-15";
                        break;
                }
                break;
            case 11:
                break;

            case 66:
                break;
            case 67:
                break;
            case 68:
                break;

        }


        return $retorno;

    }

    public function setPaymentType($a,$b){
        $db = Database::singleton();
        if(is_object($db)){
            if($b == 0){
                echo "UPDATE pagamentos SET pago = 0.5 where nossoNumero = $a";
                return $db->execute("UPDATE pagamentos SET pago = 0.5 where nossoNumero = $a");
            }
            if($b == 0.5){
                echo "UPDATE pagamentos SET pago = 1 where nossoNumero = $a";
                return $db->execute("UPDATE pagamentos SET pago = 1 where nossoNumero = $a");
            }
            if($b == 1){
                echo "UPDATE pagamentos SET pago = 0 where nossoNumero = $a";
                return $db->execute("UPDATE pagamentos SET pago = 0 where nossoNumero = $a");
            }
        } else trigger_error('Não instanciou o objeto');
    }



}