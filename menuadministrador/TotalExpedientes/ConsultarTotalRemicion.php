<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Menú Principal dos</title>
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
    <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
</head>

<body>
    <?php
    include("../../conexion/conexion.php");
    $codigo_expediente = $_GET['codigo_expediente'];
    $id_ninnos = $_GET['id_ninnos'];
    ?>
    <?php
    $busqueda50 = mysqli_query($con, "SELECT * FROM remite WHERE codigo_expediente = '$codigo_expediente' "); //cambiar nombre de la tabla de busqueda
    while ($row50 = mysqli_fetch_array($busqueda50)) {
        $id_remite          = $row50['id_remite'];
        $codigo_expediente  = $row50['codigo_expediente'];
        $id_ninnos          = $row50['id_ninnos'];
        $id_usuario         = $row50['id_usuario'];
    }
    $busqueda = mysqli_query($con, "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' "); //cambiar nombre de la tabla de busqueda
    while ($row = mysqli_fetch_array($busqueda)) {
        $nombres            = $row['nombres'];
        $apellidos          = $row['apellidos'];
        $numero_documento   = $row['numero_documento'];
        $id_perfil          = $row['id_perfil'];
        $telefono           = $row['telefono'];
        $correo             = $row['correo'];
        $id_municipio       = $row['id_municipio'];
    }
    ?>
    <section class="fblanco">
        <div class="container pi3x">
            <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <h3 class="centrar letra n600 azulo pi">Consultar Remisi&oacute;n</h3>

                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario</label>
                        <div class="col-md-4">
                            <input id="textinput" name="cod_exp" type="text" placeholder="" class="form-control input-md" value="<?php echo $id_usuario; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Entidad</label>
                        <div class="col-md-4">
                            <input id="textinput" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $apellidos;  ?> <?php echo $nombres;  ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. Documento </label>

                        <div class="col-md-4">
                            <input id="textinput" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $numero_documento; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                        <div class="col-md-4">
                            <select name="municipio_usu" id="municipio_usu" disabled class="form-control" style="text-transform: uppercase;">
                                <?php
                                $busqueda1 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio = '$id_municipio' ");
                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                    $id_municipio = $row1['id_municipio'];
                                    $descripcion = $row1['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_municipio; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                $con1 = mysqli_query($con, "SELECT * FROM municipios");
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
                                $busqueda1 = mysqli_query($con, "SELECT * FROM perfiles WHERE id_perfil = '$id_perfil' ");
                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                    $id_perfil = $row1['id_perfil'];
                                    $descripcion = $row1['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_perfil; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                $con = mysqli_query($con, "SELECT * FROM perfiles");
                                $reg = mysqli_fetch_array($con);
                                do {
                                    $id_car = $reg['id_perfil'];
                                    $des_cam = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_car; ?>"><?php echo $des_cam; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con));
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                        <div class="col-md-4">
                            <input id="tel_usu" name="tel_usu" type="tel" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required value="<?php echo $telefono ?>" readonly>
                        </div>
                    </div>

                    <!-- Text input-->
                    <!-- Text input-->
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-4">
                            <input id="textinput" name="email_usu" type="email" placeholder="" class="form-control input-md" required value="<?php echo $correo ?>" readonly>
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