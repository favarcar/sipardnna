<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sistema de Informaci&oacute;</title>
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

    </head>

    <body class="fblanco">
        <script language="JavaScript">
            function Borra(idcliente){
                var agree = confirm("¿Realmente desea eliminar el cliente seleccionado?");
                if (agree){
                    document.location="eliminar.php?id="+idcliente;
                }
                else return false;
            }
        </script>

        <?php
            
            $codigo_expediente21 = 0;
            $id_ninnos = $_GET['id_ninnos'];
        ?>

        <form name="form1" method="post" action="ConsultarExpediente.php" id="cdr" >
            <center>
                <h3 class="centrar letra n600 azulo pi">Consultar Expedientes de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</h3>
            </center>

            <section class="fblanco">
                <div class="container pi3x">
                    <section class="fblanco">
                        <div class="container pu pi">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td colspan="9" class="letra n600 azulo">Total de Expedientes Registrados:
                                        <?php
                                            $con4 = mysqli_query($con,"SELECT count(id_ninnos) FROM expediente WHERE id_ninnos = '$id_ninnos' ");
                                            while($row4 = mysqli_fetch_array($con4)){
                                                echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="9" class="letra n600 azulo" align="center">
                                        <?php
                                            $con44 = mysqli_query($con,"SELECT * FROM ninnosnna WHERE id_ninnos = '$id_ninnos' ");
                                            while($row44 = mysqli_fetch_array($con44)){
                                                $id_ninnos = $row44['id_ninnos'];
                                                echo $Apellidos44 = $row44['Apellidos'];
                                        ?> &nbsp;
                                            <?php
                                                echo $Nombres44 = $row44['Nombres'];
                                            ?>
                                        </td>
                                    </tr>
                                        <?php
                                            }
                                        ?>
                                    <tr>
                                        <td class="col-md-4 control-label letra n600 azulo">No. Expediente</td>
                                        <td class="col-md-4 control-label letra n600 azulo">Fecha de Expediente</td>
                                        <td class="col-md-4 control-label letra n600 azulo">Nombre Cuidadores </td>
                                        <td class="col-md-4 control-label letra n600 azulo">Descripci&oacute;n del Expediente</td>
                                        <td class="col-md-4 control-label letra n600 azulo">Estado del Expediente</td>
                                        <td class="col-md-4 control-label letra n600 azulo">Consultar Expediente</td>
                                        <td class="col-md-4 control-label letra n600 azulo">Consultar Remisi&oacute;n </td>
                                    </tr>

                                    <tbody>
                                    <?php
                                        list($id_ninnos1, $codigo_expediente, $Fecha_inicio_expediente, $Descripcion_expediente, $id_estadocaso) = array("", "", "", "", "");
                                        $busqueda = mysqli_query($con,"SELECT * FROM expediente WHERE id_ninnos = '$id_ninnos' ORDER BY id_ninnos DESC ");//cambiar nombre de la tabla de busqueda
                                        while($row = mysqli_fetch_array($busqueda)){
                                            $id_ninnos1             = $row['id_ninnos'];
                                            $codigo_expediente      = $row['codigo_expediente'];
                                            $Fecha_inicio_expediente= $row['Fecha_inicio_expediente'];
                                            $Descripcion_expediente = $row['Descripcion_expediente'];
                                            $id_estadocaso          = $row['id_estadocaso'];
                                        }
                                    ?>

                                        <tr>
                                            <td align="center"><?php echo $codigo_expediente;?> </td>
                                            <td align="center"><?php echo $Fecha_inicio_expediente; ?></td>
                                            <td align="center">
                                            <?php
                                                $busqueda2 = mysqli_query($con,"SELECT * FROM cuidadores WHERE id_ninos='$id_ninnos'  ");
                                                while($row2 = mysqli_fetch_array($busqueda2)){
                                                    echo $row2['Apellidos_cuidadores'];
                                            ?> &nbsp;
                                            <?php

                                                echo $row2['Nombres_cuidadores'];
                                                }
                                            ?>
                                            </td>

                                            <td align="center"><textarea disabled>
                                            <?php
                                                echo $Descripcion_expediente; ?></textarea>
                                            </td>
                                            <td>
                                            <?php
                                                $busqueda3 = mysqli_query($con,"SELECT * FROM estado_caso WHERE id_estadocaso='$id_estadocaso' ");
                                                while($row3 = mysqli_fetch_array($busqueda3)){
                                                     $row3['id_estadocaso'];
                                                    echo $row3['descripcion_estado_caso'];
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                echo '<h5 class="letra n500 azulo centrar ps linku"><a href="main.php?key=19&codigo_expediente='.$codigo_expediente.'"class="linku"> Consultar</a></h5>';
                                                 ?>
                                                <td>
                                            <?php
                                                $busqueda21 = mysqli_query($con,"SELECT * FROM remite WHERE codigo_expediente='$codigo_expediente'  ");
                                                while($row21 = mysqli_fetch_array($busqueda21)){
                                                    $codigo_expediente21 = $row21['codigo_expediente'];
                                                }
                                                    if($codigo_expediente==$codigo_expediente21){
                                                ?>
                                                <?php
                                                    }
                                                    else{
                                                        echo "Expediente NO Remitido";
                                                        }
                                                    ?>
                                            </td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </form>
    </body>
</html>
