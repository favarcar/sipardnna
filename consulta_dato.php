<?php

//Consulta para determinar si es posible borrar datos de la base de datos 
//Generar una alerta antes de borra una datos
include("conexion/conexion.php");
include("funshow.php");

$tabla= $_POST['tabla'];
$campo= $_POST['cconsulta'];
$dato= $_POST['dato'];
$camp_respue= $_POST['cresp'];

echo consulta_campo($tabla,$campo,$dato,$camp_respue);
//Datos a consultar nombre de la tabla, el campo, el dato y el campo de respuesta (id)


?>