<html>


<?php
// Traer los datos del NNA
    $id_ninnos = $_GET['id_ninnos'];
    $ingresar_mpc = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_ninnos = '$id_ninnos' "); 
    while ($row = mysqli_fetch_array($ingresar_mpc)) {
        $id_ninnos1 = $row['id_ninnos'];
        $id_tipo_documento = $row['id_tipo_documento'];
        $No_identificacion = $row['No_identificacion'];
        $Nombres = $row['Nombres'];
        $Apellidos = $row['Apellidos'];
        $Fecha_Nacimiento = $row['Fecha_Nacimiento'];
        $Edad = $row['Edad'];
        $Direccion = $row['Direccion'];
        $id_genero = $row['id_genero'];
        $id_estrato = $row['id_estrato'];
        $id_niveleducativo = $row['id_niveleducativo'];
        $id_cuidadores = $row['id_cuidadores'];
        $id_departamento = $row['id_departamento'];
        $id_municipio = $row['id_municipio'];
        $id_provincia = $row['id_provincia'];
        $id_regimen = $row['id_regimen'];
        $id_eps = $row['id_eps'];
        $id_etnia = $row['id_etnia'];
        $Puntaje_Sisben = $row['Puntaje_Sisben'];
        $id_zona = $row['id_zona'];
        $fecha_ingreso = $row['fecha_ingreso'];
        $id_usuario = $row['id_usuario'];
    }
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha = date("Y-m-d", $time);
?>
<!--Mostrar los datos del NNa-->
    <section class="fblanco">
        <div class="container pi3x" >
        <h3 class="centrar letra n600 azulo pi">Asignar Madres, Padres o Cuidadores a N.N.A.</h3>
            <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                <fieldset>
                <div class="form-group" style="display:none ;">
                        <label class="col-md-4 control-label letra n600 azulo" for="intinput">Codigo de N.N.A.</label>
                        <div class="col-md-8">
                            <input id="id_nna" name="id_nna" type="int" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_ninnos; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de N.N.A.</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly>
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
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento N.N.A.</label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" readonly>
                        </div>
                    </div>    
                   <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">N. Documento M.P.C.</label>
                        <div class="col-md-8">
                            <select name="n_cuida" id="n_cuida" class="form-control js-example-basic-single" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con1 = mysqli_query($con, "select * from  cuidadores");
                                $reg = mysqli_fetch_array($con1);
                                do {
                                    $id_cuidadores31 = $reg['id_cuidadores'];
                                    $des = $reg['No_Cedula'];
                                    $nomnan = $reg['Nombres_cuidadores'];
                                    $apelli = $reg['Apellidos_cuidadores']
                                ?>
                                    <option value="<?php echo $id_cuidadores31; ?>"><?php echo $des." - ".$nomnan." ".$apelli;?> </option>
                                <?php } while ($reg = mysqli_fetch_array($con1)); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-sm-4 col-xs-12">
                    <button id="singlebutton" name="singlebutton" class="btn btn-warning" >Asignar Cuidador</button>
 
                </fieldset>

            </form>
                     <!-- Configuracion para que el pie de pagina no quede tan arriba-->
                     <div class="container" style="padding-top: 37%;"></div>            
        </div>
        <?php 

         if ($_POST) { //si se ha presionado enviar
            $id_cuidadores31 = $_POST['n_cuida'];
            $No_identificacion = $_POST['num_nna'];
            $id_ninnos1 = $_POST['id_nna'];
            $id_municipio = $_POST['mun_nna'];
        
            $sqlCui="INSERT INTO `cuida`(`id_cuidadores`,`id_ninnos`) VALUES ('$id_cuidadores31','$id_ninnos1')";
            mysqli_query($con, $sqlCui);

 
         echo '<script language = javascript>
         alert("la Informacion ha sido Guardada Correctamente")
         self.location = "main.php?key=48"
         </script>'; //Alerta despues de intentar guardar el expediente sin éxito
                   
                   
         ?>
              <?php 
                  //Cerrar conexión
                   mysqli_close($con);
                }
                 ?>         
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <script src="lib/jquery.js"></script>   
   </section>
    </html>
