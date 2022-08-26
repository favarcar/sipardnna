
<!--Tabla para consultar o eliminar datos del NNA-->
<form name="form1" method="post" action="main.php?key=14" id="cdr">
        <center><br>
            <h2 class="centrar letra n600 azulo pi">Consultar o Eliminar NNA</h2>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento </h5>
            <input name="busca" type="text" id="busqueda">
            <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        </center>
       
        <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="letra n500"><a href="main.php?key=8">Registrar NNA</a></li>
                        <li role="presentation" class="letra n500"><a href="main.php?key=48">Registrar o Asignar MPC</a></li>
                        <li role="presentation" class="letra n500"><a href="#">Eliminar NNA</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
                <?php

                if (isset($_POST['Submit'])) { ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Total Ni&ntilde;os, Ni&ntilde;as Adolecentes Registrados: <?php
                                                                                                                                    $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna where id_usuario='$id_usuario'");

                                                                                                                                    while ($row4 = mysqli_fetch_array($con4)) {
                                                                                                                                        echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                                                                                                                    }  ?> </td>
                            </tr>
                            <tr>
                                <!--Tabla para consultar o eliminar datos del NNA-->
                                <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                                <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                                <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                                <td class="col-md-4 control-label letra n600 azulo">Departamento</td>                                
                                <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                                <td class="col-md-4 control-label letra n600 azulo">Provincia</td>

                                <td class="col-md-4 control-label letra n600 azulo">Edad</td>

                                <td class="col-md-4 control-label letra n600 azulo">Consultar/Editar NNA</td>
                                <td class="col-md-4 control-label letra n600 azulo">Eliminar</td>

                            </tr>
                            <tbody> <!--Buscar en la base de datos con numero de identificación o apellido a un NNA-->
                                <?php
                                $busca = "";
                                $busca = $_POST['busca'];

                                if ($busca != "") {
                                    $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where Apellidos LIKE '%" . $busca . "%' OR No_identificacion LIKE '%" . $busca . "%' and id_usuario='$id_usuario'"); //cambiar nombre de la tabla de busqueda
                                    while ($row = mysqli_fetch_array($busqueda)) {
                                        $id_ninnos = $row['id_ninnos'];
                                        $id_pais = $row['id_pais'];
                                        $id_departamento = $row['id_departamento'];
                                        $apellidos = $row['Apellidos'];
                                        $nombres = $row['Nombres'];
                                        $numero_documento = $row['No_identificacion'];
                                        $id_municipio = $row['id_municipio'];
                                        $id_provincia = $row['id_provincia'];
                                        $edad = $row['Edad'];


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
                                                <?php
                                                $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['descripcion'];
                                                }
                                                ?></td>
                                            <td align="center">
                                                <?php
                                                $busqueda2 = mysqli_query($con, "SELECT * FROM provincias where id_provincia='$id_provincia'  ");
                                                while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                    echo $row2['descripcion_prov'];
                                                }
                                                ?></td>
                                            <td align="center">
                                                <?php echo $edad;  ?></td>
                                                <!--Consultar datos del NNA-->
                                                <td align="center">
                                                        <a href="main.php?key=5&id_ninnos='.$id_ninnos.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar</a>
                                                   <!--Determinar si es posible eliminar datos del NNA-->
                                                        <td align="center">
                                                        <?php 
                                                        if (!(consulta_campo('expediente','id_ninnos',$id_ninnos,'codigo_expediente'))){
                                                            echo '<a  class="btn btn-danger" href="javascript:borrado('.$id_ninnos.',\'ninnosnna\',\'id_ninnos\','.$verdato.')"><span class="glyphicon glyphicon-trash"></span>  Eliminar</a>';} 
                                                            else{echo '<button class="btn btn-secundary  data-toggle="tooltip" data-placement="bottom" title="Elimine primero el expediente"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}

                                                    ?>
                                                    </td>
                                    <?php }
                                } ?>
                                        </tr>



                        </table>

                    <?php
                } else { ?>
                        <section class="fblanco">
                            <div class="container pu pi">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="11" class="letra n600 azulo" bgcolor="#ff9933">Total Ni&ntilde;os, Ni&ntilde;as Adolecentes Registrados: <?php
                                                                                                                                                $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna where id_usuario='$id_usuario'");

                                                                                                                                                while ($row4 = mysqli_fetch_array($con4)) {
                                                                                                                                                    echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                                                                                                                                }  ?> </td>
                                        </tr>
                                        <tr> <!--Tabla para consultar o eliminar datos del NNA-->
                                            <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                                            <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Departamento</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Provincia</td>

                                            <td class="col-md-4 control-label letra n600 azulo">Edad</td>

                                            <td class="col-md-4 control-label letra n600 azulo">Consultar/Editar NNA</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Eliminar</td>
                                        </tr>
                                        <tbody>
                                            <!--Traer datos del NNA-->
                                            <?php
                                            $busquedanna = mysqli_query($con,"SELECT * FROM ninnosnna  WHERE id_municipio_hechos ='$id_municipio' ORDER BY Apellidos ASC " );
                                            while ($row = mysqli_fetch_array($busquedanna)) {
                                                $id_pais = $row['id_pais'];
                                                $id_departamento = $row['id_departamento'];
                                                $apellidos = $row['Apellidos'];
                                                $nombres = $row['Nombres'];
                                                $numero_documento = $row['No_identificacion'];
                                                $id_municipio = $row['id_municipio_hechos'];
                                                $id_provincia = $row['id_provincia'];
                                                $edad = $row['Edad'];
                                                $id_ninnos = $row['id_ninnos']

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
                                                        <?php
                                                        $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                            echo $row1['descripcion'];
                                                        }
                                                        ?></td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda2 = mysqli_query($con, "SELECT * FROM provincias where id_provincia='$id_provincia'  ");
                                                        while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                            echo $row2['descripcion_prov'];
                                                        }
                                                        ?></td>
                                                    <td align="center">
                                                        <?php echo $edad;  ?></td>
                                                        <!--Consultar los datos del NNA-->
                                                    <td align="center">
                                                        
                                                        <?php echo '<a href="main.php?key=5&id_ninnos='.$id_ninnos.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar</a>';?>
                                                        
                                                        </td>

                                                        <!--Determinar si es posible borara los datos del NNA-->
                                                    <td align="center">
                                                        <?php 
                                                        if (!(consulta_campo('expediente','id_ninnos',$id_ninnos,'codigo_expediente'))){
                                                            echo '<a  class="btn btn-danger" href="javascript:borrado('.$id_ninnos.',\'ninnosnna\',\'id_ninnos\','.$verdato.')"><span class="glyphicon glyphicon-trash"></span>  Eliminar</a>';} 
                                                            else{echo '<button class="btn btn-secundary  data-toggle="tooltip" data-placement="bottom" title="Elimine primero el expediente"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}

                                                    ?>
                                                    </td>
                                            <?php }
                                        } ?>
                                                </tr>
                                    </table>
    </form>
    </div>
    </div>
    </section>
    <div class="clearfix"></div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>


            </div>
        </div>
    </footer>
</body>

</html>