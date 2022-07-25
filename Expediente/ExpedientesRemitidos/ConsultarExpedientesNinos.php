<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sistema de Informaci&oacute;</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../../css/bootstrap.css">

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


    $id_ninnos = $_GET['id_ninnos'];
    //Iniciar Sesión
 

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
    <form name="form1" method="post" action="ConsultarExpediente.php" id="cdr">
        <center>
            <h3 class="centrar letra n600 azulo pi">Consultar Expedientes de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</h3>

        </center>


        <section class="fblanco">
            <div class="container pi3x">



                <section class="fblanco">
                    <div class="container pu pi">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered"">
                                <tr>
                                    <td colspan="9" class="letra n600 azulo">Total de Expedientes Registrados: <?php
                                                                                                                $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM expediente where id_usuario_exp='$id_usuario' and id_ninnos = '$id_ninnos' ");

                                                                                                                while ($row4 = mysqli_fetch_array($con4)) {
                                                                                                                    echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                                                                                                }  ?> </td>
                                </tr>
                                <tr>
                                    <td colspan="9" class="letra n600 azulo" align="center">
                                        <?php
                                        $con44 = mysqli_query($con, "SELECT * FROM ninnosnna where id_usuario='$id_usuario' and id_ninnos = '$id_ninnos' ");

                                        while ($row44 = mysqli_fetch_array($con44)) {
                                            $id_ninnos = $row44['id_ninnos'];
                                            echo $Apellidos44 = $row44['Apellidos']; ?>
                                            &nbsp;
                                            <?php
                                            echo $Nombres44 = $row44['Nombres'];
                                            ?>


                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9" align="center">
                                        <h5 class="letra n500  azulo "><a href="main.php?key=34&id_ninnos=<?php echo $row44['id_ninnos']; ?>" class=" btn btn-primary">Registrar Nuevo Expediente</a></h5>
                                    </td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <td class="col-md-4 control-label letra n600 azulo">No. Expediente</td>
                                <td class="col-md-4 control-label letra n600 azulo">Fecha de Expediente</td>
                                <td class="col-md-4 control-label letra n600 azulo">Nombre Cuidadores </td>
                                <td class="col-md-4 control-label letra n600 azulo">Descripci&oacute;n del Expediente</td>

                                <td class="col-md-4 control-label letra n600 azulo">Estado del Expediente</td>

                                <td class="col-md-4 control-label letra n600 azulo">Consultar/Editar Expediente</td>

                                <td class="col-md-4 control-label letra n600 azulo">Remitir Expediente </td>

                                <td class="col-md-4 control-label letra n600 azulo"> Consultar Quien Remite </td>




                            </tr>
                            <tbody>
                                <?php

                                $busqueda = mysqli_query($con, "SELECT * FROM expediente where id_usuario_exp='$id_usuario'  and id_ninnos = '$id_ninnos' order by id_ninnos  desc "); //cambiar nombre de la tabla de busqueda
                                while ($row = mysqli_fetch_array($busqueda)) {

                                    $id_ninnos1 = $row['id_ninnos'];
                                    $codigo_expediente = $row['codigo_expediente'];
                                    $Fecha_inicio_expediente = $row['Fecha_inicio_expediente'];
                                    $Descripcion_expediente = $row['Descripcion_expediente'];
                                    $id_estadocaso = $row['id_estadocaso'];



                                ?>
                                    <tr>

                                        <td align="center"><?php echo $codigo_expediente; ?> </td>
                                        <td align="center"><?php echo $Fecha_inicio_expediente;  ?></td>
                                        <td align="center">
                                            <?php
                                            $busqueda2 = mysqli_query($con, "SELECT * FROM cuidadores where id_ninos='$id_ninnos'  ");
                                            while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                echo $row2['Apellidos_cuidadores']; ?>
                                                &nbsp;
                                            <?php echo $row2['Nombres_cuidadores'];
                                            }
                                            ?>
                                        </td>
                                        <td align="center"><textarea><?php echo $Descripcion_expediente; ?></textarea></td>
                                        <td><?php
                                            $busqueda2 = mysqli_query($con, "SELECT * FROM estado_caso where 	id_estadocaso='$id_estadocaso'  ");
                                            while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                $row2['id_estadocaso'];
                                                echo $row2['descripcion_estado_caso'];
                                            }

                                            ?></td>
                                        <td>

                                            <a href="main.php?key=31&codigo_expediente=<?php echo $row['codigo_expediente']; ?>&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar expediente"><span class="glyphicon glyphicon-search" ></span> Consultar / Editar</a>

                                        </td>
                                        <td>
                                            <?php
                                            $codigo_expediente21 = "";
                                            $busqueda21 = mysqli_query($con, "SELECT * FROM remite where 	codigo_expediente='$codigo_expediente'  ");
                                            while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                $codigo_expediente21 = $row21['codigo_expediente'];
                                            }

                                            if ($codigo_expediente == $codigo_expediente21) {
                                                echo "Expediente Remitido";
                                            } else {
                                            ?>
                                                <a href="main.php?key=33&codigo_expediente=<?php echo $row['codigo_expediente']; ?>&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Remitir expediente"><span class="glyphicon glyphicon-share" ></span> Remitir</a> <?php } ?>

                                        </td>

                                        <td>
                                            <?php

                                            $busqueda21 = mysqli_query($con, "SELECT * FROM remite where 	codigo_expediente='$codigo_expediente'  ");
                                            while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                $codigo_expediente21 = $row21['codigo_expediente'];
                                            }

                                            if ($codigo_expediente == $codigo_expediente21) { ?>

                                                <h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=30&codigo_expediente=<?php echo $row['codigo_expediente']; ?>&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar Remisi&oacute;n</a></h5>
                                            <?php

                                            } else {
                                                echo "Expediente NO Remitido";
                                            } ?>

                                        </td>


                                    <?php   } ?>
                                    </tr>
                            </table>
                                        </section>
    </form>
    <div class="clearfix"></div>
            </section>
            
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="css/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="css/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="css/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="css/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="css/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


    <!-- PNotify -->
    <script src="css/pnotify/dist/pnotify.js"></script>
    <script src="css/pnotify/dist/pnotify.buttons.js"></script>
    <script src="css/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ui-pnotify').remove();
        });
    </script>

    <script src="js/jsAddExpediente.js"></script>

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