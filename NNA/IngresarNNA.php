<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Menú Principal dos</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="stylesheet" href="../css/bootstrap.css">

  <style>
    body {
      padding-top: 0px;
      padding-bottom: 0px;
    }
  </style>

  <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>

  <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
  <?php
  include("../conexion/conexion.php");
  date_default_timezone_set('America/Bogota');
  $time = time();
  $fecha =  date("Y-m-d", $time);
  ?>



  <?php            //Iniciar Sesión
  session_start();

  //Validar si se está ingresando con sesión correctamente
  if (!$_SESSION) {
    echo '<script language = javascript>
                  alert("usuario no autenticado")
                  self.location = "index.html"
                  </script>';
  }
  $id_usuario = $_SESSION['numero_documento'];
  $consulta = "SELECT * FROM usuarios where numero_documento='$id_usuario'";
  $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
  $fila = mysqli_fetch_array($resultado);
  $nombres = $fila['nombres'];
  $apellido = $fila['apellidos'];
  ?>

  <section class="fblanco">
    <div class="container pi3x">
      <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
        <div id="registro1">
          <fieldset>
            <!-- Form Name -->
            <h3 class="centrar letra n600 azulo pi">Registrar Formulario Ni&ntilde;os Ni&ntilde;as o Adolescentes</h3>
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Motivo de Ingreso</label>
              <div class="col-md-4">
                <select name="motivo_ingreso" id="motivo_ingreso" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con11 = mysqli_query($con, "SELECT * FROM  motivoingreso");
                  $reg11 = mysqli_fetch_array($con11);
                  do {
                    $idMotivo = $reg11['id_motivo_ingreso'];
                    $desMotivo = $reg11['desc_motivo_ingreso'];
                  ?>
                    <option value="<?php echo $idMotivo; ?>"><?php echo $idMotivo; ?> <?php echo $desMotivo; ?> </option>
                  <?php
                  } while ($reg11 = mysqli_fetch_array($con11));
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
              <div class="col-md-4">
                <select name="municipio_nna" id="municipio_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con33 = mysqli_query($con, "select * from municipios");
                  $reg33 = mysqli_fetch_array($con33);
                  do {
                    $id_mun33 = $reg33['id_municipio'];
                    $des_mun33 = $reg33['descripcion'];
                  ?>
                    <option value="<?php echo $id_mun33; ?>"><?php echo $des_mun33; ?> </option>
                  <?php
                  } while ($reg33 = mysqli_fetch_array($con33));
                  ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia</label>
              <div class="col-md-4">
                <select name="provincia_nna" id="provincia_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con44 = mysqli_query($con, "select * from provincias");
                  $reg44 = mysqli_fetch_array($con44);
                  do {
                    $id_provincia44 = $reg44['id_provincia'];
                    $des_provincia44 = $reg44['descripcion'];
                  ?>
                    <option value="<?php echo $id_provincia44; ?>"><?php echo $des_provincia44; ?> </option>
                  <?php
                  } while ($reg44 = mysqli_fetch_array($con44));
                  ?>

                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de los hechos</label>
              <div class="col-md-4">
                <input id="fecha_hechos" name="fecha_hechos" type="text" placeholder="" class="form-control input-md" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Lugar de los hechos</label>
              <div class="col-md-4">
                <select name="lugar_hechos" id="lugar_hechos" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con11 = mysqli_query($con, "select * from  lugar_hechos");
                  $reg11 = mysqli_fetch_array($con11);
                  do {
                    $idLugar = $reg11['codigo_lugar'];
                    $desLugar = $reg11['desc_lugar'];
                  ?>
                    <option value="<?php echo $idLugar; ?>"><?php echo $desLugar; ?> </option>
                  <?php
                  } while ($reg11 = mysqli_fetch_array($con11));
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Vínculo con el presunto agresor/a</label>
              <div class="col-md-4">
                <select name="vinculo_agresor" id="vinculo_agresor" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <option value="PADRE">Padre</option>
                  <option value="MADRE">Madre</option>
                  <option value="CUIDADOR">Cuidador/a</option>
                  <option value="ABUELO">Abuelo/a</option>
                  <option value="TIO">Tio/a</option>
                  <option value="PRIMO">Primo/a</option>
                  <option value="OTRO">Otro</option>
                </select>
                <input id="cual_vinculo" placeholder="¿Cual?" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad del presunto agresor/a</label>
              <div class="col-md-4">
                <input id="edad_agresor" name="edad_agresor" type="text" placeholder="" class="form-control input-md" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel de escolaridad (Último nivel cursado)</label>
              <div class="col-md-4">
                <select name="nivel_escolaridad" id="nivel_escolaridad" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con11 = mysqli_query($con, "select * from  nivel_escolaridad");
                  $reg11 = mysqli_fetch_array($con11);
                  do {
                    $idNivelEs = $reg11['codigo_escolaridad'];
                    $desNivelEs = $reg11['desc_escolaridad'];
                  ?>
                    <option value="<?php echo $idNivelEs; ?>"><?php echo $desNivelEs; ?> </option>
                  <?php
                  } while ($reg11 = mysqli_fetch_array($con11));
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-4">
                <button type="button" class="btn-lg btn-primary" id="nextRegistro">Siguiente</button>
              </div>
            </div>

          </fieldset>
        </div>
        <div id="registro2">
          <fieldset>
            <!-- Form Name -->
            <h3 class="centrar letra n600 azulo pi">Registrar Formulario Ni&ntilde;os Ni&ntilde;as o Adolescentes</h3>
            <!-- Appended checkbox -->
            <!-- Appended checkbox -->
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
              <div class="col-md-4">
                <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required>

              </div>
            </div>



            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
              <div class="col-md-4">
                <input id="textinput" name="ape_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
              <div class="col-md-4">
                <select name="tip_doc_nna" id="tip_doc_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con11 = mysqli_query($con, "select * from  tipos_documentos");
                  $reg11 = mysqli_fetch_array($con11);
                  do {
                    $id11 = $reg11['id_tipo_documento'];
                    $des11 = $reg11['descripcion'];
                  ?>
                    <option value="<?php echo $id11; ?>"><?php echo $des11; ?> </option>
                  <?php
                  } while ($reg11 = mysqli_fetch_array($con11));
                  ?>

                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento</label>
              <div class="col-md-4">
                <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>
              <div class="col-md-4">
                <input id="textinput" name="fecha_nna" type="date" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>
              <div class="col-md-4">
                <input id="textinput" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
              <div class="col-md-4">
                <select name="genero_nna" id="genero_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  include("../conexion/conexion.php");

                  $con22 = mysqli_query($con, "select * from  generos");
                  $reg22 = mysqli_fetch_array($con22);
                  do {
                    $id_genero22 = $reg22['id_genero'];
                    $descripcion22 = $reg22['descripcion'];
                  ?>
                    <option value="<?php echo $id_genero22; ?>"><?php echo $descripcion22; ?> </option>
                  <?php
                  } while ($reg22 = mysqli_fetch_array($con22));
                  ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección</label>
              <div class="col-md-4">
                <input id="textinput" name="dir_nna" type="text" placeholder="" class="form-control input-md" required>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono móvil </label>
              <div class="col-md-4">
                <input id="textinput" name="tel_nna" type="tel_nna" minlength="10" maxlength="10" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
              <div class="col-md-4">
                <input id="textinput" name="email_nna" type="email" placeholder="" class="form-control input-md" required>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
              <div class="col-md-4">
                <select name="estrato_nna" id="estrato_nna" required class="form-control" font style="text-transform: uppercase;" required>
                  <option value="">Seleccione</option>
                  <?php
                  $con55 = mysqli_query($con, "select * from estratos");
                  $reg55 = mysqli_fetch_array($con55);
                  do {
                    $id_estrato55 = $reg55['id_estrato'];
                    $des_estrato55 = $reg55['descripcion'];
                  ?>
                    <option value="<?php echo $id_estrato55; ?>"><?php echo $des_estrato55; ?> </option>
                  <?php
                  } while ($reg55 = mysqli_fetch_array($con55));
                  ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel Educativo</label>
              <div class="col-md-4">
                <select name="nivel_educa_nna" id="nivel_educa_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con66 = mysqli_query($con, "select * from nivel_educativo");
                  $reg66 = mysqli_fetch_array($con66);
                  do {
                    $id_niveleducativo66 = $reg66['id_niveleducativo'];
                    $des_niveleducativo66 = $reg66['descripcion'];
                  ?>
                    <option value="<?php echo $id_niveleducativo66; ?>"><?php echo $des_niveleducativo66; ?> </option>
                  <?php
                  } while ($reg66 = mysqli_fetch_array($con66));
                  ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Régimen</label>
              <div class="col-md-4">
                <select name="regimen_nna" id="regimen_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con77 = mysqli_query($con, "select * from regimenes");
                  $reg77 = mysqli_fetch_array($con77);
                  do {
                    $id_regimen77 = $reg77['id_regimen'];
                    $des_regimen77 = $reg77['descripcion'];
                  ?>
                    <option value="<?php echo $id_regimen77; ?>"><?php echo $des_regimen77; ?> </option>
                  <?php
                  } while ($reg77 = mysqli_fetch_array($con77));
                  ?>

                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">EPS</label>
              <div class="col-md-4">
                <select name="eps_nna" id="eps_nna" required class="form-control" font style="text-transform: uppercase;">
                  <option value="">Seleccione</option>
                  <?php
                  $con88 = mysqli_query($con, "select * from eps");
                  $reg88 = mysqli_fetch_array($con88);
                  do {
                    $id_eps88 = $reg88['id_eps'];
                    $des_eps88 = $reg88['descripcion'];
                  ?>
                    <option value="<?php echo $id_eps88; ?>"><?php echo $des_eps88; ?> </option>
                  <?php
                  } while ($reg88 = mysqli_fetch_array($con88));
                  ?>

                </select>
              </div>
            </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Etnias</label>
          <div class="col-md-4">
            <select name="etnias_nna" id="etnias_nna" required class="form-control" font style="text-transform: uppercase;">
              <option value="">Seleccione</option>
              <?php
              $con99 = mysqli_query($con, "select * from etnias");
              $reg99 = mysqli_fetch_array($con99);
              do {
                $id_etnia99 = $reg99['id_etnia'];
                $des_etnia99 = $reg99['descripcion'];
              ?>
                <option value="<?php echo $id_etnia99; ?>"><?php echo $des_etnia99; ?> </option>
              <?php
              } while ($reg99 = mysqli_fetch_array($con99));
              ?>

            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="textinput">Categoría del Sisb&eacute;n</label>
          <div class="col-md-4">
            <input id="textinput" name="sisben_nna" type="sisben_nna" placeholder="Categorías [A1-A5] [B1-B7] [C1-C18] [D1-D21]" class="form-control input-md" onkeypress="return numeros(event)" required>

          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
          <div class="col-md-4">
            <select name="zona_nna" id="zona_nna" required class="form-control" font style="text-transform: uppercase;">
              <option value="">Seleccione</option>
              <?php
              $con10 = mysqli_query($con, "select * from zonas");
              $reg10 = mysqli_fetch_array($con10);
              do {
                $id_zona10 = $reg10['id_zona'];
                $des_zona10 = $reg10['descripcion'];
              ?>
                <option value="<?php echo $id_zona10; ?>"><?php echo $des_zona10; ?> </option>
              <?php
              } while ($reg10 = mysqli_fetch_array($con10));
              ?>

            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton"></label>
          <div class="col-md-4">
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>

          </div>
        </div>
        </fieldset>
    </div>
    </form>
    </div>
  </section>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
  </script>

  <script src="js/vendor/bootstrap.min.js"></script>

  <script src="js/main.js"></script>


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
  <?php
  if ($_POST) { //si se ha presionado enviar

    include("../conexion/conexion.php");

    $nom_nna = strtoupper($_POST['nom_nna']);
    $ape_nna = strtoupper($_POST['ape_nna']);
    $tip_doc_nna = $_POST['tip_doc_nna'];
    $num_nna = $_POST['num_nna'];
    $fecha_nna = $_POST['fecha_nna'];
    $genero_nna = $_POST['genero_nna'];
    $edad_nna = $_POST['edad_nna'];
    $municipio_nna = $_POST['municipio_nna'];
    $provincia_nna = $_POST['provincia_nna'];
    $dir_nna = $_POST['dir_nna'];
    $tel_nna = $_POST['tel_nna'];
    $email_nna = $_POST['email_nna'];
    $estrato_nna = $_POST['estrato_nna'];
    $nivel_educa_nna = $_POST['nivel_educa_nna'];
    $regimen_nna = $_POST['regimen_nna'];
    $eps_nna = $_POST['eps_nna'];
    $etnias_nna = $_POST['etnias_nna'];
    $sisben_nna = $_POST['sisben_nna'];
    $zona_nna = $_POST['zona_nna'];
    $fecha_ing = $fecha;
    $cuidadores_nna = 0;


    $sql = "INSERT INTO ninnosnna (id_ninnos, id_tipo_documento, No_identificacion, Nombres, Apellidos, Fecha_Nacimiento, Edad, Direccion, telefono_movil, correo_electronico, id_genero, id_estrato, id_niveleducativo, id_cuidadores, id_municipio, id_provincia, id_regimen, id_eps, id_etnia, Puntaje_Sisben, id_zona, fecha_ingreso, id_usuario) VALUES('$id_ninos','$tip_doc_nna','$num_nna','$nom_nna','$ape_nna','$fecha_nna','$edad_nna','$dir_nna', '$tel_nna','$email_nna','$genero_nna','$estrato_nna','$nivel_educa_nna','$cuidadores_nna','$municipio_nna','$provincia_nna','$regimen_nna','$eps_nna','$etnias_nna','$sisben_nna','$zona_nna','$fecha_ing','$id_usuario')";

    if (mysqli_query($con, $sql)) {
      echo '<script language = javascript>
         alert("la Información ha sido Guardada Correctamente")
         self.location = "ConsultarNNA.php"
         </script>';
    } else {
      echo '<script language = javascript>
        alert("Error")
        self.location = "ConsultarNNA.php"
        </script>';
    }

    mysqli_close($con);
  }
  ?>
  </form>

  <script>
    function numeros(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " 0123456789";
      especiales = [8, 37, 39, 46];

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
  </script>
  <script type="text/javascript">
    $("#registro2").hide();
    $("#cual_vinculo").hide();
    $("#vinculo_agresor").change(function() {
      if ($("#vinculo_agresor").val() == "OTRO") {
        $("#cual_vinculo").show();
      } else {
        $("#cual_vinculo").hide();
      }
    });
    $("#nextRegistro").click(function() {
      $("#registro1").hide();
      $("#registro2").show();
    });
  </script>

  <script>
    function calculaedad($fechanacimiento) {
      list($ano, $mes, $dia) = explode("-", $fechanacimiento);
      $ano_diferencia = date("Y") - $ano;
      $mes_diferencia = date("m") - $mes;
      $dia_diferencia = date("d") - $dia;
      if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
      return $ano_diferencia;
    }
  </script>

  <script>
    function obtenerCiudades(val) {
      $.ajax({
        type: "POST",
        url: "get_ciudad.php",
        data: 'id_pais=' + val,
        success: function(data) {
          $("#lista_ciudades").html(data);
        }
      });
    }
  </script>

</body>

</html>