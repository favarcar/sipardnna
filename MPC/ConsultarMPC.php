<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sistema de Informaci&oacute;</title>
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

<body class="fblanco">
    <script language="JavaScript">
        function Borra(idcliente) {
            var agree = confirm("¿Realmente desea eliminar el cliente seleccionado?");
            if (agree) {
                document.location = "eliminar.php?id=" + idcliente;
            } else return false;
        }
    </script>

    <?php
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
    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
    $fila = mysqli_fetch_array($resultado);
    $nombres = $fila['nombres'];
    $apellido = $fila['apellidos'];
    ?>
    <h3 class="centrar letra n600 azulo pi">Registrar Madres, Padres o Cuidadores</h3>
    <form name="form1" method="post" action="ConsultarMPC.php" id="cdr" >

        <center>
            <br>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento del Ni&ntilde;o Ni&ntilde;a o Adolescente</h5>
            <input name="busca" type="text" id="busqueda">
            <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        </center>
        <br>
        <section class="fblanco">
            <div class="container pu pi">

                <?php
                if (isset($_POST['Submit'])) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td colspan="10" class="letra n600 azulo">Total Usuarios Registrados:
                                    <?php
                                    $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna where id_usuario='$id_usuario'");
                                    while ($row4 = mysqli_fetch_array($con4)) {
                                        echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                                <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                                <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                                <td class="col-md-4 control-label letra n600 azulo">Departamento</td>
                                <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                                <td class="col-md-4 control-label letra n600 azulo">Provincia</td>
                                <td class="col-md-4 control-label letra n600 azulo">Edad</td>
                                <td class="col-md-4 control-label letra n600 azulo">Registrar Madres, Padres o Cuidadores</td>
                                <td class="col-md-4 control-label letra n600 azulo">Consultar/Editar Madres, Padres o Cuidadores</td>
                                <td class="col-md-4 control-label letra n600 azulo">Eliminar Madres, Padres o Cuidadores</td>
                            </tr>
                            <tbody>
                                <?php
                                $busca = "";
                                $busca = $_POST['busca'];
                                if ($busca != "") {
                                    $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where Apellidos LIKE '%" . $busca . "%' OR No_identificacion LIKE '%" . $busca . "%' and  id_usuario='$id_usuario'"); //cambiar nombre de la tabla de busqueda
                                    while ($row = mysqli_fetch_array($busqueda)) {
                                        $apellidos = $row['Apellidos'];
                                        $nombres = $row['Nombres'];
                                        $numero_documento = $row['No_identificacion'];
                                        $id_pais = $row['id_pais'];
                                        $id_departamento = $row['id_departamento'];
                                        $id_municipio = $row['id_municipio'];
                                        $id_provincia = $row['id_provincia'];
                                        $edad = $row['Edad'];
                                        $id_ninos = $row['id_ninnos'];
                                ?>
                                        <tr>
                                            <td><?php echo $apellidos; ?>&nbsp;<?php echo $nombres; ?></td>
                                            <td align="center"><?php echo $numero_documento; ?></td>
                                            <td align="center">
                                                <?php
                                                $busqueda1 = mysqli_query($con, "SELECT * FROM paises where Id_Pais='$id_pais'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['Nombre'];
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                $busqueda1 = mysqli_query($con, "SELECT * FROM departamentos where id='$id_departamento'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['descripcion'];
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['descripcion'];
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                $busqueda2 = mysqli_query($con, "SELECT * FROM provincias where id_provincia='$id_provincia'  ");
                                                while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                    echo $row2['descripcion_prov'];
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $edad; ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores where 	id_ninos='$id_ninos'  ");
                                                while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                    $id_ninos21 = $row21['id_ninos'];
                                                }
                                                if ($id_ninos == $id_ninos21) {
                                                    echo "Ya tiene Cuidador asignado";
                                                } else {
                                                ?>
                                                    <h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=10&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Registrar</a></h5>
                                            </td>
                                        <?php } ?>
                                        <td align="center">
                                            <?php if ($id_ninos == $id_ninos21) { ?>
                                                <h5 class="letra n500  azulo centrar ps linku "><a href="ConsultarRegistrosMPC.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar/Editar</a></h5>
                                            <?php } else {
                                                echo "NO tiene Cuidador asignado";
                                            } ?>
                                        </td>
                                        <td>
                                            <h5 class="letra n500  azulo centrar ps linku "><a href="EliminarRegistrosMPC.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Eliminar</a></h5>
                                        </td> <?php
                                            }
                                        } ?>
                                        </tr>
                        </table>
                    <?php
                } else {
                    ?>
                        <section class="fblanco">
                            <div class="container pu pi">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="11" class="letra n600 azulo">Total Usuarios Registrados:
                                                <?php
                                                $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna where id_usuario='$id_usuario'");
                                                while ($row4 = mysqli_fetch_array($con4)) {
                                                    echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                                            <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Departamento</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Provincia</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Edad</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Registrar Madres, Padres o Cuidadores</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Consultar/Editar Madres, Padres o Cuidadores</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Eliminar Madres, Padres o Cuidadores</td>
                                        </tr>
                                        <tbody>
                                            <?php
                                            $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_usuario = '$id_usuario' ORDER BY id_ninnos DESC"); //cambiar nombre de la tabla de busqueda
                                            while ($row = mysqli_fetch_array($busqueda)) {
                                                $apellidos = $row['Apellidos'];
                                                $nombres = $row['Nombres'];
                                                $numero_documento = $row['No_identificacion'];
                                                $id_pais = $row['id_pais'];
                                                $id_departamento = $row['id_departamento'];
                                                $id_municipio = $row['id_municipio'];
                                                $id_provincia = $row['id_provincia'];
                                                $edad = $row['Edad'];
                                                $id_ninos = $row['id_ninnos'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $apellidos; ?>&nbsp;<?php echo $nombres; ?></td>
                                                    <td align="center"><?php echo $numero_documento; ?></td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda1 = mysqli_query($con, "SELECT * FROM paises where Id_Pais='$id_pais'  ");
                                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                            echo $row1['Nombre'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda1 = mysqli_query($con, "SELECT * FROM departamentos where id='$id_departamento'  ");
                                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                            echo $row1['descripcion'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        $id_ninos21 = "";
                                                        $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                            echo $row1['descripcion'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda2 = mysqli_query($con, "SELECT * FROM provincias where id_provincia='$id_provincia'  ");
                                                        while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                            echo $row2['descripcion_prov'];
                                                        } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $edad;  ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores where 	id_ninos='$id_ninos'  ");
                                                        while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                            $id_ninos21 = $row21['id_ninos'];
                                                        }
                                                        if ($id_ninos == $id_ninos21) {
                                                            echo "Ya tiene Cuidador asignado";
                                                        } else {
                                                        ?>
                                                            <h5 class="letra n500  azulo centrar ps linku "><a href="IngresarMPC.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Registrar</a></h5>
                                                    </td> <?php
                                                        } ?>
                                                <td align="center">
                                                    <?php if ($id_ninos == $id_ninos21) { ?>
                                                        <h5 class="letra n500  azulo centrar ps linku "><a href="ConsultarRegistrosMPC.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar/Editar</a></h5>
                                                    <?php } else {
                                                        echo "NO tiene Cuidador asignado";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <h5 class="letra n500  azulo centrar ps linku "><a href="EliminarRegistrosMPC.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Eliminar</a></h5>
                                                </td> <?php
                                                    }
                                                } ?>
                                                </tr>
                                    </table>
    </form>
    </div>
    </div>
    </section>
</body>

</html>