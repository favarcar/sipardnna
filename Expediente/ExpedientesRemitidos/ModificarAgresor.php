  
<!--Actualizar datos del agresor -->
<?php


$id_ninnos = $_GET['id_ninnos'];

//Traer los datos de la tabla ninnisnna


$busnna = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' ");
while ($row = mysqli_fetch_array($busnna)) {

  $id_ninnos1 = $row['id_ninnos'];
  $No_identificacion = $row['No_identificacion'];
  $Nombres = $row['Nombres'];
  $Apellidos = $row['Apellidos'];
}
  //Traer los datos de la tabla hecho_agresor
  $buscaragre = mysqli_query($con, "SELECT * FROM hecho_agresor where id_ninnos='$id_ninnos' ");
  while ($row51 = mysqli_fetch_array($buscaragre)){
    $id_victimahe = $row51['id_victimahe'];
    $victima_hecho = $row51['victima_hecho'];
    $parentesco_victima = $row51['parentesco_victima'];
    $codigo_expediente2 = $row51['codigo_expediente'];
    $id_ninnos = $row51['id_ninnos'];
    $tipos_docagresor = $row51['tipos_docagresor'];
    $documeto_agresor = $row51['documeto_agresor'];
    $nombre_agresor = $row51['nombre_agresor'];
    $apellido_agresor = $row51['apellido_agresor'];
    $edad_agresor = $row51['edad_agresor'];
    $nivel_academico = $row51['nivel_academico'];
    $telefono_agresor = $row51['telefono_agresor'];
  }

    //Traer los datos de la tabla cuida

$busnna = mysqli_query($con, "SELECT * FROM cuida where id_ninnos='$id_ninnos' ");
while ($row = mysqli_fetch_array($busnna)) {

  $id_cuida = $row['id_cuida'];
  $id_cuidanna = $row['id_cuidadores'];
  $id_ninnoscuida = $row['id_ninnos'];
}
    //Traer los datos de la tabla cuidadores

$busquecuidador = mysqli_query($con, "SELECT * FROM cuidadores where id_cuidadores='$id_cuidanna' "); 
while ($row1 = mysqli_fetch_array($busquecuidador)) {

  //// cuidadores
  $id_cuidadores = $row1['id_cuidadores'];
  $id_tipo_documento = $row1['id_tipo_documento'];
  $No_Cedula = $row1['No_Cedula'];
  $NombresCuida = $row1['Nombres_cuidadores'];
  $ApellidosCuida = $row1['Apellidos_cuidadores'];
  $Fecha_Nacimiento = $row1['Fecha_Nacimiento'];
  $Edad = $row1['Edad'];
  $Direccion = $row1['Direccion'];
  $telefono_movil = $row1['telefono_movil'];
  $correo_electronico = $row1['correo_electronico'];
  $id_parentesco = $row1['id_parentesco'];
  $id_estado = $row1['id_estado'];
  $id_estrato = $row1['id_estrato'];
  $id_etnia = $row1['id_etnia'];
  $id_genero = $row1['id_genero'];
  $id_niveleducativo = $row1['id_niveleducativo'];
  $id_regimen = $row1['id_regimen'];
  $id_eps = $row1['id_eps'];
  $id_municipio = $row1['id_municipio'];
  $id_provincia = $row1['id_provincia'];
  $id_zona = $row1['id_zona'];
  $Puntaje_Sisben = $row1['Puntaje_Sisben'];
  $fecha_cuida = $row1['fecha_cuida'];
  $id_usuario = $row1['id_usuario'];
  $id_ninos = $row1['id_ninos'];
}
?>
<section class="fblanco">
  <div class="container pi3x">
  <h3 class="centrar letra n600 azulo pi">Modificar Datos del Presunto Agresor (P.A.) </h3>
    <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
      <fieldset>
        <!-- Appended checkbox -->
        <!-- Text input-->
        <div class="col-md-6 col-sm-4 col-xs-12 form-group" style="display:none ;">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Codigo del NNA</label>
          <div class="col-md-8">
            <input id="textinput" name="cod_exp" type="text" placeholder="" class="form-control input-md" value="<?php
                                                                                                                  $busnna = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' "); 
                                                                                                               while ($row = mysqli_fetch_array($busnna)) {

                                                                                                                    echo $id_ninnos11 = $row['id_ninnos'];
                                                                                                                  } ?>" readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre del N.N.A.</label>
          <div class="col-md-8">
            <input id="textinput" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php if($Apellidos>0){echo $Apellidos;}else{echo "No tiene cuidador";} ?> <?php echo $Nombres; ?>" readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento N.N.A. </label>
          <div class="col-md-8">
            <input id="textinput" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" readonly>

          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de M.P.C.</label>
          <div class="col-md-8">
            <input id="textinput" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php  if (isset($ApellidosCuida)) {
echo $ApellidosCuida;
echo " ";
echo $NombresCuida;
} else {
echo "No tiene cuidador";
} ?> " readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. de Documento de M.P.C.</label>
          <div class="col-md-8">
            <input id="textinput" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php if (isset($No_Cedula)) {
echo $No_Cedula;
} else {
echo "No tiene cuidador";
} ?>" readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group" style="display:none">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_cuidadores</label>
          <div class="col-md-8">
          <input id="textinput" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_cuidadores ?>" readonly>
        
          </div>
        </div>


        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Victima del hecho</label>
          <div class="col-md-8">
          <select name="victima_hecho" id="textinput" class="form-control" style="text-transform: uppercase;">
            <option value="<?php  echo $victima_hecho; ?>" ><?php  echo $victima_hecho; ?></option>   
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                  </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. de Documento del P.A.</label>
          <div class="col-md-8">
            <input id="textinput" name="documeto_agresor" type="text" maxlength="10"  placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php if (isset($documeto_agresor)) {
echo $documeto_agresor;
} else {
echo "Agresor desconocido";
} ?>" >
            </select>
          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre del P.A.</label>
          <div class="col-md-8">
            <input id="textinput" name="nombre_agresor" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php  if (isset($nombre_agresor)) {
echo $nombre_agresor;

}?> " >
            </select>
          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellido del P.A.</label>
          <div class="col-md-8">
            <input id="textinput" name="apellido_agresor" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php  if (isset($apellido_agresor)) {

echo $apellido_agresor;
} ?> " >

