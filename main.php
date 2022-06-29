<?php
// Desactivar toda notificaci�n de error
error_reporting(0);

// Notificar solamente errores de ejecuci�n
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Notificar E_NOTICE tambi�n puede ser bueno (para informar de variables
// no inicializadas o capturar errores en nombres de variables ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Notificar todos los errores excepto E_NOTICE
// Este es el valor predeterminado establecido en php.ini
error_reporting(E_ALL ^ E_NOTICE);

// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);

// Notificar todos los errores de PHP
error_reporting(1);

// Lo mismo que error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
?>

<?php
include("conexion/conexion.php");
//include ("funshow.php");
$verdato = $_GET['key'];

 ?>
<?php
if (!isset($_SESSION)) {
	  session_start();
	  }

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
// Se realiza el Log de Cerrado de Sesi�n del Usuario
	#$estado = "Cerro Sesi�n";

  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['numero_documento'] = NULL;
    //Borra la variable de sesion numero_documento
   $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
header("Cache-control:private");
if($_SESSION['numero_documento']=="")
{
 header("Location: ../index.php");
 exit;
}  ?>
<?php

#CODIGO PARA MOSTRAR DATOS DEL USUARIO CONECTADO
$id_usuario = $_SESSION['numero_documento'];
$consulta= "SELECT * FROM usuarios where numero_documento='$id_usuario' ";
$resultado= mysqli_query($con,$consulta) or die (mysqli_error());
$fila=mysqli_fetch_array($resultado);
$nombres = $fila['nombres'];
$apellido = $fila['apellidos'];
$id_municipio = $fila['id_municipio'];
$id_perfil = $fila['id_perfil']; 
$nuser = $fila['Nivel'];
date_default_timezone_set('UTC');
// Una forma de expresar la fecha
//$fecha = strftime( "%Y-%m-%d", time() );
//codigo para consultar el municipio
$municipio=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipio' ");
 while($row1=mysqli_fetch_array($municipio)){
 $id_municipio1=$row1['id_municipio'];
 $des_municipio=$row1['descripcion'];
}

# De acuerdo con el nivel de usuario se hacen visibles algunas caracteristicas del programa

switch ($nuser){
	//ADMINISTRADOR
	case 1:
	$colormenu = "#C00";
	$visible = "inline"; $visible_cell = "table-cell"; $visibleadm = "none";
  


		break;
	//Comisaria (registro)
	case 2:
	$colormenu = "#00AEE7";
	$visibleinsp="show"; $visibleinsp="inline"; $visible = "none"; $visible_cell = "none"; $visible_cell_cls = "hide";

	break;
	//Consulta
	case 3:
	$colormenu = "#00AEE7";
	$visibleinsp = "hide"; $visibleinsp2 = "none"; $visible = "none"; $visible_cell = "none"; $visible_cell_cls = "hide";
	//Solo invisible para el curador
	$visible_cur = "none";

	break;
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de informacion </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="img/logo-ggg.jpg">


        <link rel="stylesheet" href="css/bootstrap.css">

        <style>
            body {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>


        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">


        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
<script language="JavaScript">
//Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
function autofitIframe(id){
if (!window.opera && document.all && document.getElementById){
id.style.height=id.contentWindow.document.body.scrollHeight;
} else if(document.getElementById) {
id.style.height=id.contentDocument.body.scrollHeight+"px";
}
}
</script>
    </head>
    <body style="background-color: #64AF59;">


 <header>
<div class="text-center" style="height:30px; color:white; background-color:"><strong>Sistema de Información para el Restablecimiento de Derechos de Niños, Niñas y Adolescentes</strong></div>
 <nav class="navbar navbar-default">
  <div class="container-fluid mt-5">
    <div class="navbar-header">
	      <a  href="#" style="border:1px"><img class="img-fluid" height="50px" src="img/logo_menu.jpg"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="main.php?key=0">Inicio</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Consultar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="main.php?key=1">Niños niñas o adolescentes</a></li>
          <li><a href="main.php?key=2">Madres padres o cuidadores</a></li>
          <li><a href="main.php?key=3">Expedientes</a></li>
        </ul>
      </li>
     <?php if($nuser == 1 || $nuser == 2){?>
      <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Registrar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="main.php?key=1">Niños niñas o adolescentes</a></li>
          <li><a href="main.php?key=2">Madres padres o cuidadores</a></li>
          <li><a href="main.php?key=3">Expedientes</a></li>
        </ul>
      </li>
	  <?php } ?>
      <li><a href="main.php?key=4">Mi usuario</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right center-block">
      <li><i class="glyphicon glyphicon-user"></i><strong>Usuario:</strong> <?php echo $nombres?>&nbsp;<?php echo $apellido?>
	  <br>
	  <i class="glyphicon glyphicon-flag"></i>
	  <strong>Municipio:</strong><?= $des_municipio ?> </li>
      <li><a href="desconectar_usuario.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>
 </header>




<section class="fblanco">
<div class="container"> 
<?php
if ($verdato == 0 &&  $nuser == 3){include("home_consulta.php");}
if ($verdato == 0 && $nuser == 2){include("home_registro.php");}
if ($verdato == 1){include("menuadministrador/ConsultarNNA.php");}
if ($verdato == 2){include("menuadministrador/ConsultarMPC.php");}
if ($verdato == 3){include("menuadministrador/TotalExpedientes/ConsultarTotalExpediente.php");}
if ($verdato == 4){include("Usuarios/ModificarUsuario.php");}
if ($verdato == 5){include("menuadministrador/ModificarNNA.php");}
if ($verdato == 6){include("menuadministrador/TotalExpedientes/ConsultarTotalExpedientesNinos.php");}
//if ($verdato == 7){include("home_registro.php");}
if ($verdato == 8){include("MenuNinosNinasAdo.php");}
if ($verdato == 9){include("MenuComisariaFamilia.php");}
if ($verdato == 10){include("MPC/IngresarMPC.php");}
if ($verdato == 11){include("MenuMPC.php");}
if ($verdato == 12){include("MenuExpediente.php");}
if ($verdato == 13){include("notificaciones.php");}
if ($verdato == 14){include("NNA/ConsultarNNA.php");}
if ($verdato == 15){include("Expediente/ExpedientesRemitidos/ConsultarExpedienteRemi.php");}
if ($verdato == 16){include("Expediente/TotalExpedientes/ConsultarTotalExpediente.php");}
if ($verdato == 17){include("NNA/EliminarNNA.php");}
if ($verdato == 18){include("menuadministrador/ConsultarRegistrosMPC.php");}
                      

if ($verdato == 102) {include("user_list.php");}
if ($verdato == 105) {include("user_update.php");}
if ($verdato == 106) {include("user_update_pos.php");}
if ($verdato == 200) {include("casos_reg.php");}
if ($verdato == 201) {include("casos_reg_pos.php");}
if ($verdato == 202) {include("lic_load.php");}
if ($verdato == 203) {include("lic_load_pos.php");}
if ($verdato == 204) {include("licencias_poscarga.php");}
if ($verdato == 206) {include("casos_list.php");}
if ($verdato == 207) {include("casos_ver.php");}
if ($verdato == 208) {include("casos_edit.php");}
if ($verdato == 209) {include("casos_edit_pos.php");}
if ($verdato == 300) {include("consultar_caso.php");}
if ($verdato == 301) {include("consultar_control.php");}
if ($verdato == 400) {include("del_cladato.php");}
if ($verdato == 401) {include("edit_dato.php");}
if ($verdato == 402) {include("cargar_archivos.php");}
?>
<div>
 </section>


                        <footer class="f4 borde_top">
                                <div class="container">
                                    <div class="row clearfix pi2x ps">
                                        <div >
                                            <img class="img-responsive  center-block  borde_blanco " src="img/logo_integracion_social.png" width="60%" alt=""/>
                                        </div>

                                    </div>
                                </div>
                            </footer>
    </body>
</html>

        <!-- page content -->
<?php echo mysqli_close($con); ?>
<!-- JAVASCRIPT -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
