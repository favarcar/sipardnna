<?php
include('../conexion/conexion.php');

//Iniciar Sesión
$id_usuario = $_GET['id_usuario'];
$id_tipo_documento = $_GET['id_tipo_documento'];
$id_genero = $_GET['id_genero'];
$id_municipio = $_GET['id_municipio'];
$id_perfil = $_GET['id_perfil'];

$busqueda = mysqli_query($con, "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' "); //cambiar nombre de la tabla de busqueda
while ($row = mysqli_fetch_array($busqueda)) {
    $apellidos          = $row['apellidos'];
    $nombres            = $row['nombres'];
    $id_tipo_documento  = $row['id_tipo_documento'];
    $numero_documento   = $row['numero_documento'];
    $id_genero          = $row['id_genero'];
    $id_municipio       = $row['id_municipio'];
    $telefono           = $row['telefono'];
    $usuario            = $row['usuario'];
    $clave              = $row['clave'];
    $correo             = $row['correo'];
    $id_perfil          = $row['id_perfil'];
    $id_entidad         = $row['id_entidad'];
    $estado             = $row['estado'];
    $fecha_registro     = $row['fecha_registro'];
    //$descripcion=$row['descripcion'];
} ?>
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
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
</head>

<body>
    <?php
    date_default_timezone_set('America/Bogota');
    $time  = time();
    $fecha = date("Y-m-d", $time);
    ?>

    <section class="fblanco">
        <div class="container pi3x">
            <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <h3 class="centrar letra n600 azulo pi"> Autorizar Registro</h3>

                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario</label>
                        <div class="col-md-4">
                            <input id="id_usu" name="id_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $id_usuario; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-4">
                            <input id="nom_usu" name="nom_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $nombres; ?>" readonly>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-4">
                            <input id="textinput" name="ape_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo  $apellidos; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. Docuemento </label>
                        <div class="col-md-4">
                            <input id="textinput" name="num_doc_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $numero_documento; ?>" readonly>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-4">

                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM tipos_documentos where id_tipo_documento='$id_tipo_documento' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_tipo_documento = $row1['id_tipo_documento'];
                                $descripcion = $row1['descripcion'];
                            } ?>
                            <select name="tip_doc_usu" id="tip_doc_usu" class="form-control" font style="text-transform: uppercase;">
                                <option value="<?php echo $id_tipo_documento ?>"><?php echo $descripcion ?></option>
                                <?php $con = mysqli_query($con, "select * from  tipos_documentos");
                                $reg = mysqli_fetch_array($con);
                                do {
                                    $id = $reg['id_tipo_documento'];
                                    $des = $reg['descripcion']; ?>
                                    <option value="<?php echo $id; ?>"><?php echo $des; ?> </option>
                                <?php } while ($reg = mysqli_fetch_array($con)); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Género</label>
                        <div class="col-md-4">
                            <select name="genero_usu" id="genero_usu" class="form-control" font style="text-transform: uppercase;">
                                <?php include('../conexion/conexion.php');
                                $busqueda1 = mysqli_query($con, "SELECT * FROM generos WHERE id_genero = '$id_genero' ");
                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                    $id_genero = $row1['id_genero'];
                                    $descripcion = $row1['descripcion'];
                                } ?>
                                <option value="<?php echo $id_genero ?>"><?php echo $descripcion ?></option>
                                <?php $con = mysqli_query($con, "SELECT * FROM generos");
                                $reg = mysqli_fetch_array($con);
                                do {
                                    $id_usu = $reg['id_genero'];
                                    $des_usu = $reg['descripcion']; ?>
                                    <option value="<?php echo $id_usu; ?>"><?php echo $des_usu; ?> </option>
                                <?php } while ($reg = mysqli_fetch_array($con)); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                        <div class="col-md-4">
                            <select name="municipio_usu" id="municipio_usu" disabled class="form-control" font style="text-transform: uppercase;">
                                <?php include('../conexion/conexion.php');
                                $busqueda100 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio ='$id_municipio' ");
                                $descripcion100 = "";
                                while ($row100 = mysqli_fetch_array($busqueda100)) {
                                    $id_municipio100    = $row100['id_municipio'];
                                    $descripcion100     = $row100['descripcion'];
                                } ?>
                                <option selected value="<?php echo $id_municipio100; ?>"><?php echo $descripcion100; ?></option>
                                <?php
                                $con99 = mysqli_query($con, "select * from municipios");
                                $reg99 = mysqli_fetch_array($con99);
                                do {
                                    $id_mun = $reg99['id_municipio'];
                                    $des_mun = $reg99['descripcion']; ?>
                                    <option value="<?php echo $id_mun; ?>"><?php echo $des_mun; ?> </option>
                                <?php
                                } while ($reg99 = mysqli_fetch_array($con99)); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Cargo</label>
                        <div class="col-md-4">
                            <select name="cargo_usu" id="cargo_usu" class="form-control" font style="text-transform: uppercase;">
                                <?php include('../conexion/conexion.php');
                                $busqueda1 = mysqli_query($con, "SELECT * FROM perfiles where id_perfil='$id_perfil' ");
                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                    $id_perfil = $row1['id_perfil'];
                                    $descripcion = $row1['descripcion'];
                                } ?>
                                <option value="<?php echo $id_perfil; ?>"><?php echo $descripcion; ?></option>
                                <?php $con = mysqli_query($con, "select * from perfiles");
                                $reg = mysqli_fetch_array($con);
                                do {
                                    $id_car = $reg['id_perfil'];
                                    $des_cam = $reg['descripcion']; ?>
                                    <option value="<?php echo $id_car; ?>"><?php echo $des_cam; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con)); ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                        <div class="col-md-4">
                            <input id="textinput" name="tel_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required value="<?php echo $telefono ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-4">
                            <input id="textinput" name="email_usu" type="email" placeholder="" class="form-control input-md" required value="<?php echo $correo ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Usuario</label>
                        <div class="col-md-4">
                            <input id="textinput" name="usuario_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $usuario ?>" readonly>
                        </div>
                    </div>

                    <!-- Button Drop Down -->
                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Contraseña</label>
                        <div class="col-md-4">
                            <input id="textinput" name="contra_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $clave ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="radios">Autorizar Acceso<span class="centrar letra n600 azulo pi"></span></label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="radios-0">
                                <input <?php if ($estado == "1") {
                                            echo "checked";
                                        } ?> value="1" type="radio" name="estado" />Autorizado
                            </label>
                            <label class="radio-inline" for="radios-1">
                                <input <?php if ($estado == "0") {
                                            echo "checked";
                                        } ?> value="0" type="radio" name="estado" />Denegado
                            </label>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_entidad</label>
                        <div class="col-md-4">
                            <input id="textinput" name="id_entidad" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $id_entidad ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Registro</label>
                        <div class="col-md-4">
                            <input id="textinput" name="fecha" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $fecha_registro ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Autorizar</button>
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

        include('../conexion/conexion.php');

        $id_usu = $_POST['id_usu'];
        $nom_usu = $_POST['nom_usu'];
        $ape_usu = $_POST['ape_usu'];
        $num_doc_usu = $_POST['num_doc_usu'];
        $tip_doc_usu = $_POST['tip_doc_usu'];
        $genero_usu = $_POST['genero_usu'];        
        $cargo_usu = $_POST['cargo_usu'];
        $tel_usu = $_POST['tel_usu'];
        $email_usu = $_POST['email_usu'];
        $usuario_usu = $_POST['usuario_usu'];
        $contra_usu = $_POST['contra_usu'];
        $id_entidad = $_POST['id_entidad'];
        $estado = $_POST['estado'];
        $fecha_ing = $_POST['fecha'];




        mysqli_query($con, "UPDATE `usuarios` SET `id_usuario`='$id_usu',`apellidos`='$ape_usu',`nombres`='$nom_usu',`id_tipo_documento`='$tip_doc_usu',`numero_documento`='$num_doc_usu',`id_genero`='$genero_usu',`telefono`='$tel_usu',`usuario`='$usuario_usu',`clave`='$contra_usu',`correo`='$email_usu',`id_perfil`='$cargo_usu',`id_entidad`=' $id_entidad',`estado`='$estado',`fecha_registro`='$fecha_ing' WHERE id_usuario='$id_usuario'");

        mysqli_close($con);


        echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "UsuariosRegistrados.php"
</script>';
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