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
  <script>
    function valida(e) {
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8) {
        return true;
      }

      // Patron de entrada, en este caso solo acepta numeros
      patron = /[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }
  </script>
  <!-- End WOWSlider.com HEAD section -->

</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <?php

  $id_ninnos = $_GET['id_ninnos'];



  $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
  while ($row = mysqli_fetch_array($busqueda)) {

    $id_ninnos1 = $row['id_ninnos'];
    $No_identificacion = $row['No_identificacion'];
    $Nombres = $row['Nombres'];
    $Apellidos = $row['Apellidos'];
  }
  $id_cuidadores = "No hay registro";
  $id_tipo_documento = "No hay registro";
  $No_Cedula = "No hay registro";
  $NombresCuida = "No hay registro";
  $ApellidosCuida = "No hay registro";
  $Fecha_Nacimiento = "No hay registro";
  $Edad = "No hay registro";
  $Direccion = "No hay registro";
  $telefono_movil = "No hay registro";
  $correo_electronico = "No hay registro";
  $id_parentesco = "No hay registro";
  $id_estado = "No hay registro";
  $id_estrato = "No hay registro";
  $id_etnia = "No hay registro";
  $id_genero = "No hay registro";
  $id_niveleducativo = "No hay registro";
  $id_regimen = "No hay registro";
  $id_eps = "No hay registro";
  $id_municipio = "No hay registro";
  $id_provincia = "No hay registro";
  $id_zona = "No hay registro";
  $Puntaje_Sisben = "No hay registro";
  $fecha_cuida = "No hay registro";
  $id_usuario = "No hay registro";
  $id_ninos = "No hay registro";
  $busqueda1 = mysqli_query($con, "SELECT * FROM cuidadores where id_ninos='$id_ninnos1' "); //cambiar nombre de la tabla de busqueda
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
  <?php
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
          <h3 class="centrar letra n600 azulo pi">Registrar Expediente</h3>
          <!-- Appended checkbox -->
          <!-- Appended checkbox -->
          <!-- Text input-->
          <div class="form-group" style="display:none">
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
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
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
              <input id="textinput" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $ApellidosCuida; ?> <?php echo $NombresCuida; ?> " readonly>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Madre, Padre o Acudiente</label>
            <div class="col-md-4">
              <input id="textinput" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $No_Cedula ?>" readonly>

            </div>
          </div>

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_cuidadores</label>
            <div class="col-md-4">
              <input id="textinput" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_cuidadores ?>" readonly>

            </div>
          </div>



          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Número del proceso</label>
            <div class="col-md-4">
              <input id='num_pro' type="number" name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" value="0" required>
            </div>
          </div>
          <h5 class="centrar letra n600 azulo pi"><u> Verifique si el Derecho a utilizar se encuentra en la lista desplegable. Si no se encuentra registre un nuevo derecho.</u> </h5>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Restablecimiento de Derechos</label>
            <div class="col-md-4">


              <select name="derechos_exp" id="derechos_exp" class="form-control" style="text-transform: uppercase;" required>
                <option value="">Seleccione</option>
                <?php
                $con66 = mysqli_query($con, "select * from  derechos");
                $reg66 = mysqli_fetch_array($con66);
                do {
                  $id_derecho66 = $reg66['id_derecho'];
                  $des_derecho66 = $reg66['descripcion_derechos'];
                ?>
                  <option value="<?php echo $id_derecho66; ?>"><?php echo $des_derecho66; ?> </option>
                <?php
                } while ($reg66 = mysqli_fetch_array($con66));
                ?>

              </select>
              <h5 class="letra n500  azulo "><a href="main.php?key=20" class=" btn btn-primary">Registrar Nuevo Derecho</a></h5>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Discapacidad</label>
            <div class="col-md-4">

              <select name="discapacidad_exp" id="discapacidad_exp" class="form-control" style="text-transform: uppercase;" required>
                <option value="">Seleccione</option>
                <?php
                include("../conexion/conexion.php");

                $con11 = mysqli_query($con, "select * from  discapacidades");
                $reg11 = mysqli_fetch_array($con11);
                do {
                  $id_discapacidad11 = $reg11['id_discapacidad'];
                  $des_discapacidad11 = $reg11['descripcion_discapacidades'];
                ?>
                  <option value="<?php echo $id_discapacidad11; ?>"><?php echo $des_discapacidad11; ?> </option>
                <?php
                } while ($reg11 = mysqli_fetch_array($con11));
                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Indicador</label>
            <div class="col-md-4">

              <select name="indicadores_exp" id="discapacidad_exp" class="form-control" style="text-transform: uppercase;" required>
                <option value="">Seleccione</option>
                <?php
                $con77 = mysqli_query($con, "select * from  indicadores");
                $reg77 = mysqli_fetch_array($con77);
                do {
                  $id_indicador77 = $reg77['id_indicador'];
                  $des_indicador77 = $reg77['descripcion_indicadores'];
                ?>
                  <option value="<?php echo $id_indicador77; ?>"><?php echo $des_indicador77; ?> </option>
                <?php
                } while ($reg77 = mysqli_fetch_array($con77));
                ?>
              </select>

              <h5 class="letra n500  azulo "><button href="main.php?key=20" class=" btn btn-primary">Agregar indicador al expediente</button></h5>
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Maltrato</label>
            <div class="col-md-4">

              <select name="maltratos_exp" id="maltratos_exp" class="form-control" style="text-transform: uppercase;" required>
                <option value="">Seleccione</option>
                <?php
                include("../conexion/conexion.php");

                $con22 = mysqli_query($con, "select * from  maltratos");
                $reg22 = mysqli_fetch_array($con22);
                do {
                  $id_maltrato22 = $reg22['id_maltrato'];
                  $des_maltrato22 = $reg22['descripcion_maltratos'];
                ?>
                  <option value="<?php echo $id_maltrato22; ?>"><?php echo $des_maltrato22; ?> </option>
                <?php
                } while ($reg22 = mysqli_fetch_array($con22));
                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Victimas</label>
            <div class="col-md-4">

              <select name="victima_exp" id="victima_exp" class="form-control" style="text-transform: uppercase;" required>
                <option value="">Seleccione</option>
                <?php
                $con88 = mysqli_query($con, "select * from  victimas");
                $reg88 = mysqli_fetch_array($con88);
                do {
                  $id_victima88 = $reg88['id_victima'];
                  $des_victima88 = $reg88['descripcion_victimas'];
                ?>
                  <option value="<?php echo $id_victima88; ?>"><?php echo $des_victima88; ?> </option>
                <?php
                } while ($reg88 = mysqli_fetch_array($con88));
                ?>

              </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Descripci&oacute;n</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="descripcion_exp" required></textarea>


            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Observaciones</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="obs_exp" required></textarea>


            </div>
          </div>





          <!-- Text input-->
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha aproximada del Expediente</label>
            <div class="col-md-4">

              <input id="textinput" name="finalizacion_exp" type="date" placeholder="" class="form-control input-md" onkeypress="return numeros(event)">
            </div>
          </div>


          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Entidad</label>
            <div class="col-md-4">

              <select name="entidad_exp" id="entidad_exp" required class="form-control" style="text-transform: uppercase;">
                <option value="">Seleccione</option>
                <?php
                include("../conexion/conexion.php");

                $con33 = mysqli_query($con, "select * from  entidades");
                $reg33 = mysqli_fetch_array($con33);
                do {
                  $id_entidad33 = $reg33['id_entidad'];
                  $des_entidad33 = $reg33['descripcion_entidades'];
                ?>
                  <option value="<?php echo $id_entidad33; ?>"><?php echo $des_entidad33; ?> </option>
                <?php
                } while ($reg33 = mysqli_fetch_array($con33));
                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado del Expeidente</label>
            <div class="col-md-4">

              <select name="estadocaso_exp" id="estadocaso_exp" required class="form-control" style="text-transform: uppercase;">
                <option value="">Seleccione</option>
                <?php
                $con99 = mysqli_query($con, "select * from  estado_caso");
                $reg99 = mysqli_fetch_array($con99);
                do {
                  $id_estadocaso99 = $reg99['id_estadocaso'];
                  $des_estadocaso99 = $reg99['descripcion_estado_caso'];
                ?>
                  <option value="<?php echo $id_estadocaso99; ?>"><?php echo $des_estadocaso99; ?> </option>
                <?php
                } while ($reg99 = mysqli_fetch_array($con99));
                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Concepto del Caso</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="veredicto_exp" required></textarea>


            </div>
          </div>

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>
            <div class="col-md-4">
              <input id="textinput" name="id_usuario_exp" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
            </div>
          </div>

        </fieldset>
        <?php
        if ($_POST) { //si se ha presionado enviar

          $codigo_expediente = $_POST['codigo_expediente'];
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

          $fecha_limite1 = date('Y-m-j');
          $nuevafecha = strtotime('+120 day', strtotime($fecha));
          $nuevafecha = date('Y-m-j', $nuevafecha);


          $fecha_limite = $nuevafecha;




          $sql = "INSERT INTO `expediente`(`codigo_expediente`, `Fecha_inicio_expediente`, `id_ninnos`, `id_cuidadores`, `id_discapacidad`, `id_indicador`, `id_maltrato`, `id_victima`, `Descripcion_expediente`, `id_derecho`, `Observacion`, `Veredicto_Caso`, `Fecha_finalizacion_expediente`, `id_entidad`, `id_usuario_exp`, `id_estadocaso`, `fecha_limite`) VALUES ('$codigo_expediente','$fecha_exp','$cod_exp','$cuidadores_exp','$discapacidad_exp',' $indicadores_exp','$maltratos_exp','$victima_exp','$descripcion_exp','$derechos_exp','$obs_exp','$veredicto_exp','$finalizacion_exp','$entidad_exp','$id_usuario_exp','$estadocaso_exp','$fecha_limite')";

          if (mysqli_query($con, $sql)) {
            echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "ConsultarExpediente.php"
</script>';
          } else {
            echo '<script language = javascript>
alert("Error")
self.location = "ConsultarExpediente.php"
</script>';
          }

          mysqli_close($con);
        }
        ?>
      </form>

    </div>
  </section>














  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
  </script>

  <script src="js/vendor/bootstrap.min.js"></script>

  <script src="js/main.js"></script>
  <script src="js/jsAddExpediente.js"></script>

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