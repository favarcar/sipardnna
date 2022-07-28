<?php



$id_usuario1 = $_GET['id_usuario'];
$id_tipo_documento = $_GET['id_tipo_documento'];
$id_genero = $_GET['id_genero'];
$id_municipio = $_GET['id_municipio'];
$id_perfil = $_GET['id_perfil'];

$id_ninnos = $_GET['id_ninnos'];
$codigo_expediente = $_GET['codigo_expediente'];



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
$id = $fila['id_usuario'];

date_default_timezone_set('America/Bogota');
$time = time();
$fecha =  date("Y-m-d", $time);



$busqueda = mysqli_query($con, "SELECT * FROM usuarios where id_usuario='$id_usuario1' "); //cambiar nombre de la tabla de busqueda
while ($row = mysqli_fetch_array($busqueda)) {

  $apellidos = $row['apellidos'];
  $nombres = $row['nombres'];
  $id_tipo_documento = $row['id_tipo_documento'];
  $numero_documento = $row['numero_documento'];
  $id_genero = $row['id_genero'];
  $id_municipio = $row['id_municipio'];
  $telefono = $row['telefono'];
  $usuario = $row['usuario'];
  $clave = $row['clave'];
  $correo = $row['correo'];
  $id_perfil = $row['id_perfil'];
  $id_entidad = $row['id_entidad'];
  $estado = $row['estado'];
  $fecha_registro = $row['fecha_registro'];
}
?>

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
  <title>Registro</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <link rel="stylesheet" href="../../css/bootstrap.css">

  <style>
    body {
      padding-top: 0px;
      padding-bottom: 0px;
    }
  </style>


  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">


  <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>

  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

</head>

<body class="fblanco">
  <?php
  date_default_timezone_set('America/Bogota');
  $time = time();
  $fecha =  date("Y-m-d", $time);
  ?>


  <section class="fblanco">
    <div class="container pi3x">

      <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
        <fieldset>

          <!-- Form Name -->
          <h3 class="centrar letra n600 azulo pi"> Remitir a Juez de Familia</h3>

          <!-- Appended checkbox -->
          <!-- Text input-->
          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario</label>
            <div class="col-md-4">
              <input id="textinput" name="id_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $id_usuario;  ?>">

            </div>
          </div>

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario</label>
            <div class="col-md-4">
              <input id="textinput" name="id_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo  $nombres;  ?>" readonly>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
            <div class="col-md-4">
              <input id="textinput" name="nom_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo  $nombres;  ?>" readonly>

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
            <div class="col-md-4">
              <input id="textinput" name="ape_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo  $apellidos;  ?>" readonly>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. Docuemento </label>
            <div class="col-md-4">
              <input id="textinput" name="num_doc_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $numero_documento;  ?>" readonly>

            </div>
          </div>
          <!-- Multiple Radios (inline) -->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
            <div class="col-md-4">
                <select name="municipio_usu" id="municipio_usu" disabled class="form-control" style="text-transform: uppercase;">
                  <?php $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio' ");
                  while ($row1 = mysqli_fetch_array($busqueda1)) {

                    $id_municipio = $row1['id_municipio'];
                    $descripcion = $row1['descripcion'];
                  }
                  ?>
                  <option value="<?php echo $id_municipio;  ?>"><?php echo $descripcion;  ?></option>
                  <?php
                  $con1 = mysqli_query($con, "select * from municipios");
                  $reg = mysqli_fetch_array($con1);
                  do {
                    $id_mun = $reg['id_municipio'];
                    $des_mun = $reg['descripcion'];
                  ?>
                    <option value="<?php echo $id_mun; ?>"><?php echo $des_mun; ?> </option>
                  <?php
                  } while ($reg = mysqli_fetch_array($con1));
                  ?>

                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Cargo</label>
            <div class="col-md-4">
              <select name="cargo_usu" id="cargo_usu" disabled class="form-control" style="text-transform: uppercase;">
                <?php
                include('../../conexion/conexion.php');

                $busqueda33 = mysqli_query($con, "SELECT * FROM perfiles where id_perfil='$id_perfil' ");
                while ($row33 = mysqli_fetch_array($busqueda33)) {

                  $id_perfil33 = $row33['id_perfil'];
                  $descripcion33 = $row33['descripcion'];
                }
                ?>
                <option value="<?php echo $id_perfil33; ?>"><?php echo $descripcion33; ?></option>
                <?php
                $con33 = mysqli_query($con, "select * from perfiles");
                $reg33 = mysqli_fetch_array($con33);
                do {
                  $id_car = $reg33['id_perfil'];
                  $des_cam = $reg33['descripcion'];
                ?>
                  <option value="<?php echo $id_car; ?>"><?php echo $des_cam; ?> </option>
                <?php
                } while ($reg33 = mysqli_fetch_array($con33));
                ?>
                </select>              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
            <div class="col-md-4">
              <input id="textinput" name="tel_usu" type="tel_usu" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required value="<?php echo $telefono ?>" readonly>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
            <div class="col-md-4">
              <input id="textinput" name="email_usu" type="email" placeholder="" class="form-control input-md" required value="<?php echo $correo ?>" readonly>

            </div>
          </div>

          <!-- Button Drop Down -->
          <!-- Multiple Radios (inline) -->

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_entidad</label>
            <div class="col-md-4">
              <input id="textinput" name="id_entidad" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $id_entidad ?>">

            </div>
          </div>

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Remisi&oacute;n</label>
            <div class="col-md-4">
              <input id="textinput" name="fecha" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $fecha ?>">

            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Remitir</button>
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

    $id_remite = $_POST['id_remite'];
    $id_usu = $_POST['id_usu'];


    $sql = " INSERT INTO `remite`(`id_remite`, `codigo_expediente`, `id_ninnos`, `id_usuario`, `usuario_que_remite`) VALUES ('$id_remite','$codigo_expediente','$id_ninnos','$id_usuario1','$id')";

    if (mysqli_query($con, $sql)) {
      echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "main.php?key=15"
</script>';
    } else {
      echo '<script language = javascript>
alert("Error")
self.location = "main.php?key=15"
</script>';
    }

    mysqli_close($con);
  }

  ?>
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

  </form>
  <script>
    function redimensiona() {
      top.grand(document.body.scrollHeight);
    }
  </script>

</body>

</html>