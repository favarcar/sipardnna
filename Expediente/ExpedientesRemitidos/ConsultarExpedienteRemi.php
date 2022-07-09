
    <section style="background-color: #FFFF;">
        <div class="container ps ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <h2 class="centrar letra n600 azulo pi">Expedientes</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar"> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="letra n500"><a href="main.php?key=0">Volver Men&uacute; Principal</a></li>
                        <li role="presentation" class="letra n500"><a a href="main.php?key=12">Consultar Expedientes</a></li>
                        <li role="presentation" class="letra n500"><a href="#">Consultar Expedientes Remitidos</a></li>
                        <li role="presentation" class="letra n500"><a href="main.php?key=16">Consultar Total de Expedientes</a></li>
                    </ul>
                    <input type="button" id="refresh" value="Actualizar" onclick="location.reload()" style="display:none" />
                </div>
            </div>
        </div>
    </section>


    <form name="form1" method="post" action="#" id="cdr">
        <center>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente</h5>
            <input name="busca" type="text" id="busqueda">
            <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        </center> <br>
        <section class="fblanco">
            <div class="container pu pi">
                <?php
                if (isset($_POST['Submit'])) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td colspan="10" class="letra n600 azulo">Total Niños, Niñas o Adolescentes Registrados:
                                    <?php 
                                    if (!empty($id_usuario88)) {
                                        $con44 = mysqli_query($con, "SELECT count(id_remite), 	id_usuario, id_ninnos FROM remite where id_usuario = '$id_usuario88'");
                                        while ($row44 = mysqli_fetch_array($con44)) {
                                            echo $nom_asignatura44 = $row44['count(id_remite)'];
                                            $id_usuario44 = $row44['id_usuario'];
                                            $id_ninnos44 = $row44['id_ninnos'];
                                        }
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
                                <td class="col-md-4 control-label letra n600 azulo">Consultar Expedientes</td>
                            </tr>
                            <tbody>
                                <?php $busca = "";
                                $busca = $_POST['busca'];
                                if ($busca != "") {
                                    $busqueda = "";
                                    if (!empty($id_usuario)) {
                                        $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where Apellidos LIKE '%" . $busca . "%' OR No_identificacion LIKE '%" . $busca . "%' and  id_usuario='$id_usuario'");
                                    } else if (!empty($id_ninnos44)) {
                                        $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where Apellidos LIKE '%" . $busca . "%' OR No_identificacion LIKE '%" . $busca . "%' and  id_usuario='$id_usuario' and id_ninnos='$id_ninnos44'");
                                    }
                                    //cambiar nombre de la tabla de busqueda
                                    while ($row = mysqli_fetch_array($busqueda)) {
                                        $apellidos = $row['Apellidos'];
                                        $nombres = $row['Nombres'];
                                        $numero_documento = $row['No_identificacion'];
                                        $id_pais = $row['id_pais'];
                                        $id_departamento = $row['id_departamento'];
                                        $id_municipio = $row['id_municipio'];
                                        $id_provincia = $row['id_provincia'];
                                        $edad = $row['Edad'];
                                        $id_ninnos = $row['id_ninnos'];
                                ?>
                                        <tr>
                                            <td><?php echo $apellidos; ?>&nbsp;<?php echo $nombres; ?></td>
                                            <td align="center"><?php echo $numero_documento; ?></td>
                                            <td align="center">
                                                <?php
                                                $busqueda3 = mysqli_query($con, "SELECT * FROM paises where id_pais = '$id_pais'");
                                                while ($row3 = mysqli_fetch_array($busqueda3)) {
                                                    echo $row3["Nombre"];
                                                }
                                                ?>
                                            </td>
                                            <td class="center">
                                                <?php
                                                $busqueda4 = mysqli_query($con, "SELECT * FROM departamentos WHERE id = '$id_departamento'");
                                                while ($row4 = mysqli_fetch_array($busqueda4)) {
                                                    echo $row4["descripcion"];
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['descripcion'];
                                                } ?></td>
                                            <td align="center">
                                                <?php $busqueda2 = mysqli_query($con, "SELECT * FROM provincias where id_provincia='$id_provincia'  ");
                                                while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                    echo $row2['descripcion_prov'];
                                                } ?></td>
                                            <td align="center">
                                                <?php echo $edad;  ?>
                                            </td>
                                            <td>
                                                <h5 class="letra n500  azulo centrar ps linku "><a href="ObtenerExpedientesNinos.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar</a></h5>
                                            </td>
                                    <?php }
                                } ?>
                                        </tr>
                        </table>
                    <?php } else { ?>
                        <section class="fblanco">
                            <div class="container pu pi">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="11" class="letra n600 azulo" bgcolor="#ff9933">Total Niños, Niñas o Adolescentes Registrados:
                                                <?php
                                                $con44 = mysqli_query($con, "SELECT count(id_remite), 	id_usuario, id_ninnos FROM remite where id_usuario = '$id_usuario'");
                                                while ($row44 = mysqli_fetch_array($con44)) {
                                                    echo $nom_asignatura44 = $row44['count(id_remite)'];
                                                    $id_usuario44 = $row44['id_usuario'];
                                                    $id_ninnos44 = $row44['id_ninnos'];
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
                                            <td class="col-md-4 control-label letra n600 azulo">Consultar Expedientes</td>
                                        </tr>
                                        <tbody>
                                            <?php
                                            $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where id_usuario = '$id_usuario' and id_ninnos='$id_ninnos44'  order by id_ninnos desc"); //cambiar nombre de la tabla de busqueda
                                            while ($row = mysqli_fetch_array($busqueda)) {
                                                $apellidos = $row['Apellidos'];
                                                $nombres = $row['Nombres'];
                                                $numero_documento = $row['No_identificacion'];
                                                $id_pais = $row['id_pais'];
                                                $id_departamento = $row['id_departamento'];
                                                $id_municipio = $row['id_municipio'];
                                                $id_provincia = $row['id_provincia'];
                                                $edad = $row['Edad'];
                                                $id_ninnos = $row['id_ninnos'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $apellidos; ?>&nbsp;<?php echo $nombres; ?></td>
                                                    <td align="center"><?php echo $numero_documento; ?></td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                            echo $row1['descripcion'];
                                                        } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda2 = mysqli_query($con, "SELECT * FROM provincias where id_provincia='$id_provincia'  ");
                                                       while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                            echo $row2['descripcion'];
                                                        } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $edad;  ?>
                                                    </td>
                                                    <td>
                                                        <h5 class="letra n500  azulo centrar ps linku "><a href="ObtenerExpedientesNinos.php?id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar</a>
                                                        </h5>
                                                    </td>
                                            <?php }
                                        } ?>
                                                </tr>
                                    </table>
    </form>
    <div class="clearfix"></div>
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

</html>
    </div>
    </div>
    </section>
</body>

</html>