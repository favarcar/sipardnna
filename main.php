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
include("funshow.php");
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
   $logoutGoTo = "index.php";
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
$resultado= mysqli_query($con,$consulta) or die(mysqli_error($con));
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
  $visiblemod = "visible";
  $dis = "";


		break;
	//Comisaria (registro)
	case 2:
	$colormenu = "#00AEE7";
	$visiblemod="visible"; $visibleinsp="inline"; $visible = "none"; $visible_cell = "none"; $visible_cell_cls = "hide";
  $dis= "";  
	break;
	//Consulta
	case 3:
	$colormenu = "#00AEE7";
	$visiblemod = "invisible"; $visibleinsp2 = "none"; $visible = "none"; $visible_cell = "none"; $visible_cell_cls = "hide";
	//Solo invisible para el curador
	$dis = "disabled";

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



        <!-- selet2 style -->
        <link href="js/select2/dist/css/select2.min.css" rel="stylesheet" />

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

<!--Menú de sipardnna-->
 <header>
<div class="text-center" style="height:30px; color:white; background-color: #64af59"><strong>Sistema de Información para el Restablecimiento de Derechos de Niños, Niñas y Adolescentes</strong></div>
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
          <li><a href="main.php?key=16">Expedientes</a></li>
        </ul>
      </li>
      <!--Restricción por niveles de acceso al menú -->
     <?php if($nuser == 1){?>
      <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Registrar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="main.php?key=8">Niños niñas o adolescentes</a></li>
          <li><a href="main.php?key=43">Madre, Padre o Cuidador</a></li>
          <li><a href="main.php?key=51">Expedientes</a></li>
        </ul>
        <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Administrador
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="main.php?key=54">Usuarios</a></li>
          <li><a href="main.php?key=60">Discapacidad</a></li>
          <li><a href="main.php?key=64">Entidad</a></li>
          <li><a href="main.php?key=70">EPS</a></li>
          <li><a href="main.php?key=75">Etnias</a></li>
          <li><a href="main.php?key=80">Clasificación del proceso</a></li>
          <li><a href="main.php?key=85">Lugar de los hechos</a></li>
          <li><a href="main.php?key=90">Tipo de maltrato</a></li>
          <li><a href="main.php?key=95">Motivo de ingreso</a></li>
          <li><a href="main.php?key=110">Perfiles</a></li>
          <li><a href="main.php?key=115">Víctimas</a></li>
        </ul>        
        <li><a href="main.php?key=4">Mi usuario</a></li>
      </li>
	  <?php } ?>
    <?php if($nuser == 2){?>
      <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Registrar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="main.php?key=8">Niños niñas o adolescentes</a></li>
          <li><a href="main.php?key=43">Madre, Padre o Cuidador</a></li>
          <li><a href="main.php?key=51">Expedientes</a></li>
        </ul>
        <li><a href="main.php?key=4">Mi usuario</a></li>
      </li>
	  <?php } ?>

    <!--Perfiles de sipardnna y asignación de niveles--> 
    </ul>
    <ul class="nav navbar-nav navbar-right center-block">
      <li><i class="glyphicon glyphicon-user"></i><strong>Usuario:</strong> <?php echo $nombres?>&nbsp;<?php echo $apellido?>
	  <br>
	  <i class="glyphicon glyphicon-flag"></i>
	  <strong>Municipio:</strong><?= $des_municipio ?>                                                           
    <i class="glyphicon glyphicon-briefcase"></i><strong> Cargo:</strong> <?php if ($id_perfil == 1) {
    echo "ADMINISTRADOR";
} elseif ($id_perfil ==  2) {
    echo "DIRECTOR";
} elseif ($id_perfil == 3) {
    echo "SUPERVISOR";
} elseif ($id_perfil == 4) {
    echo "ENLACE MUNICIPAL";
} elseif ($id_perfil == 5) {
    echo "INVITADO";
} elseif ($id_perfil == 6) {
    echo "COMISARIA DE FAMILIA";
} elseif ($id_perfil == 7) {
    echo "PERSONERIA";
} elseif ($id_perfil == 8) {
    echo "PROCURADURIA";
} elseif ($id_perfil == 9) {
    echo "JUEZ DE FAMILIA";
} else {
    "SUPERADMINISTRADOR";
}?></li>
      <li><a href="desconectar_usuario.php"><span class="glyphicon glyphicon-log-out" style="color:orange"></span><FONT COLOR="orange"> Salir</FONT></a></li>
      <br>

    </ul>
  </div>
