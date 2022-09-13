<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
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
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>

</head>

<body style="background-color: #64AF59;">
    <?php
    include("conexion/conexion.php");

    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha =  date("Y-m-d", $time);
    ?>
    <header class="f4">
        <div class="container">
            <div class="row clearfix ps pi2x">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div align="center" class="letra n700  azulo centrar">
                        <h2><b>Sistema de Informaci&oacute;n para el Restablecimiento de Derechos de Ni&ntilde;os, Ni&ntilde;as y Adolescentes</b></h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="fblanco">
        <div class="container pi3x">
            <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <h3 class="centrar letra n600 azulo pi">Registro</h3>

                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-4">
                            <input id="nom_usu" name="nom_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-4">
                            <input id="ape_usu" name="ape_usu" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. Documento </label>
                        <div class="col-md-4">
                            <input id="num_doc_usu" name="num_doc_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-4">
                            <select name="tip_doc_usu" id="tip_doc_usu" required class="form-control" font style="text-transform: uppercase;">
                                <option value="">Seleccione</option>
                                <?php
                                $con1 = mysqli_query($con, "SELECT id_tipo_documento, descripcion FROM tipos_documentos");
                                $reg = mysqli_fetch_array($con1);
                                do {
                                    $id = $reg['id_tipo_documento'];
                                    $des = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $des; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con1));
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Género</label>
                        <div class="col-md-4">
                            <select name="genero_usu" id="genero_usu" required class="form-control" font style="text-transform: uppercase;">
                                <option value="">Seleccione</option>
                                <?php
                                $con2 = mysqli_query($con, "SELECT id_genero, descripcion FROM generos");
                                $reg = mysqli_fetch_array($con2);
                                do {
                                    $id_usu = $reg['id_genero'];
                                    $des_usu = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_usu; ?>"><?php echo $des_usu; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con2)); ?>
                            </select>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                        <div class="col-md-4">
                            <select name="municipio_usu" id="municipio_usu" required class="form-control" font style="text-transform: uppercase;">
                                <option value="">Seleccione</option>
                                <?php
                                $con3 = mysqli_query($con, "SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = 15");
                                $reg = mysqli_fetch_array($con3);
                                do {
                                    $id_mun = $reg['id_municipio'];
                                    $des_mun = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_mun; ?>"><?php echo $des_mun; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con3));
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Cargo</label>
                        <div class="col-md-4">
                            <select name="cargo_usu" id="cargo_usu" required class="form-control" font style="text-transform: uppercase;">
                                <option value="">Seleccione</option>
                                <?php
                                $con4 = mysqli_query($con, "SELECT id_perfil, descripcion FROM perfiles");
                                $reg = mysqli_fetch_array($con4);
                                do {
                                    $id_car = $reg['id_perfil'];
                                    $des_cam = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_car; ?>"><?php echo $des_cam; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con4));
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                        <div class="col-md-4">
                            <input id="tel_usu" name="tel_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-4">
                            <input id="email_usu" name="email_usu" type="email" placeholder="" class="form-control input-md" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Usuario</label>
                        <div class="col-md-4">
                            <input id="usuario_usu" name="usuario_usu" type="text" placeholder="" class="form-control input-md" required>
                        </div>
                    </div>

                    <!-- Button Drop Down -->
                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Contraseña</label>
                        <div class="col-md-4">
                            <input id="contra_usu" name="contra_usu" type="password" placeholder="" class="form-control input-md" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

    <footer style="background-color:#64AF59;">
        <div class="container">
            <div class="row clearfix pi1x ps">
                <div>
                    <img class="img-responsive  center-block  borde_blanco " src="img/logo_integracion_social.png" width="60%" alt="" />
                </div>

                <div align="center">
                    <b>GOBERNACI&Oacute;N DE BOYAC&Aacute; <br> SECRETAR&Iacute;A DE INTEGRACI&Oacute;N SOCIAL <br> Sistema de Informaci&oacute;n a&ntilde;o 2021, Versi&oacute;n 2.0</b>
                </div>
            </div>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>');
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <?php

    if ($_POST) {         //si se ha presionado enviar
        $nom_usu         =   $_POST['nom_usu'];
        $ape_usu         =   $_POST['ape_usu'];
        $num_doc_usu     =   $_POST['num_doc_usu'];
        $tip_doc_usu     =   $_POST['tip_doc_usu'];
        $genero_usu      =   $_POST['genero_usu'];
        $municipio_usu   =   $_POST['municipio_usu'];
        $cargo_usu       =   $_POST['cargo_usu'];
        $tel_usu         =   $_POST['tel_usu'];
        $email_usu       =   $_POST['email_usu'];
        $usuario_usu     =   $_POST['usuario_usu'];
        $contra_usu      =   md5($_POST['contra_usu']);
        $id_entidad      =   0;
        $estado          =   0;
        $fecha_registro  = date("Y-m-d H:i:s");
        mysqli_query($con, "INSERT INTO usuarios (apellidos, nombres, id_tipo_documento, numero_documento, id_genero, id_municipio, telefono, usuario, clave, correo, id_perfil, id_entidad, estado, fecha_registro) VALUES('$ape_usu','$nom_usu','$tip_doc_usu','$num_doc_usu','$genero_usu','$municipio_usu','$tel_usu','$usuario_usu','$contra_usu','$email_usu','$cargo_usu','$id_entidad','$estado','$fecha_registro')") or die(mysqli_error($con));

        echo '<script language = javascript>
        alert("la Información ha sido Guardada Correctamente")
        self.location = "index.html"
      </script>';
    }

    ?>
    <script>
        function numeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for (var i in especiales) {
                if (key === especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if (letras.indexOf(tecla) === -1 && !tecla_especial)
                return false;
        }
    </script>

    <script>
        function redimensiona() {
            top.grand(document.body.scrollHeight);
        }
    </script>

</body>

</html>