</select>
          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad del P.A.</label>
          <div class="col-md-8">
            <input id="textinput" name="edad_agresor" type="int" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php if (isset($edad_agresor)) {
echo $edad_agresor;
} ?>" >
            </select>
          </div>
        </div>


        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel academico del P.A.</label>
          <div class="col-md-8">

            <?php

            $busqueExpe = mysqli_query($con, "SELECT * FROM nivel_escolaridad");
            while ($row1 = mysqli_fetch_array($busqueExpe)) {

              $id_niveleducativo = $row1['codigo_escolaridad'];
              $des_niv = $row1['desc_escolaridad'];
            }
            ?>

            <select name="nivel_academico" id="textinput" class="form-control" style="text-transform: uppercase;">
            <option value="<?php  echo $nivel_academico; ?>" ><?php  echo $nivel_academico; ?></option>                            
                                            <option value="SIN ESCOLARIDAD">SIN ESCOLARIDAD</option>
                                            <option value="BASICA PRIMARIA">BASICA PRIMARIA</option>
                                            <option value="BASICA SECUNDARIA">BASICA SECUNDARIA</option>
                                            <option value="EDUCACION MEDIA">EDUCACION MEDIA</option>
                                            <option value="BACHILLER">BACHILLER</option>
                                            <option value="PREGRADO">PREGRADO</option>
                                            <option value="POSTGRADO">POSTGRADO</option>
                                        </select>

            </select>
          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Número telefónico del P.A.</label>
          <div class="col-md-8">
            <input id="textinput" name="telefono_agresor" type="text" maxlength="10"  placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php if (isset($telefono_agresor)) {
echo $telefono_agresor;
} else {
echo "Agresor desconocido";
} ?>" >
            </select>
          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Vínculo con la víctima</label>
          <div class="col-md-8">
<select name="parentesco_victima" id="textinput" class="form-control" style="text-transform: uppercase;" >
                                            <option value="<?php  echo $parentesco_victima; ?>" ><?php  echo $parentesco_victima; ?></option>                            
                                            <option value="PADRE">Padre</option>
                                            <option value="MADRE">Madre</option>
                                            <option value="CUIDADOR">Cuidador/a</option>
                                            <option value="ABUELO">Abuelo/a</option>
                                            <option value="TIO">Tio/a</option>
                                            <option value="AMIGO">Amigo/a</option>
                                            <option value="CONOCIDO">Conocido/a</option>
                                            <option value="PRIMO">Primo/a</option>
                                            <option value="PROFESOR">Profesor/a</option>
                                            <option value="AGRESOR DESCONOCIDO">Agresor Desconocido/a</option>
                                            <option value="OTRO">Otro</option>
                                        </select>
            </select>
          </div>
        </div>

<br><br>
        <div class="form-group <?= $visiblemod ?>" >
                        <label class="col-md-8 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar Datos</button>
                        </div>
                    </div>
                    <div class="col-md-4">
  <!--Redireccionar a los expedientes-->
<?php echo '<a href="main.php?key=29&id_ninnos='.$id_ninnos.'"  class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Consultar"><span class="glyphicon glyphicon-arrow-left"></span> Volver a los expedientes</a>';
 ?>
                      </div>

                </fieldset>
            </form>

        </div>
    </section>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <?php
    //print_r($_POST);
        if ($_POST){ //si se ha presionado enviar

          $victima_hecho = $_POST['victima_hecho'];
          $parentesco_victima = $_POST['parentesco_victima'];
          $documeto_agresor = $_POST['documeto_agresor'];
          $nombre_agresor = $_POST['nombre_agresor'];
          $apellido_agresor = $_POST['apellido_agresor'];
          $edad_agresor = $_POST['edad_agresor'];
          $nivel_academico =$_POST['nivel_academico'];
          $telefono_agresor = $_POST['telefono_agresor'];



          
          mysqli_query($con, "UPDATE hecho_agresor SET 
          victima_hecho = '$victima_hecho',
          parentesco_victima = '$parentesco_victima',
          documeto_agresor = '$documeto_agresor',
          nombre_agresor = '$nombre_agresor', 
          apellido_agresor = '$apellido_agresor', 
          edad_agresor = '$edad_agresor', 
          nivel_academico= '$nivel_academico',
          telefono_agresor = '$telefono_agresor' 

          
          WHERE id_victimahe='$id_victimahe'");

          mysqli_close($con);
            

          echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "main.php?key=53&id_ninnos='.$id_ninnos.'"
</script>';
      }
      ?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function(b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
      function() {
        (b[l].q = b[l].q || []).push(arguments)
      });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = '//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
  }(window, document, 'script', 'ga'));
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- PNotify -->
    <script src="css/pnotify/dist/pnotify.js"></script>
    <script src="css/pnotify/dist/pnotify.buttons.js"></script>
    <script src="css/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ui-pnotify').remove();
        });
    </script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>


</body>

</html>