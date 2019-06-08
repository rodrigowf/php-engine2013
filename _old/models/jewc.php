<?php

class Jewc extends appModel 
{

    function countdown($end) {
        $start  = date("Y-m-d");
        $start = explode("-",$start);
        $startDay = $start[2];
        $startMonth = $start[1];
        $startYear = $start[0];

        $end = explode("-",$end);
        $endDay = $end[2];
        $endMonth = $end[1];
        $endYear = $end[0];

        $daysDiff = (30-$startDay)+($endDay) + 3; //esse "+3" é puramente arbitrário para fazer com que o contador fique na data que eu quero, não usem essa função sem deixá-la mais genérica antes (DICA: tem q contar os meses q tem 31 dias)
        $monthDiff = ($endMonth-$startMonth - 1);
        $yearDiff = ($endYear-$startYear);

        $diffInDays = $daysDiff + ($monthDiff * 30) + ($yearDiff * 365) ;

        return $diffInDays;
    }

    public function validaEmailNewsletter($mail){

        $validacao = array(
            "email" => array("rule" => "is_email", "msg" => "Can't be empty")
            );

        return parent::valida($validacao,$mail);
    }


}