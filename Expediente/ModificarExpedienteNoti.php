  
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<?php

$codigo_expediente = $_GET['codigo_expediente'];
//$id_ninnos = $_GET['id_ninnos'];

$busqueda50 = mysqli_query($con, "SELECT * FROM expediente where codigo_expediente='$codigo_expediente' "); //cambiar nombre de la tabla de busqueda
while ($row50 = mysqli_fetch_array($busqueda50)) {

  $codigo_expediente = $row50['codigo_expediente'];
  $Fecha_inicio_expediente = $row50['Fecha_inicio_expediente'];
  $id_ninnos = $row50['id_ninnos'];
  $id_cuidadores = $row50['id_cuidadores'];
  $id_discapacidad = $row50['id_discapacidad'];
  $id_indicador = $row50['id_indicador'];
  $id_maltrato = $row50['id_maltrato'];
  $id_victima = $row50['id_victima'];
  $Descripcion_expediente = $row50['Descripcion_expediente'];
  $id_derecho = $row50['id_derecho'];
  $Observacion = $row50['Observacion'];
  $Veredicto_Caso = $row50['Veredicto_Caso'];
  $Fecha_finalizacion_expediente = $row50['Fecha_finalizacion_expediente'];
  $id_entidad = $row50['id_entidad'];
  $id_usuario_exp = $row50['id_usuario_exp'];
  $id_estadocaso = $row50['id_estadocaso'];

?>
  <section class="fblanco">
    <input type="hidden" id="idIExp" value="<?php echo $codigo_expediente ?>">
    <div class="container ps ">
      <div class="row clearfix centrar">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <h2 class=" letra n600 azulo pi">
           <?php
            echo'<h5 class="letra n500  azulo " align="right"><a href="Expediente/expedientepdf.php?codigo_expediente='.$codigo_expediente.'" class=" btn btn-primary">Exportar PDF</a></h5>';
          ?>
            </h2>
        </div>
      </div>
    </div>
  </section>

<?php }



$busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
while ($row = mysqli_fetch_array($busqueda)) {

  $id_ninnos1 = $row['id_ninnos'];
  $No_identificacion = $row['No_identificacion'];
  $Nombres = $row['Nombres'];
  $Apellidos = $row['Apellidos'];
}
$busqueda1 = mysqli_query($con, "SELECT * FROM cuidadores where id_ninos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
while ($row1 = mysqli_fetch_array($busqueda1)) {

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
  <h3 class="centrar letra n600 azulo pi">Modificar Expediente </h3>
    <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
      <fieldset>
        <!-- Appended checkbox -->
        <!-- Text input-->
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Codigo del expediente</label>
          <div class="col-md-8">
            <input id="textinput" name="cod_exp" type="text" placeholder="" class="form-control input-md" value="<?php
                                                                                                                  $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
                                                                                                               while ($row = mysqli_fetch_array($busqueda)) {

                                                                                                                    echo $id_ninnos11 = $row['id_ninnos'];
                                                                                                                  } ?>" readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Inicio del Expediente</label>
          <div class="col-md-8">
            <input id="textinput" name="fecha_exp" type="text" placeholder="" class="form-control input-md" value="<?php echo $Fecha_inicio_expediente ?>" readonly>

          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Ni&ntilde;o, Ni&ntilde;a o Adolecente</label>
          <div class="col-md-8">
            <input id="textinput" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento N.N.A. </label>
          <div class="col-md-8">
            <input id="textinput" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" readonly>

          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Madre, Padre o Acudiente</label>
          <div class="col-md-8">
            <input id="textinput" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $ApellidosCuida ?> <?php echo $NombresCuida ?> " readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. de Documento de Madre, Padre o Acudiente</label>
          <div class="col-md-8">
            <input id="textinput" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $No_Cedula ?>" readonly>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group" style="display:none">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_cuidadores</label>
          <div class="col-md-8">
            <input id="textinput" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_cuidadores ?>" readonly>

          </div>
        </div>



        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Restablecimiento de Derechos</label>
          <div class="col-md-8">

          <?php $busqueda1 = mysqli_query($con, "SELECT * FROM derechos where id_derecho='$id_derecho' ");
              while ($row1 = mysqli_fetch_array($busqueda1)) {

                $id_derecho = $row1['id_derecho'];
                $des_derecho = $row1['descripcion_derechos'];
              }
              ?>

              <select name="derechos_exp" id="derechos_exp" required class="form-control" style="text-transform: uppercase;">
                <option value="<?php echo $id_derecho ?>"><?php echo $des_derecho ?></option>
                <?php
                $con1 = mysqli_query($con, "select * from  derechos");
                $reg = mysqli_fetch_array($con1);
                do {
                  $id_derecho = $reg['id_derecho'];
                  $des_derecho = $reg['descripcion_derechos'];
                ?>
                  <option value="<?php echo $id_derecho; ?>"><?php echo $des_derecho; ?> </option>
                <?php
                } while ($reg = mysqli_fetch_array($con1));
                ?>


            </select>

          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Discapacidad</label>
          <div class="col-md-8">
            <?php

            $busqueda1 = mysqli_query($con, "SELECT * FROM discapacidades where id_discapacidad='$id_discapacidad' ");
            while ($row1 = mysqli_fetch_array($busqueda1)) {
 
              $id_discapacidad = $row1['id_discapacidad'];
              $des_discapacidad = $row1['descripcion_discapacidades'];
            }
            ?>
            <select name="discapacidad_exp" id="discapacidad_exp" class="form-control" style="text-transform: uppercase;" required>
              <option value="<?php echo $id_discapacidad ?>"><?php echo $des_discapacidad ?></option>
              <?php
              $con55 = mysqli_query($con, "select * from  discapacidades");
              $reg55 = mysqli_fetch_array($con55);
              do {
                $id_discapacidad55 = $reg55['id_discapacidad'];
                $des_discapacidad55 = $reg55['descripcion_discapacidades'];
              ?>
                <option value="<?php echo $id_discapacidad55; ?>"><?php echo $des_discapacidad55; ?> </option>
              <?php
              } while ($reg55 = mysqli_fetch_array($con55));
              ?>

            </select>
          </div>
        </div>
            </fieldset>

   

        <div class="col-md-12 col-sm-6 col-xs-12 form-group well">
          <label>Indicadores</label>
          <table id="indicadorShowTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Id Indicador</th>
                <th>Descripción Indicador</th>
              </tr>
            </thead>
          </table>
        </div>



        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Maltrato</label>
          <div class="col-md-8">

            <?php

            $busqueda1 = mysqli_query($con, "SELECT * FROM maltratos where id_maltrato='$id_maltrato' ");
            while ($row1 = mysqli_fetch_array($busqueda1)) {

              $id_maltrato = $row1['id_maltrato'];
              $des_maltrato = $row1['descripcion_maltratos'];
            }
            ?>

            <select name="maltratos_exp" id="maltratos_exp" class="form-control" style="text-transform: uppercase;" required>
              <option value="<?php echo $id_maltrato  ?>"><?php echo $des_maltrato  ?></option>
              <?php
              $con1 = mysqli_query($con, "select * from  maltratos");
              $reg = mysqli_fetch_array($con1);
              do {
                $id_maltrato = $reg['id_maltrato'];
                $des_maltrato = $reg['descripcion_maltratos'];
              ?>
                <option value="<?php echo $id_maltrato; ?>"><?php echo $des_maltrato; ?> </option>
              <?php
              } while ($reg = mysqli_fetch_array($con1));
              ?>

            </select>
          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Victimas</label>
          <div class="col-md-8">

            <?php

            $busqueda1 = mysqli_query($con, "SELECT * FROM victimas where id_victima='$id_victima' ");
            while ($row1 = mysqli_fetch_array($busqueda1)) {

              $id_victima = $row1['id_victima'];
              $des_victima = $row1['descripcion_victimas'];
            }
            ?>

            <select name="victima_exp" id="victima_exp" class="form-control" style="text-transform: uppercase;" required>
              <option value="<?php echo  $id_victima  ?>"><?php echo  $des_victima  ?></option>
              <?php
              $con2 = mysqli_query($con, "select * from  victimas");
              $reg = mysqli_fetch_array($con2);
              do {
                $id_victima = $reg['id_victima'];
                $des_victima = $reg['descripcion_victimas'];
              ?>
                <option value="<?php echo $id_victima; ?>"><?php echo $des_victima; ?> </option>
              <?php
              } while ($reg = mysqli_fetch_array($con2));
              ?>

            </select>
          </div>
        </div>

        <!-- Text input-->
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Descripci&oacute;n</label>
          <div class="col-md-8">
            <textarea class="form-control input-md" name="descripcion_exp" required><?php echo $Descripcion_expediente ?></textarea>


          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Observaciones</label>
          <div class="col-md-8">
            <textarea class="form-control input-md" name="obs_exp" required><?php echo  $Observacion ?></textarea>


          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Veredicto del Caso</label>
          <div class="col-md-8">
            <textarea class="form-control input-md" name="veredicto_exp" required><?php echo $Veredicto_Caso ?></textarea>


          </div>
        </div>

        <!-- Text input-->
        <!-- Text input-->
        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha De Finalizaci&oacute;n del Expediente</label>
          <div class="col-md-8">

            <input id="textinput" name="finalizacion_exp" type="date" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Fecha_finalizacion_expediente ?>">
          </div>
        </div>


        <!-- Text input-->

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Entidad</label>
          <div class="col-md-8">

            <?php

            $busqueda1 = mysqli_query($con, "SELECT * FROM entidades where id_entidad='$id_entidad' ");
            while ($row1 = mysqli_fetch_array($busqueda1)) {

              $id_entidad = $row1['id_entidad'];
              $des_entidad = $row1['descripcion_entidades'];
            }
            ?>

            <select name="entidad_exp" id="entidad_exp" class="form-control" style="text-transform: uppercase;" required>
              <option value="<?php echo $id_entidad  ?>"><?php echo $des_entidad  ?></option>
              <?php
              $con3 = mysqli_query($con, "select * from  entidades");
              $reg = mysqli_fetch_array($con3);
              do {
                $id_entidad = $reg['id_entidad'];
                $des_entidad = $reg['descripcion_entidades'];
              ?>
                <option value="<?php echo $id_entidad; ?>"><?php echo $des_entidad; ?> </option>
              <?php
              } while ($reg = mysqli_fetch_array($con3));
              ?>

            </select>
          </div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado del Expediente</label>
          <div class="col-md-8">

            <?php

            $busqueda1 = mysqli_query($con, "SELECT * FROM estado_caso where id_estadocaso='$id_estadocaso' ");
            while ($row1 = mysqli_fetch_array($busqueda1)) {

              $id_estadocaso = $row1['id_estadocaso'];
              $des_estadocaso = $row1['descripcion_estado_caso'];
            }
            ?>

            <select name="estadocaso_exp" id="estadocaso_exp" class="form-control" style="text-transform: uppercase;" required>
              <option value="<?php echo $id_estadocaso  ?>"><?php echo  $des_estadocaso  ?></option>
              <?php
              $estado_con = mysqli_query($con, "select * from  estado_caso");
              $reg = mysqli_fetch_array($estado_con);
              do {
                $id_estadocaso = $reg['id_estadocaso'];
                $des_estadocaso = $reg['descripcion_estado_caso'];
              ?>
                <option value="<?php echo $id_estadocaso; ?>"><?php echo $des_estadocaso; ?> </option>
              <?php
              } while ($reg = mysqli_fetch_array($estado_con));
              ?>

            </select>
          </div>
        </div>

        <div class="form-group" style="display:none">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">codigo_expediente </label>
          <div class="col-md-8">
            <input id="textinput" name="id_usuario_exp" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $codigo_expediente ?>" required>

          </div>
        </div>

        <div class="col-md-12 col-sm-6 col-xs-12 form-group well">
          <label>Actuaciones</label>
          <table id="ActuacionesShpwTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Fecha Actuación</th>
                <th>Funcionario</th>
                <th>Descripcion</th>
                <th>Compromisos</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="form-group <?= $visiblemod ?>" >
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar</button>
                        </div>
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
        if (isset($_POST['singlebutton'])) { //si se ha presionado enviar

                  $fecha_exp = $_POST['fecha_exp'];
          $cod_exp = $_POST['cod_exp'];
          $cuidadores_exp = $_POST['cuidadores_exp'];
          $discapacidad_exp = $_POST['discapacidad_exp'];
          $indicadores_exp = $_POST['indicadores_exp'];
          $maltratos_exp = $_POST['maltratos_exp'];
          $victima_exp = $_POST['victima_exp'];
          $descripcion_exp = $_POST['descripcion_exp'];
          $derechos_exp = $_POST['derechos_exp'];
          $obs_exp = $_POST['obs_exp'];
          $veredicto_exp = $_POST['veredicto_exp'];
          $finalizacion_exp = $_POST['finalizacion_exp'];
          $entidad_exp = $_POST['entidad_exp'];
          $id_usuario_exp = $_POST['id_usuario_exp'];
          $estadocaso_exp = $_POST['estadocaso_exp'];


          
          mysqli_query($con, "UPDATE expediente SET 
          codigo_expediente='$codigo_expediente',
          Fecha_inicio_expediente='$fecha_exp',
          id_ninnos='$cod_exp',
          id_cuidadores='$cuidadores_exp',
          id_discapacidad='$discapacidad_exp',
          id_indicador='$indicadores_exp',
          id_maltrato='$maltratos_exp',
          id_victima='$victima_exp',
          Descripcion_expediente='$descripcion_exp',
          id_derecho='$derechos_exp',
          Observacion='$obs_exp',
          Veredicto_Caso='$veredicto_exp',
          Fecha_finalizacion_expediente='$finalizacion_exp',
          id_entidad='$entidad_exp',
          id_usuario_exp='$id_usuario_exp',
          id_estadocaso='$estadocaso_exp' 
          WHERE codigo_expediente='$codigo_expediente'");
          mysqli_close($con);
            

          echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "main.php?key=19&codigo_expediente='.$codigo_expediente.'"
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

    <script src="js/jsMenuAddNinosNinas.js"></script>

</body>

</html>