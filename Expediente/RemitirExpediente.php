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


  $codigo_expediente = $_GET['codigo_expediente'];
  $id_ninnos = $_GET['id_ninnos']; ?>


  <?php
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
  }



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
    $NombresCuida = $row1['Nombres'];
    $ApellidosCuida = $row1['Apellidos'];
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
  <?php


  //Iniciar Sesión
  session_start();

  //Validar si se está ingresando con sesión correctamente
  if (!$_SESSION) {
    echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
  }

  $id_usuario = $_SESSION['numero_documento'];

  $consulta = "SELECT * FROM usuarios where numero_documento='$id_usuario' ";
  $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
  $fila = mysqli_fetch_array($resultado);
  $nombres = $fila['nombres'];
  $apellido = $fila['apellidos'];

  date_default_timezone_set('America/Bogota');
  $time = time();
  $fecha =  date("Y-m-d", $time);

  ?>

  <section class="fblanco">
    <div class="container pi3x">

      <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
        <fieldset>

          <!-- Form Name -->
          <h3 class="centrar letra n600 azulo pi">Remitir Expediente</h3>
          <!-- Appended checkbox -->
          <!-- Appended checkbox -->
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Codigo del expediente</label>
            <div class="col-md-4">
              <input id="textinput" name="cod_exp" type="text" placeholder="" class="form-control input-md" value="<?php
                                                                                                                    $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
                                                                                                                    while ($row = mysqli_fetch_array($busqueda)) {

                                                                                                                      echo $id_ninnos11 = $row['id_ninnos'];
                                                                                                                    } ?>" readonly>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Inicio del Expediente</label>
            <div class="col-md-4">
              <input id="textinput" name="fecha_exp" type="text" placeholder="" class="form-control input-md" value="<?php echo $fecha ?>" readonly>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
            <div class="col-md-4">
              <input id="textinput" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly>

            </div>
          </div>




          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente </label>
            <div class="col-md-4">
              <input id="textinput" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" readonly>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Madre, Padre o Acudiente</label>
            <div class="col-md-4">
              <input id="textinput" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $ApellidosCuida ?> <?php echo $NombresCuida ?> " readonly>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Madre, Padre o Acudiente</label>
            <div class="col-md-4">
              <input id="textinput" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $No_Cedula ?>" readonly>

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Descripción</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="obs_exp" required readonly><?php echo $Descripcion_expediente ?></textarea>


            </div>
          </div>

          <!-- Text input-->
          <!-- Text input-->
          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado del Expediente</label>
            <div class="col-md-4">
              <div class="input-group">

                <?php $busqueda1 = mysqli_query($con, "SELECT * FROM estado_caso where id_estadocaso='$id_estadocaso' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_estadocaso = $row1['id_estadocaso'];
                  $des_estadocaso = $row1['descripcion'];
                }
                ?>

                <select name="estadocaso_exp" id="estadocaso_exp" required disabled>
                  <option value="<?php echo $id_estadocaso  ?>"><?php echo  $des_estadocaso  ?></option>
                  <?php
                  $con99 = mysqli_query($con, "select * from  estado_caso");
                  $reg = mysqli_fetch_array($con99);
                  do {
                    $id_estadocaso = $reg['$id_estadocaso'];
                    $des_estadocaso = $reg['descripcion'];
                  ?>
                    <option value="<?php echo $id_estadocaso; ?>"><?php echo $des_estadocaso; ?> </option>
                  <?php
                  } while ($regi = mysqli_fetch_array($con99));
                  ?>

                </select>
              </div>
            </div>
          </div>

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>
            <div class="col-md-4">
              <input id="textinput" name="id_usuario_exp" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required readonly>

            </div>
          </div>

          <table width="1166" id="tab" style="background:#FFFFFF" align="center" class="table">



            <td align="center">
              <h5 class="letra n500  azulo "><br><a href="RemitirJuezFamilia/RemitirJuezfamilia.php?codigo_expediente=<?php echo $codigo_expediente; ?>&id_ninnos=<?php echo $id_ninnos; ?>" class=" btn btn-primary">Remitir Juez de Familia</a></h5>
            </td>
            <td align="center">
              <h5 class="letra n500  azulo "><br><a href="RemitirEnlaceMunicipal/RemitirEnlaceMunicipal.php?codigo_expediente=<?php echo $codigo_expediente; ?>&id_ninnos=<?php echo $id_ninnos; ?>" class=" btn btn-primary">Remitir Enlace Municipal</a></h5>
            </td>

            <td align="center">
              <h5 class="letra n500  azulo "><br><a href="RemitirComisaria/RemitirComisaria.php?codigo_expediente=<?php echo $codigo_expediente; ?>&id_ninnos=<?php echo $id_ninnos; ?>" class=" btn btn-primary">Remitir Comisar&iacute;a de Familia</a></h5>
            </td>



            </tr>
            <tbody>


          </table>


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
</body>

</html>