</nav>
 </header>


<!--Lista de formularios que se estan usando en el sistema-->

<section class="fblanco">
<div class="container"> 
<?php
if ($verdato == 0 &&  $nuser == 3){include("home_consulta.php");}
if ($verdato == 0 && $nuser == 2){include("home_registro.php");}
if ($verdato == 0 && $nuser == 1){include("home_administrador.php");}
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
if ($verdato == 11){include("MPC/ConsultarRegistrosMPC1");}
if ($verdato == 12){include("MenuExpediente.php");}
if ($verdato == 13){include("notificaciones.php");}
if ($verdato == 14){include("NNA/ConsultarNNA.php");}
if ($verdato == 15){include("Expediente/ExpedientesRemitidos/ConsultarExpedienteRemi.php");}
if ($verdato == 16){include("Expediente/TotalExpedientes/ConsultarTotalExpediente.php");}
if ($verdato == 17){include("NNA/EliminarNNA.php");}
if ($verdato == 18){include("menuadministrador/ConsultarRegistrosMPC.php");}
if ($verdato == 19){include("Expediente/ModificarExpedienteNoti.php");}
if ($verdato == 20){include("IngresarNuevoDerecho/ConsultarDerecho.php");}
if ($verdato == 21){include("IngresarNuevoDerecho/IngresarDerecho.php");}
if ($verdato == 22){include("IngresarNuevoDerecho/ModificarDerecho.php");}
if ($verdato == 23){include("MPC/ConsultarMPC.php");}
//if ($verdato == 24){include("Expediente/ExportarPDF.php");}
if ($verdato == 25){include("Expediente/RegistrarConsularExpediente.php");}
if ($verdato == 26){include("redireexpe.php");}
if ($verdato == 27){include("EliminarRegistrosMPC.php");}
if ($verdato == 28){include("IngresarNuevoDerecho/EliminarDerecho.php");}
if ($verdato == 29){include("Expediente/ExpedientesRemitidos/ConsultarExpedientesNinos.php");}
if ($verdato == 30){include("Expediente/ExpedientesRemitidos/ConsultarRemicion.php");}
if ($verdato == 31){include("Expediente/ExpedientesRemitidos/ModificarExpediente.php");}
if ($verdato == 32){include("Expediente/ExpedientesRemitidos/ObtenerExpedientesNinos.php");}
if ($verdato == 33){include("Expediente/ExpedientesRemitidos/RemitirExpediente.php");}
if ($verdato == 34){include("Expediente/IngresarExpediente.php");}
if ($verdato == 35){include("Expediente/RemitirComisaria/RemitirComisaria.php");}
if ($verdato == 36){include("Expediente/RemitirEnlaceMunicipal/RemitirEnlaceMunicipal.php");}
if ($verdato == 37){include("Expediente/RemitirJuezFamilia/RemitirJuezfamilia.php");}
if ($verdato == 38){include("Expediente/RemitirComisaria/RemitirComisariaUsuario.php");}
if ($verdato == 39){include("Expediente/RemitirEnlaceMunicipal/RemitirEnlaceMunicipalUsuario.php");}
if ($verdato == 40){include("Expediente/RemitirJuezFamilia/RemitirJuezfamiliaUsuario.php");}
if ($verdato == 41){include("CrearExpediente.php");}
if ($verdato == 42){include("MPC/ConsultarMPC1.php");}
if ($verdato == 43){include("MPC/IngresarMPCSinNNA.php");}
if ($verdato == 44){include("RegistrarNNA.php");}
if ($verdato == 45){include("menuadministrador/ConsultarRegistrosMPCSINNNA.php");}
if ($verdato == 46){include("cuida.php");}
if ($verdato == 47){include("MPC/AsignarMPC.php");}
if ($verdato == 48){include("menuadministrador/ConsultarNNAAsignarMPC.php");}
if ($verdato == 49){include("menuadministrador/ConsultarAsignarMPC.php");}
if ($verdato == 50){include("MPC/AsignarNNA.php");}
if ($verdato == 51){include("Expediente/TotalExpedientes/ConsultarRegistrarExpediente.php");}
if ($verdato == 52){include("Expediente/EliminarExpediente.php");}
if ($verdato == 53){include("Expediente/ExpedientesRemitidos/ModificarAgresor.php");}
if ($verdato == 54){include("admin/usuario_nuevo.php");}
if ($verdato == 55){include("admin/usuario_edit.php");}
if ($verdato == 56){include("admin/usuario_edit_pos.php");}
if ($verdato == 57){include("admin/usuario_nuevo_pos.php");}
if ($verdato == 58){include("admin/usuario_ver.php");}
//if ($verdato == 59){include("Usuarios/UsuariosRegistrados.php");}
if ($verdato == 60){include("admin/disca_nuevo.php");}
if ($verdato == 61){include("admin/disca_edit.php");}
if ($verdato == 62){include("admin/disca_edit_pos.php");}
if ($verdato == 63){include("admin/disca_nuevo_pos.php");}
if ($verdato == 64){include("admin/entidad_nuevo.php");}
if ($verdato == 65){include("admin/entidad_edit.php");}
if ($verdato == 66){include("admin/entidad_edit_pos.php");}
if ($verdato == 67){include("admin/entidad_nuevo_pos.php");}
if ($verdato == 68){include("admin/disca_ver.php");}
if ($verdato == 69){include("admin/entidad_ver.php");}
if ($verdato == 70){include("admin/eps_nuevo.php");}
if ($verdato == 71){include("admin/eps_edit.php");}
if ($verdato == 72){include("admin/eps_edit_pos.php");}
if ($verdato == 73){include("admin/eps_nuevo_pos.php");}
if ($verdato == 74){include("admin/eps_ver.php");}
if ($verdato == 75){include("admin/etnias_nuevo.php");}
if ($verdato == 76){include("admin/etnias_edit.php");}
if ($verdato == 77){include("admin/etnias_edit_pos.php");}
if ($verdato == 78){include("admin/etnias_nuevo_pos.php");}
if ($verdato == 79){include("admin/etnias_ver.php");}
if ($verdato == 80){include("admin/indicadores_nuevo.php");}
if ($verdato == 81){include("admin/indicadores_edit.php");}
if ($verdato == 82){include("admin/indicadores_edit_pos.php");}
if ($verdato == 83){include("admin/indicadores_nuevo_pos.php");}
if ($verdato == 84){include("admin/indicadores_ver.php");}
if ($verdato == 85){include("admin/lugar_nuevo.php");}
if ($verdato == 86){include("admin/lugar_edit.php");}
if ($verdato == 87){include("admin/lugar_edit_pos.php");}
if ($verdato == 88){include("admin/lugar_nuevo_pos.php");}
if ($verdato == 89){include("admin/lugar_ver.php");}
if ($verdato == 90){include("admin/maltrato_nuevo.php");}
if ($verdato == 91){include("admin/maltrato_edit.php");}
if ($verdato == 92){include("admin/maltrato_edit_pos.php");}
if ($verdato == 93){include("admin/maltrato_nuevo_pos.php");}
if ($verdato == 94){include("admin/maltrato_ver.php");}
if ($verdato == 95){include("admin/motivo_nuevo.php");}
if ($verdato == 96){include("admin/motivo_edit.php");}
if ($verdato == 97){include("admin/motivo_edit_pos.php");}
if ($verdato == 98){include("admin/motivo_nuevo_pos.php");}
if ($verdato == 99){include("admin/motivo_ver.php");}
if ($verdato == 110){include("admin/perfiles_nuevo.php");}
if ($verdato == 111){include("admin/perfiles_edit.php");}
if ($verdato == 112){include("admin/perfiles_edit_pos.php");}
if ($verdato == 113){include("admin/perfiles_nuevo_pos.php");}
if ($verdato == 114){include("admin/perfiles_ver.php");}
if ($verdato == 115){include("admin/victimas_nuevo.php");}
if ($verdato == 116){include("admin/victimas_edit.php");}
if ($verdato == 117){include("admin/victimas_edit_pos.php");}
if ($verdato == 118){include("admin/victimas_nuevo_pos.php");}
if ($verdato == 119){include("admin/victimas_ver.php");}





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
                                    <div class="row clearfix pi1x ps">
                                        <div >
                                            <img class="img-responsive  center-block  borde_blanco " src="img/logo_integracion_social.png" width="45%" alt=""/>
                                            <FONT COLOR="Ivory"><h4 align="center">Versión 3.0 - 2022</H4></FONT>

                                        </div>

                                    </div>
                                </div>
                            </footer>
    </body>
</html>

        <!-- page content -->

<?php //echo mysqli_close($con); ?>
<!-- JAVASCRIPT -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Select2 -->
	<script src="js/select2/dist/js/select2.min.js"></script>
