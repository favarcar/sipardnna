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

//pasamos id del municipio
if(!empty($_POST["id_municipio"]))
{
   $consulta_provincia = $mysqli->query("SELECT id_provincia, descripcion_prov FROM municipios WHERE id_municipio = '".$_POST["id_municipio"]."' ");
   
   //construimos lista nueva dependiente
   ?>
<option value="">Seleccionar Provincia</option>
    <?php
        while($provincia = $consulta_provincia->fetch_object()){
    ?>
    <option value="<?php echo $provincia->id_provincia; ?>"><?php echo $provincia->descripcion_prov; ?></option>
    <?php
    }
}
?>