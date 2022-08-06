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
    <form name="form1" method="post" action="main.php?key=23" id="cdr" >

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
                                <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Total Usuarios Registrados:
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
                                            <td class="col-md-4 control-label letra n600 azulo">Registrar, Consultar o Editar MPC</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Eliminar MPC</td>
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
                                                        $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores where id_ninos='$id_ninos'  ");
                                                        while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                            $id_cuidadores = $row21['id_cuidadores'];
                                                            $id_ninos21 = $row21['id_ninos'];
                                                            
                                                        }
                                                        if ($id_ninos == $id_ninos21) {
                                                            ?>
                                                            <?php echo'<a href="main.php?key=18&id_ninnos='.$id_ninos.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar</a></h5>';
                                                        }?>
                                                        <br>
                                                        <?php
                                                        $busqueda21 = mysqli_query($con, "SELECT * FROM ninnosnna ");
                                                        while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                       $id_cuida21 = $row21['id_cuidadores'];  }
                                                                                                             
                                                        if ($id_cuida21 >=0) {
                                                        echo '<br><a href="main.php?key=10&id_ninnos='.$id_ninos.'"class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Asignar cuidador"><span class="glyphicon glyphicon-edit"></span> Registrar</a>';
                                                        ?>
                                                        </td> 
                                                    
                                                    <?php
                                                        } 
                                                        ?>

                                                <td>
                                                
                                                    <?php 
                                                    if ($id_ninos == $id_ninos21){
                                                        if(consulta_campo('expediente','id_cuidadores',$id_cuidadores,'codigo_expediente')){
                                                            echo '<button class="btn btn-danger" onclick="javascript:Borra(\'cuidadores\','.$id_cuidadores.')"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>';} 
                                                            else{echo '<button class="btn btn-secundary  disabled data-toggle="tooltip" data-placement="bottom" title="Elimine primero el expediente"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';}
                                                        }
                                                        else if($id_ninos != $id_ninos21){echo '<button class="btn btn-secundary  disabled data-toggle="tooltip" data-placement="bottom" title="No tiene cuidador asignado"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}


                                                    } ?> 
                        </table>
                    <?php
                } else {
                    ?>
                        <section class="fblanco">
                            <div class="container pu pi">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Total Usuarios Registrados:
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
                                            <td class="col-md-4 control-label letra n600 azulo">Registrar, Consultar o Editar MPC</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Eliminar MPC</td>
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
                                                        $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores where id_ninos='$id_ninos'  ");
                                                        while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                            $id_cuidadores = $row21['id_cuidadores'];
                                                            $id_ninos21 = $row21['id_ninos'];
                                                            
                                                        }
                                                        if ($id_ninos == $id_ninos21) {
                                                            ?>
                                                            <?php echo'<a href="main.php?key=18&id_ninnos='.$id_ninos.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar</a></h5>';
                                                        
                                                        }?>
                                                        <br>
                                                        <?php
                                                        $busqueda21 = mysqli_query($con, "SELECT * FROM ninnosnna ");
                                                        while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                       $id_cuida21 = $row21['id_cuidadores'];  }
                                                                                                             
                                                        if ($id_cuida21 >=0) {
                                                        echo '<br><a href="main.php?key=10&id_ninnos='.$id_ninos.'"class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Asiganr cuidador"><span class="glyphicon glyphicon-edit"></span> Registrar</a>';
                                                        ?>
                                                        </td> 
                                                    
                                                    <?php
                                                        } 
                                                        ?>

                                                <td>
                                                
                                                    <?php 
                                                    if ($id_ninos == $id_ninos21){
                                                        if(consulta_campo('expediente','id_cuidadores',$id_cuidadores,'codigo_expediente')){
                                                            echo '<button class="btn btn-danger" onclick="javascript:Borra(\'cuidadores\','.$id_cuidadores.')"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>';} 
                                                            else{echo '<button class="btn btn-secundary  data-toggle="tooltip" data-placement="bottom" title="Elimine primero el expediente"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}
                                                        }
                                                        else if($id_ninos != $id_ninos21){echo '<button class="btn btn-secundary  data-toggle="tooltip" data-placement="bottom" title="No tiene cuidador asignado"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}


                                                    } ?>  

                                                </td> 
                                             
                                                                                                                                                   
                                                
                                                 
                                                <?php } 
                                                ?>
                                                
                                                </tr>
                                    </table>
    </form>
    </div>
    </div>
    </section>
    <div class="clearfix"></div>
            </section>
            


    
    
    

    
    
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