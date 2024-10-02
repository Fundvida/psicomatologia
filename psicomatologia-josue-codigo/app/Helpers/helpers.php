<?php
use Illuminate\Support\Carbon;

function getDateLiteral ($fechaAgenda){
    $fechaLiteral = Carbon::parse($fechaAgenda); 
    $unwanted_array = [
        'á' => 'a', 'é' => 'e'
    ];

    return strtr($fechaLiteral->locale('es')->dayName, $unwanted_array);
}