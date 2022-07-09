<script language="JavaScript">
        function Borra(idcliente) {
            var agree = confirm("¿Realmente desea eliminar el cliente seleccionado?");
            if (agree) {
                document.location = "eliminar.php?id=" + idcliente;
            } else return false;
        }
    </script>

    <form name="form1" method="post" action="main.php?key=1" id="cdr">
        <center>
            <h3 class="centrar letra n600 azulo pi">Consultar Ni&ntilde;os Ni&ntilde;as o Adolescentes</h3>
            <br>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento </h5>
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
                                <th colspan="10" class="letra n600 azulo">Total Ni&ntilde;os, Ni&ntilde;as Adolescentes Registrados:
                                    <?php $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna");
                                    while ($row4 = mysqli_fetch_array($con4)) {
                                        echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                    } ?>
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                                <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                                <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                                <td class="col-md-4 control-label letra n600 azulo">Departamento</td>
                                <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                                <td class="col-md-4 control-label letra n600 azulo">Provincia</td>
                                <td class="col-md-4 control-label letra n600 azulo">Edad</td>
                                <td class="col-md-4 control-label letra n600 azulo">Consultar</td>
                            </tr>

                            <tbody>
                                <?php $busca = "";
                                $busca = $_POST['busca'];
                                if ($busca != "") {
                                    $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where Apellidos LIKE '%" . $busca . "%' OR No_identificacion LIKE '%" . $busca . "%'"); //cambiar nombre de la tabla de busqueda
                                    while ($row = mysqli_fetch_array($busqueda)) {
                                        $apellidos          = $row['Apellidos'];
                                        $nombres            = $row['Nombres'];
                                        $numero_documento   = $row['No_identificacion'];
                                        $id_municipio       = $row['id_municipio'];
                                        $id_provincia       = $row['id_provincia'];
                                        $edad               = $row['Edad'];
                                        $id_pais = $row['id_pais'];
                                        $id_departamento = $row['id_departamento'];
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
                                                ?></td>
                                            <td align="center">
                                                <?php
                                                $busqueda2 = mysqli_query($con, "SELECT * FROM departamentos where id='$id_departamento'  ");
                                                while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                    echo $row2['descripcion'];
                                                }
                                                ?></td>
                                            <td align="center">
                                                <?php $busqueda1 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio='$id_municipio'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['descripcion'];
                                                } ?>
                                            </td>
                                            <td align="center">
                                                <?php $busqueda2 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia='$id_provincia' ");
                                                while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                    echo $row2['descripcion_prov'];
                                                } ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $edad; ?>
                                            </td>
                                            <td align="center">
                                                <h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=5&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar</a></h5>
                                            </td> <?php
                                                }
                                            } ?>
                                        </tr>
                        </table>
                    </div>

    <?php
                } else { ?>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td colspan="11" class="letra n600 azulo" bgcolor="#ff9933">Total Ni&ntilde;os, Ni&ntilde;as Adolescentes Registrados:
                                <?php
                                $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna");
                                while ($row4 = mysqli_fetch_array($con4)) {
                                    echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                }  ?> </td>
                        </tr>
                        <tr>
                            <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                            <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                            <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                            <td class="col-md-4 control-label letra n600 azulo">Departamento</td>
                            <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                            <td class="col-md-4 control-label letra n600 azulo">Provincia</td>
                            <td class="col-md-4 control-label letra n600 azulo">Edad</td>
                            <td class="col-md-4 control-label letra n600 azulo">Consultar</td>
                        </tr>
                        <tbody>
                            <?php $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna ORDER BY id_ninnos  desc "); //cambiar nombre de la tabla de busqueda
                            while ($row = mysqli_fetch_array($busqueda)) {
                                $apellidos          = $row['Apellidos'];
                                $nombres            = $row['Nombres'];
                                $numero_documento   = $row['No_identificacion'];
                                $id_municipio       = $row['id_municipio'];
                                $id_provincia       = $row['id_provincia'];
                                $edad               = $row['Edad'];
                                $id_pais = $row['id_pais'];
                                $id_departamento = $row['id_departamento'];
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
                                        ?></td>
                                    <td align="center">
                                        <?php
                                        $busqueda2 = mysqli_query($con, "SELECT * FROM departamentos where id='$id_departamento'  ");
                                        while ($row2 = mysqli_fetch_array($busqueda2)) {
                                            echo $row2['descripcion'];
                                        }
                                        ?></td>
                                    <td align="center">
                                        <?php $busqueda1 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio='$id_municipio' ");
                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                            echo $row1['descripcion'];
                                        } ?>
                                    </td>
                                    <td align="center">
                                        <?php $busqueda2 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia='$id_provincia' ");
                                        while ($row2 = mysqli_fetch_array($busqueda2)) {
                                            echo $row2['descripcion_prov'];
                                        } ?>
                                    </td>
                                    <td align="center"> <?php echo $edad;  ?></td>
                                    <td align="center">
                                        <h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=5&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="linku">Consultar</a></h5>
                                    </td>
                            <?php
                            }
                        } ?>
                                </tr>
                    </table>
                </div>
            </div>
        </section>
    </form>
