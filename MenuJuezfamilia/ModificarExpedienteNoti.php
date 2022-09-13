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

<body style="background-color: #64AF59;">
  <?php
  //Proceso de conexión con la base de datos
  include("../conexion/conexion.php");


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
  $resultado = mysqli_query($con, $consulta) or die(mysqli_error());
  $fila = mysqli_fetch_array($resultado);
  $nombres = $fila['nombres'];
  $apellido = $fila['apellidos'];
  $id_municipio = $fila['id_municipio'];

  date_default_timezone_set('UTC');
  // Una forma de expresar la fecha 
  $fecha = strftime("%Y-%m-%d", time());

  ?>

  <header style="background-color: #64AF59;">
    <div class="container">
      <div class="row clearfix ps pi2x">
        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
          <br>
          <div align="center" class="letra n700  azulo centrar">
            <h1><b>Sistema de Informaci&oacute;n para el Restablecimiento de Derechos de Ni&ntilde;os, Ni&ntilde;as y Adolescentes</b></h1>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi">

        </div>

        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi linku">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <h3 class="centrar letra azulo n400"><strong>Bienvenido Juez de Familia</strong></h3>
            <h4 class="centrar letra azulo n500"><b>Municipio:</b> <?php
                                                                    $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio' ");
                                                                    while ($row1 = mysqli_fetch_array($busqueda1)) {

                                                                      $id_municipio1 = $row1['id_municipio'];
                                                                      $des_municipio = $row1['descripcion'];
                                                                    }
                                                                    echo  $des_municipio ?></h4>
            <h4 class="centrar letra azulo n500"><?php echo $nombres ?>&nbsp;<?php echo $apellido ?></h4>
            <h4 class="centrar letra azulo n500"><a href="desconectar_usuario.php"><b>Cerrar Sesión</b></a> </h4>


          </div>
        </div>
      </div>
  </header>

  <section style="background-color: #BDBDBD;">
    <div class="container ps ">
      <div class="row clearfix centrar">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <h2 class="centrar letra n600 azulo pi">Expedientes</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="fblanco">
    <div class="container ps2x ">
      <div class="row clearfix centrar">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <ul class="nav nav-tabs">
            <li role="presentation" class="letra n500"><a href="../MenuJuezFamilia.php">Volver Men&uacute; Principal</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <?php



  $codigo_expediente = $_GET['codigo_expediente'];
  $id_ninnos = $_GET['id_ninnos'];

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
      <div class="container ps ">
        <div class="row clearfix centrar">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <h2 class=" letra n600 azulo pi">
              <h5 class="letra n500  azulo " align="right"><a href="ExportarPDF.php?codigo_expediente=<?php echo $row50['codigo_expediente']; ?>" class=" btn btn-primary">Exportar PDF</a></h5>
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
  $resultado = mysqli_query($con, $consulta) or die(mysqli_error());
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
          <h3 class="centrar letra n600 azulo pi">Modificar Expediente</h3>
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
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
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

          <div class="form-group" style="display:none">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_cuidadores</label>
            <div class="col-md-4">
              <input id="textinput" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_cuidadores ?>" readonly>

            </div>
          </div>



          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Restablecimiento de Derechos</label>
            <div class="col-md-4">
              <div class="input-group">

                <?php $busqueda1 = mysqli_query($con, "SELECT * FROM derechos where id_derecho='$id_derecho' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_derecho = $row1['id_derecho'];
                  $des_derecho = $row1['descripcion_derechos'];
                }
                ?>

                <select name="derechos_exp" id="derechos_exp" required>
                  <option value="<?php echo $id_derecho ?>"><?php echo $des_derecho ?></option>
                  <?php
                  $con44 = mysqli_query($con, "select * from  derechos");
                  $reg44 = mysqli_fetch_array($con44);
                  do {
                    $id_derecho44 = $reg44['id_derecho'];
                    $des_derecho44 = $reg44['descripcion_derechos'];
                  ?>
                    <option value="<?php echo $id_derecho44; ?>"><?php echo $des_derecho44; ?> </option>
                  <?php
                  } while ($reg44 = mysqli_fetch_array($con44));
                  ?>

                </select>

              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Discapacidad</label>
            <div class="col-md-4">
              <div class="input-group">
                <?php
                include("../conexion/conexion.php");

                $busqueda1 = mysqli_query($con, "SELECT * FROM discapacidades where id_discapacidad='$id_discapacidad' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_discapacidad = $row1['id_discapacidad'];
                  $des_discapacidad = $row1['descripcion_discapacidades'];
                }
                ?>
                <select name="discapacidad_exp" id="discapacidad_exp" required>
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
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Indicador</label>
            <div class="col-md-4">
              <div class="input-group">
                <?php
                include("../conexion/conexion.php");
                $des_indicador = "";
                $busqueda1 = mysqli_query($con, "SELECT * FROM indicadores where id_indicador='$id_indicador' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_indicador = $row1['id_indicador'];
                  $des_indicador = $row1['descripcion_indicadores'];
                }
                ?>
                <select name="indicadores_exp" id="discapacidad_exp" required>
                  <option value="<?php echo $id_indicador ?>"><?php echo $des_indicador ?></option>
                  <?php
                  $con33 = mysqli_query($con, "select * from  indicadores");
                  $reg33 = mysqli_fetch_array($con33);
                  do {
                    $id_indicador = $reg33['id_indicador'];
                    $des_indicador = $reg33['descripcion_indicadores'];
                  ?>
                    <option value="<?php echo $id_indicador; ?>"><?php echo $des_indicador; ?> </option>
                  <?php
                  } while ($reg33 = mysqli_fetch_array($con33));
                  ?>

                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Maltrato</label>
            <div class="col-md-4">
              <div class="input-group">

                <?php
                include("../conexion/conexion.php");

                $busqueda1 = mysqli_query($con, "SELECT * FROM maltratos where id_maltrato='$id_maltrato' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_maltrato = $row1['id_maltrato'];
                  $des_maltrato = $row1['descripcion_maltratos'];
                }
                ?>

                <select name="maltratos_exp" id="maltratos_exp" required>
                  <option value="<?php echo $id_maltrato  ?>"><?php echo $des_maltrato  ?></option>
                  <?php
                  $con = mysqli_query($con, "select * from  maltratos");
                  $reg = mysqli_fetch_array($con);
                  do {
                    $id_maltrato = $reg['id_maltrato'];
                    $des_maltrato = $reg['descripcion_maltratos '];
                  ?>
                    <option value="<?php echo $id_maltrato; ?>"><?php echo $des_maltrato; ?> </option>
                  <?php
                  } while ($reg = mysqli_fetch_array($con));
                  ?>

                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Víctimas</label>
            <div class="col-md-4">
              <div class="input-group">

                <?php
                include("../conexion/conexion.php");

                $busqueda1 = mysqli_query($con, "SELECT * FROM victimas where id_victima='$id_victima' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_victima = $row1['id_victima'];
                  $des_victima = $row1['descripcion_victimas'];
                }
                ?>

                <select name="victima_exp" id="victima_exp" required>
                  <option value="<?php echo  $id_victima  ?>"><?php echo  $des_victima  ?></option>
                  <?php
                  $con = mysqli_query($con, "select * from  victimas");
                  $reg = mysqli_fetch_array($con);
                  do {
                    $id_victima = $reg['id_victima'];
                    $des_victima = $reg['descripcion_victimas'];
                  ?>
                    <option value="<?php echo $id_victima; ?>"><?php echo $des_victima; ?> </option>
                  <?php
                  } while ($reg = mysqli_fetch_array($con));
                  ?>

                </select>
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Descripci&oacute;n de los hechos</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="descripcion_exp" required><?php echo $Descripcion_expediente ?></textarea>


            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Observaciones</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="obs_exp" required><?php echo  $Observacion ?></textarea>


            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Veredicto del Caso</label>
            <div class="col-md-4">
              <textarea class="form-control input-md" name="veredicto_exp" required><?php echo $Veredicto_Caso ?></textarea>


            </div>
          </div>




          <!-- Text input-->
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha De Finalizaci&oacute;n del Expediente</label>
            <div class="col-md-4">

              <input id="textinput" name="finalizacion_exp" type="date" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Fecha_finalizacion_expediente ?>">
            </div>
          </div>


          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Entidad</label>
            <div class="col-md-4">
              <div class="input-group">

                <?php
                include("../conexion/conexion.php");

                $busqueda1 = mysqli_query($con, "SELECT * FROM entidades where id_entidad='$id_entidad' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_entidad = $row1['id_entidad'];
                  $des_entidad = $row1['descripcion_entidades'];
                }
                ?>

                <select name="entidad_exp" id="entidad_exp" required>
                  <option value="<?php echo $id_entidad  ?>"><?php echo $des_entidad  ?></option>
                  <?php
                  $con = mysqli_query($con, "select * from  entidades");
                  $reg = mysqli_fetch_array($con);
                  do {
                    $id_entidad = $reg['id_entidad'];
                    $des_entidad = $reg['descripcion_entidades'];
                  ?>
                    <option value="<?php echo $id_entidad; ?>"><?php echo $des_entidad; ?> </option>
                  <?php
                  } while ($reg = mysqli_fetch_array($con));
                  ?>

                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado del Expediente</label>
            <div class="col-md-4">
              <div class="input-group">

                <?php
                include("../conexion/conexion.php");

                $busqueda1 = mysqli_query($con, "SELECT * FROM estado_caso where id_estadocaso='$id_estadocaso' ");
                while ($row1 = mysqli_fetch_array($busqueda1)) {

                  $id_estadocaso = $row1['id_estadocaso'];
                  $des_estadocaso = $row1['descripcion_estado_caso'];
                }
                ?>

                <select name="estadocaso_exp" id="estadocaso_exp" required>
                  <option value="<?php echo $id_estadocaso  ?>"><?php echo  $des_estadocaso  ?></option>
                  <?php
                  $con = mysqli_query($con, "select * from  estado_caso");
                  $reg = mysqli_fetch_array($con);
                  do {
                    $id_estadocaso = $reg['$id_estadocaso'];
                    $des_estadocaso = $reg['descripcion_estado_caso'];
                  ?>
                    <option value="<?php echo $id_estadocaso; ?>"><?php echo $des_estadocaso; ?> </option>
                  <?php
                  } while ($reg = mysqli_fetch_array($con));
                  ?>

                </select>
              </div>
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
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Actualizar</button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



            </div>
          </div>

        </fieldset>
        <?php
        if (isset($_POST['singlebutton'])) { //si se ha presionado enviar

          include("../conexion/conexion.php");

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
self.location = "../MenuComisariaFamilia.php"
</script>';
        }
        ?>
      </form>

    </div>
  </section>

  <footer style="background-color:#64AF59;" class="borde_top">
    <div class="container">
      <div class="row clearfix pi1x ps">
        <div>
          <img class="img-responsive  center-block  borde_blanco " src="../img/logo_integracion_social.png" width="60%" alt="" />
        </div>

        <div align="center">
          <b>GOBERNACI&Oacute;N DE BOYAC&Aacute; <br> SECRETAR&Iacute;A DE INTEGRACI&Oacute;N SOCIAL <br> Sistema de Informaci&oacute;n a&ntilde;o 2021, Versi&oacute;n 2.0</b>
        </div>
      </div>
    </div>
  </footer>












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