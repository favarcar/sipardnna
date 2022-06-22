<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("conexion/conexion.php");
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha = date("Y-m-d", $time);

//pasamos id del regimen
if(!empty($_POST["id_regimen"]))
{
   $consulta_eps = $mysqli->query("SELECT id_eps, descripcion FROM eps WHERE id_regimen = '".$_POST["id_regimen"]."' ");
   
   //construimos lista nueva dependiente
   ?>
<option value="">Seleccione eps</option>
    <?php
        while($eps = $consulta_eps->fetch_object()){
    ?>
    <option value="<?php echo $eps->id_eps; ?>"><?php echo $eps->descripcion; ?></option>
    <?php
    }
}
?>