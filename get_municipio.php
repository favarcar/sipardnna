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

//pasamos id del departamento
if(!empty($_POST["id_departamento"]))
{
   //$sql ="SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = '" . $_POST["id_departamento"] . "'";
   $consulta_municipios = $mysqli->query("SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = '".$_POST["id_departamento"]."' ");
   
   //construimos lista nueva dependiente
   ?>
<option value="">Seleccionar Municipio</option>
    <?php
        while($municipio = $consulta_municipios->fetch_object()){
    ?>
    <option value="<?php echo $municipio->id_municipio; ?>"><?php echo $municipio->descripcion; ?></option>
    <?php
    }
}
?>