<?php

$xDatos = json_decode($_REQUEST["jDatos"]);

$xFechaFin = $xDatos->{'jFechaActu'};
$xFechaIni = $xDatos->{'jfechaNA'};

$xAñoSys = substr($xFechaFin, 0, 4);
$xMesSys = substr($xFechaFin, 5, 2);
$xDiaSys = substr($xFechaFin, 8, 2);

$xAñoNacimiento = substr($xFechaIni, 0, 4);
$xMesNacimiento = substr($xFechaIni, 5, 2);
$xDiaNacimiento = substr($xFechaIni, 8, 2);


if ($xMesSys < $xMesNacimiento) {

    $Años = $xAñoSys - $xAñoNacimiento - 1;
    $xEdad = $Años;
    echo json_encode($xEdad);
} else {

    $Años = $xAñoSys - $xAñoNacimiento;
    $xEdad = $Años;

    echo json_encode($xEdad);
}







/*
    $Años = $xAñoSys - $xAñoNacimiento - 1;
    $Meses = $xMesSys + 12 - $xMesNacimiento;

    if ($xDiaSys < $xDiaNacimiento) {

        $Dia = $xDiaSys + 30 - $xDiaNacimiento;
        $Meses = $Meses - 1;
    } else {

        $Dia = $xDiaSys - $xDiaNacimiento;
    }
    $xEdad = $Años . 'A ' . $Meses . 'M ' . $Dia . 'D';
    echo json_encode($xEdad);



$diff = abs(strtotime($xFechaFin) - strtotime($xFechaIni));

$years = floor($diff / (365*60*60*24));

$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$xEdad = $years . 'A ' . $months . 'M ' . $days . 'D';
    echo json_encode($xEdad);
  */
