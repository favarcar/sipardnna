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
if(!empty($_POST["id_pais"]))
{
   //$sql ="SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = '" . $_POST["id_departamento"] . "'";
   $consulta_pais = $mysqli->query("SELECT id_pais, Nombre FROM paises WHERE id_pais = '".$_POST["id_pais"]."' ");
   
   //construimos lista nueva dependiente
   ?>
<option value="">Seleccionar Pais</option>
    <?php
        while($pais = $consulta_pais->fetch_object()){
    ?>
    <option value="<?php echo $pais->id_pais; ?>"><?php echo $pais->Nombre; ?></option>
    <?php
    }
}
?>