<?php
include("conexion/conexion.php");
include("funshow.php");

$tabla= $_POST['tabla'];
$campo= $_POST['cconsulta'];
$dato= $_POST['dato'];
$camp_respue= $_POST['cresp'];

echo consulta_campo($tabla,$campo,$dato,$camp_respue);


?>