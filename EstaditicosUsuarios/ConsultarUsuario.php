<?php
include('../conexion/conexion.php');
//Iniciar Sesión
$id_usuario = $_GET['id_usuario'];
?>

<!doctype html>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Consultar Cursos</title>
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
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
</head>

<body class="fblanco">
    <center>
        <h3 class="centrar letra n600 azulo pi">Consultar Ingresos al Sistema</h3>
    </center>

    <section class="fblanco">
        <div class="container pu pi">
            <div class="table-responsive">
                <form>
                    <table width="90%" border="1" id="tab" style="background:#FFFFFF" align="center" class="table">
                        <tr>
                            <td colspan="2" class="letra n600 azulo">Nombre del Usuario:
                                <?php $con4 = mysqli_query($con, "SELECT apellidos, nombres, id_perfil FROM usuarios WHERE id_usuario = '$id_usuario'");
                                while ($row4 = mysqli_fetch_array($con4)) {
                                    echo $apellidos = $row4['apellidos']; ?>&nbsp;<?php echo $nombres = $row4['nombres']; ?>
                            <?php $id_perfil = $row4['id_perfil'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="letra n600 azulo">Cargo:
                                <?php $con5 = mysqli_query($con, "SELECT * FROM perfiles WHERE id_perfil = '$id_perfil'");
                                while ($row5 = mysqli_fetch_array($con5)) {
                                    echo $descripcion = $row5['descripcion'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="letra n600 azulo">Total de Ingresos:
                                <?php
                                $busqueda3 = mysqli_query($con, "SELECT count(id_usuario) FROM logins WHERE id_usuario = '$id_usuario' "); //cambiar nombre de la tabla de busqueda
                                while ($row3 = mysqli_fetch_array($busqueda3)) {
                                    echo $id_usuario11 = $row3['count(id_usuario)'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-4 control-label letra n600 azulo" align="center">Fecha</td>
                            <td class="col-md-4 control-label letra n600 azulo" align="center">Hora</td>
                        </tr>

                        <tbody>
                            <?php $busqueda = mysqli_query($con, "SELECT * FROM logins WHERE id_usuario = '$id_usuario' "); //cambiar nombre de la tabla de busqueda
                            while ($row = mysqli_fetch_array($busqueda)) {
                                $fecha = $row['fecha'];
                                $hora = $row['hora']; ?>
                                <tr>
                                    <td align="center"><?php echo $fecha; ?></td>
                                    <td align="center"><?php echo $hora; ?></td>
                                <?php } ?>
                                </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>
</body>

</html>