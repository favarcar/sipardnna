<html>
<?php
// Traer los datos del NNA
    $id_cuidadores = $_GET['id_cuidadores'];
    $ingresar_mpc = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_cuidadores = '$id_cuidadores' "); 
    while ($row = mysqli_fetch_array($ingresar_mpc)) {
        $id_cuidadores31 = $row['id_cuidadores'];
        $id_tipo_documento = $row['id_tipo_documento'];
        $No_Cedula = $row['No_Cedula'];
        $Nombres = $row['Nombres_cuidadores'];
        $Apellidos = $row['Apellidos_cuidadores'];
        $Fecha_Nacimiento = $row['Fecha_Nacimiento'];
        $Edad = $row['Edad'];
        $Direccion = $row['Direccion'];
    }
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha = date("Y-m-d", $time);
?>
<!--Mostrar los datos del NNa-->
    <section class="fblanco">
        <div class="container pi3x">
        <h3 class="centrar letra n600 azulo pi">Registrar Formulario Madres, Padres o Cuidadores</h3>
            <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                <fieldset>
                <div class="form-group" style="display:none ;">
                        <label class="col-md-4 control-label letra n600 azulo" for="intinput">Codigo de M.P.C.</label>
                        <div class="col-md-8">
                            <input id="id_mpc" name="id_mpc" type="int" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_cuidadores; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de M.P.C.</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_mpc" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group" style="display:none ;">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Municipio de los hechos</label>
                    <div class="col-md-8">
                    <select name="mun_nna" id="mun_nna" disabled >
        <option value="<?php echo $id_municipio;  ?>"><?php echo  $des_municipio;  ?></option>
        <?php
	  $con2=mysqli_query($con,"select * from municipios");
	  $reg2=mysqli_fetch_array($con2);
	  do {
		  $id_mun=$reg2['id_municipio'];
		  $des_mun=$reg2['descripcion'];
		  ?>
        <option value="<?php echo $id_mun;?>" ><?php echo $des_mun;?> </option>
        <?php
	  } while($reg2=mysqli_fetch_array($con2));
	  ?>           
                    </select>
                    </div>
                    </div>                    
                    <!-- Asignación de M.P.C.-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento M.P.C.</label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_mpc" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeypress="return numeros(event)" value="<?php echo $No_Cedula; ?>" readonly>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">N. Documento N.N.A.</label>
                        <div class="col-md-8">
                            <select name="n_nna" id="n_nna" class="form-control js-example-basic-single" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con1 = mysqli_query($con, "select * from  ninnosnna");
                                $reg = mysqli_fetch_array($con1);
                                do {
                                    $id_ninnos1 = $reg['id_ninnos'];
                                    $des = $reg['No_identificacion'];
                                    $nom = $reg['Nombres'];
                                    $ape = $reg['Apellidos'];
                                ?>
                                    <option value="<?php echo $id_ninnos1; ?>"><?php echo $des." - ".$nom." ".$ape;  ?> </option>
                                <?php } while ($reg = mysqli_fetch_array($con1)); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-4 col-xs-12">
                    <button id="singlebutton" name="singlebutton" class="btn btn-warning" >Asignar Cuidador</button>
                </div>
                </fieldset>
            </form>
                                 <!-- Configuracion para que el pie de pagina no quede tan arriba-->
                                 <div class="container" style="padding-top: 37%;"></div>       
        </div>
        <?php 

         if ($_POST) { //si se ha presionado enviar
            $id_cuidadores31 = $_POST['id_mpc'];
            $No_identificacion = $_POST['num_mpc'];
            $id_ninnos1 = $_POST['n_nna'];
        
            $sqlCui="INSERT INTO `cuida`(`id_cuidadores`,`id_ninnos`) VALUES ('$id_cuidadores31','$id_ninnos1')";
            mysqli_query($con, $sqlCui);

 
         echo '<script language = javascript>
         alert("la Informacion ha sido Guardada Correctamente")
         self.location = "main.php?key=49"
         </script>'; //Alerta despues de intentar guardar el expediente sin éxito
                   
                   
         ?>
              <?php 
                  //Cerrar conexión
                   mysqli_close($con);
                }
                 ?>         
       
   </section>
    </html>
