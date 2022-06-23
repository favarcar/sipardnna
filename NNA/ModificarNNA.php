<?php
include('../conexion/conexion.php');
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
$id_municipio = $fila['id_municipio'];


list(
    $id_ninnos1,
    $id_tipo_documento,
    $No_identificacion,
    $Nombres,
    $Apellidos,
    $Fecha_Nacimiento,
    $Edad,
    $Direccion,
    $id_genero,
    $id_estrato,
    $id_niveleducativo,
    $id_cuidadores,
    $id_departamento,
    $id_municipio,
    $id_provincia,
    $id_regimen,
    $id_eps,
    $id_etnia,
    $Puntaje_Sisben,
    $id_zona,
    $fecha_ingreso,
    $id_usuario,
    $id_pais
) = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

$id_ninnos = $_GET['id_ninnos'];
$busqueda = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_ninnos = '$id_ninnos' "); //cambiar nombre de la tabla de busqueda
while ($row = mysqli_fetch_array($busqueda)) {
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
    $id_pais = $row['id_pais'];
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registro</title>
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
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
    <script>
        function obtenerMunicipios(val) {
            $.ajax({
                type: "POST",
                url: "../get_municipio.php",
                data: 'id_departamento=' + val,
                success: function(data) {
                    $("#municipio_nna").html(data);
                }
            });
        }

        function obtenerProvincia(val) {
            $.ajax({
                type: "POST",
                url: "../get_provincia.php",
                data: 'id_municipio=' + val,
                success: function(data) {
                    $("#provincia_nna").html(data);
                }
            });
        }

        function obtenerEps(val) {
            $.ajax({
                type: "POST",
                url: "../get_eps.php",
                data: 'id_regimen=' + val,
                success: function(data) {
                    $("#eps_nna").html(data);
                }
            });
        }

        function obtenerDepartamento(val, iden) {
            $.ajax({
                type: "POST",
                url: "../get_departamentos.php",
                data: {
                    id: val,
                    identificador: iden
                },
                success: function(data) {

                    if (iden == '1' && val != '42') {

                        $("#departamento_nna").html(data);
                        $("#municipio_nna").html(data);
                        $("#provincia_nna").html(data);

                    } else if (iden == '1' && val == '42') {
                        $("#departamento_nna").html(data);
                    }

                    if (iden == '2') {

                        $("#municipio_nna").html(data);
                    }
                    if (iden == '3') {

                        $("#provincia_nna").html(data);
                    }

                }
            });
        }
    </script>
</head>
<header style="background-color: #64AF59;">
    <div class="container">
        <div class="row clearfix ps pi2x">
            <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6"><br>
                <div align="center" class="letra n700  azulo centrar">
                    <h1><b>Sistema de Informaci&oacute;n para el Restablecimiento de Derechos de Ni&ntilde;os, Ni&ntilde;as y Adolescentes</b></h1>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi">
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi linku">
                <h3 class="centrar letra azulo n400"><strong>Bienvenido Comisar&iacute;a de Familia</strong></h3>
                <h4 class="centrar letra azulo n500"><b>Municipio:</b> <?php $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio' ");
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
                <h2 class="centrar letra n600 azulo pi">Ni&ntilde;os y Ni&ntilde;as o Adolescentes NNA</h2>
            </div>
        </div>
    </div>
</section>
<section class="fblanco">
    <div class="container ps2x ">
        <div class="row clearfix centrar">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="letra n500"><a href="../MenuComisariaFamilia.php">Volver Men&uacute; Principal</a></li>
                    <li role="presentation" class="letra n500"><a href="../MenuNinosNinasAdo.php">Nuevo Registro NNA</a></li>
                    <li role="presentation" class="letra n500"><a href="../NNA/ConsultarNNA.php">Consultar NNA</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<body>
    <?php
    include("../conexion/conexion.php");
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha =  date("Y-m-d", $time);
    ?>



    <section class="fblanco">
        <div class="container pi3x">
            <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <h3 class="centrar letra n600 azulo pi">Modificar Formulario Ni&ntilde;os Ni&ntilde;as o Adolescentes</h3>
                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_ninos</label>
                        <div class="col-md-4">
                            <input id="textinput" name="id_ninnos" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $id_ninnos1;  ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-4">
                            <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Nombres; ?>" required>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-4">
                            <input id="textinput" name="ape_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM tipos_documentos where id_tipo_documento='$id_tipo_documento' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_tipo_documento = $row1['id_tipo_documento'];
                                $descripcion = $row1['descripcion'];
                            }
                            ?>
                            <select name="tip_doc_nna" id="tip_doc_nna" required class="form-control">
                                <option value="<?php echo $id_tipo_documento; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                $con11 = mysqli_query($con, "select * from  tipos_documentos");
                                $reg11 = mysqli_fetch_array($con11);
                                do {
                                    $id11 = $reg11['id_tipo_documento'];
                                    $des11 = $reg11['descripcion'];
                                ?>
                                    <option value="<?php echo $id11; ?>"><?php echo $des11; ?> </option>
                                <?php } while ($reg11 = mysqli_fetch_array($con11)); ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento</label>
                        <div class="col-md-4">
                            <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" required>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>
                        <div class="col-md-4">
                            <input id="fecha_nna" name="fecha_nna" type="date" placeholder="" class="form-control input-md" onchange="calculate_age()" onkeypress="return numeros(event)" value="<?php echo $Fecha_Nacimiento;  ?>">

                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>
                        <div class="col-md-4">
                            <input id="edad_nna" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Edad ?>">
                            <script type="text/javascript">
                                function calculate_age() {
                                    var dob = new Date($("#fecha_nna").val());
                                    var diff_ms = Date.now() - dob.getTime();
                                    var age_dt = new Date(diff_ms);

                                    var age = Math.abs(age_dt.getUTCFullYear() - 1970);
                                    $("#edad_nna").val(age);
                                }
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                        <div class="col-md-4">
                            <select name="genero_nna" id="genero_nna" required class="form-control">
                                <?php $busqueda1 = mysqli_query($con, "SELECT * FROM generos where id_genero='$id_genero' ");
                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                    $des_genero = $row1['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_genero; ?>"><?php echo $des_genero;  ?></option>
                                <?php
                                $con1 = mysqli_query($con, "select * from  generos");
                                $reg1 = mysqli_fetch_array($con1);
                                do {
                                    $id_genero = $reg1['id_genero'];
                                    $descripcion = $reg1['descripcion'];
                                ?>
                                    <option value="<?php echo $id_genero; ?>"><?php echo $descripcion; ?> </option>
                                <?php
                                } while ($reg1 = mysqli_fetch_array($con1));
                                ?>

                            </select>
                        </div>
                    </div>
                    <?php
                    $consulta_paises = $mysqli->query("SELECT * FROM paises ORDER BY Nombre");
                    $consulta_departamentos = $mysqli->query("SELECT id, descripcion FROM departamentos ORDER BY descripcion");
                    $consulta_municipios = $mysqli->query("SELECT id_municipio, descripcion FROM municipios ORDER BY descripcion");
                    $consulta_provincia = $mysqli->query("SELECT id_provincia, descripcion_prov FROM provincias ORDER BY descripcion_prov");
                    $consulta_regimen = $mysqli->query("SELECT id_regimen, descripcion FROM regimenes");
                    $consulta_eps = $mysqli->query("SELECT id_eps, descripcion FROM eps ORDER BY descripcion");
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Pais de nacimiento</label>
                        <div class="col-md-4">
                            <select name="pais_nna" id="pais_nna" class="form-control" onchange="obtenerDepartamento(this.value, '1')" required>
                                <?php
                                if (!empty($id_pais)) {
                                    $busqueda53 = mysqli_query($con, "SELECT * FROM paises WHERE Id_Pais = '$id_pais' ");
                                    while ($row53 = mysqli_fetch_array($busqueda53)) {
                                        $descripcion = $row53['Nombre'];
                                    }
                                ?>
                                    <option value="<?php echo $id_pais; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                }
                                while ($row = $consulta_paises->fetch_object()) {
                                    echo "<option value = '" . $row->Id_Pais . "' >" . $row->Nombre . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Departamento de nacimiento</label>
                        <div class="col-md-4">
                            <select name="departamento_nna" id="departamento_nna" class="form-control" onchange="obtenerDepartamento(this.value, '2')" required>
                                <?php
                                $busqueda13 = mysqli_query($con, "SELECT * FROM departamentos WHERE id = '$id_departamento' ");
                                while ($row13 = mysqli_fetch_array($busqueda13)) {
                                    $descripcion = $row13['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_departamento; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_departamentos->fetch_object()) {
                                    echo "<option value = '" . $row->id . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio de nacimiento</label>
                        <div class="col-md-4">
                            <select name="municipio_nna" id="municipio_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerDepartamento(this.value, '3')" required>
                                <?php
                                $busqueda23 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio = '$id_municipio' ");
                                while ($row23 = mysqli_fetch_array($busqueda23)) {
                                    $descripcion = $row23['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_municipio; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_municipios->fetch_object()) {
                                    echo "<option value = '" . $row->id_municipio . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia</label>
                        <div class="col-md-4">
                            <select name="provincia_nna" id="provincia_nna" class="form-control" style="text-transform: uppercase;" required>
                                <?php
                                $busqueda14 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia = '$id_provincia' ");
                                while ($row14 = mysqli_fetch_array($busqueda14)) {
                                    $id_provincia = $row14['id_provincia'];
                                    $descripcion_prov = $row14['descripcion_prov'];
                                }
                                ?>
                                <option value="<?php echo $id_provincia; ?>"><?php echo $descripcion_prov; ?></option>
                                <?php
                                while ($row = $consulta_provincia->fetch_object()) {
                                    echo "<option value = '" . $row->id_provincia . "' >" . $row->descripcion_prov . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección</label>
                        <div class="col-md-4">
                            <input id="textinput" name="dir_nna" type="text" placeholder="" class="form-control input-md" value="<?php echo $Direccion ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
                        <div class="col-md-4">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM estratos where 	id_estrato='$id_estrato' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_estrato = $row1['id_estrato'];
                                $des_estrato = $row1['descripcion'];
                            } ?>
                            <select name="estrato_nna" id="estrato_nna" class="form-control" required>
                                <option value="<?php echo $id_estrato;  ?>"><?php echo $des_estrato; ?></option>
                                <?php $con4 = mysqli_query($con, "select * from estratos");
                                $reg4 = mysqli_fetch_array($con4);
                                do {
                                    $id_estrato = $reg4['id_estrato'];
                                    $des_estrato = $reg4['descripcion'];
                                ?>
                                    <option value="<?php echo $id_estrato; ?>"><?php echo $des_estrato; ?> </option>
                                <?php
                                } while ($reg4 = mysqli_fetch_array($con4));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel Educativo</label>
                        <div class="col-md-4">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM nivel_educativo where id_niveleducativo='$id_niveleducativo' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_niveleducativo = $row1['id_niveleducativo'];
                                $des_niveleducativo = $row1['descripcion'];
                            }
                            ?>
                            <select name="nivel_educa_nna" id="nivel_educa_nna" class="form-control" required>
                                <option value="<?php echo $id_niveleducativo;  ?>"><?php echo $des_niveleducativo;  ?></option>
                                <?php
                                $con5 = mysqli_query($con, "select * from nivel_educativo");
                                $reg5 = mysqli_fetch_array($con5);
                                do {
                                    $id_niveleducativo = $reg5['id_niveleducativo'];
                                    $des_niveleducativo = $reg5['descripcion'];
                                ?>
                                    <option value="<?php echo $id_niveleducativo; ?>"><?php echo $des_niveleducativo; ?> </option>
                                <?php
                                } while ($reg5 = mysqli_fetch_array($con5));
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Reg&iacute;menes</label>
                        <div class="col-md-4">
                            <select name="regimen_nna" id="regimen_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerEps(this.value);" required>
                                <?php
                                $busqueda15 = mysqli_query($con, "SELECT * FROM regimenes WHERE id_regimen = '$id_regimen' ");
                                while ($row15 = mysqli_fetch_array($busqueda15)) {
                                    $id_regimen = $row15['id_regimen'];
                                    $descripcion = $row15['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_regimen; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_regimen->fetch_object()) {
                                    echo "<option value = '" . $row->id_regimen . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">SGSSS</label>
                        <div class="col-md-4">
                            <select name="eps_nna" id="eps_nna" class="form-control" style="text-transform: uppercase;" required>
                                <?php
                                $busqueda16 = mysqli_query($con, "SELECT * FROM eps WHERE id_eps = '$id_eps' ");
                                while ($row16 = mysqli_fetch_array($busqueda16)) {
                                    $id_eps = $row16['id_eps'];
                                    $descripcion = $row16['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_eps; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_eps->fetch_object()) {
                                    echo "<option value = '" . $row->id_eps . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Etnias</label>
                        <div class="col-md-4">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM etnias where id_etnia='$id_etnia' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_etnia = $row1['id_etnia'];
                                $des_etnia = $row1['descripcion'];
                            }
                            ?>
                            <select name="etnias_nna" id="etnias_nna" class="form-control" required>
                                <option value="<?php echo $id_etnia;  ?>"><?php echo $des_etnia; ?></option>
                                <?php
                                $con8 = mysqli_query($con, "select * from etnias");
                                $reg8 = mysqli_fetch_array($con8);
                                do {
                                    $id_etnia = $reg8['id_etnia'];
                                    $des_etnia = $reg8['descripcion'];
                                ?>
                                    <option value="<?php echo $id_etnia; ?>"><?php echo $des_etnia; ?> </option>
                                <?php
                                } while ($reg8 = mysqli_fetch_array($con8));
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Puntaje del Sisb&eacute;n</label>
                        <div class="col-md-4">
                            <input id="textinput" name="sisben_nna" type="text" placeholder="" class="form-control input-md" value="<?php echo $Puntaje_Sisben ?>" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                        <div class="col-md-4">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM zonas where id_zona='$id_zona' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_zona = $row1['id_zona'];
                                $des_zona = $row1['descripcion'];
                            }
                            ?>
                            <select name="zona_nna" id="zona_nna" class="form-control" required>
                                <option value="<?php echo $id_zona;  ?>"><?php echo $des_zona;  ?></option>
                                <?php
                                $con9 = mysqli_query($con, "select * from zonas");
                                $reg9 = mysqli_fetch_array($con9);
                                do {
                                    $id_zona = $reg9['id_zona'];
                                    $des_zona = $reg9['descripcion'];
                                ?>
                                    <option value="<?php echo $id_zona; ?>"><?php echo $des_zona; ?> </option>
                                <?php
                                } while ($reg9 = mysqli_fetch_array($con9));
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Ingreso</label>
                        <div class="col-md-4">
                            <input id="textinput" name="fecha_ingre_nna" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $fecha_ingreso ?>" required readonly>

                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id Usuario</label>
                        <div class="col-md-4">
                            <input id="textinput" name="id_usuario_nna" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Actualizar</button>
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

        $id_ninnos11 = $_POST['id_ninnos'];
        $nom_nna = strtoupper($_POST['nom_nna']);
        $ape_nna = strtoupper($_POST['ape_nna']);
        $tip_doc_nna = $_POST['tip_doc_nna'];
        $num_nna = $_POST['num_nna'];
        $fecha_nna = $_POST['fecha_nna'];
        $genero_nna = $_POST['genero_nna'];
        $edad_nna = $_POST['edad_nna'];
        $pais_nna = $_POST['pais_nna'];
        $departamento_nna = $_POST['departamento_nna'];
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
        $fecha_ing = $_POST['fecha_ingre_nna'];
        $id_usuario_nna = $_POST['id_usuario_nna'];
        $cuidadores_nna = 0;


        mysqli_query($con, "UPDATE `ninnosnna` SET `id_pais`='$pais_nna',`id_tipo_documento`='$tip_doc_nna',`No_identificacion`='$num_nna',`Nombres`='$nom_nna',`Apellidos`='$ape_nna',`Fecha_Nacimiento`='$fecha_nna',`Edad`='$edad_nna',`Direccion`='$dir_nna',`telefono_movil`='$tel_nna',`correo_electronico`='$email_nna',`id_genero`='$genero_nna',`id_estrato`='$estrato_nna',`id_niveleducativo`='$nivel_educa_nna',`id_cuidadores`='$cuidadores_nna',`id_departamento`='$departamento_nna',`id_municipio`='$municipio_nna',`id_provincia`='$provincia_nna',`id_regimen`='$regimen_nna',`id_eps`='$eps_nna',`id_etnia`='$etnias_nna',`Puntaje_Sisben`='$sisben_nna',`id_zona`='$zona_nna',`fecha_ingreso`='$fecha_ing',`id_usuario`='$id_usuario_nna' WHERE id_ninnos='$id_ninnos'");

        mysqli_close($con);

        echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "ConsultarNNA.php"
</script>';
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
</body>

</html>