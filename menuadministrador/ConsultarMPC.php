

    <form name="form1" method="post" action="main.php?key=2" id="cdr">
        <center>
            <h3 class="centrar letra n600 azulo pi">Consultar o Asignar Madres, Padres o Cuidadores</h3>
            <br>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento del Ni&ntilde;o Ni&ntilde;a o Adolescentes</h5>
            <input name="busca" type="text" id="busqueda">
            <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        </center>
        <br> 

        <section class="fblanco">
            <div class="container pu pi">
                <?php
                $id_ninos21 = 0;
                if (isset($_POST['Submit'])) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Total Usuarios Registrados:
                                    <?php
                                    $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna");
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
                                <td class="col-md-4 control-label letra n600 azulo">Consultar Madres, Padres o Cuidadores</td>
                            </tr>

                            <tbody>
                                <?php
                                $busca = "";
                                $busca = $_POST['busca'];
                                if ($busca != "") {
                                    $busqueda = mysqli_query($con, "SELECT * FROM cuidadores WHERE Apellidos_cuidadores LIKE '%" . $busca . "%' OR No_Cedula LIKE '%" . $busca . "%'"); //cambiar nombre de la tabla de busqueda
                                    while ($row = mysqli_fetch_array($busqueda)) {
                                        $apellidos          = $row['Apellidos_cuidadores'];
                                        $nombres            = $row['Nombres_cuidadores'];
                                        $numero_documento   = $row['No_Cedula'];
                                        $id_municipio       = $row['id_municipio'];
                                        $id_provincia       = $row['id_provincia'];
                                        $edad               = $row['Edad'];
                                        $id_ninos           = $row['id_ninos'];
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
                                                <?php
                                                $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio'  ");
                                                while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                    echo $row1['descripcion'];
                                                } ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                $busqueda2 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia = '$id_provincia' ");
                                                while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                    echo $row2['descripcion_prov'];
                                                } ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $edad; ?>
                                            </td>
                                            <td align="center">
                                            <?php 
                                                    $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_ninos='$id_ninos' ");
                                                    while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                        $id_ninos21 = $row21['id_ninos'];
                                                    }
                                                    ?>
                                                        <?php
                                                        //Condicional para restringir consulta solo si este cuenta con cuidador
                                                        if ($id_ninos == $id_ninos21){   
                                                        echo '<a href="main.php?key=45&id_ninnos='.$id_ninos.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar datos del cuidador"><span class="glyphicon glyphicon-search"></span> Consultar</a>';
                                                        }?> 
                                                        <!--Mediante esta condicional se dará permiso a los diferentes roles-->
                                                        <?php
                                                        if($nuser == 1 || $nuser == 2) {
                                        
                                                            echo '<a href="main.php?key=10&id_ninnos='.$id_ninos.'"class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Registrar cuidador asignado"><span class="glyphicon glyphicon-edit"></span> Registrar</a>';
                                                      
                                                        } 
                                                        elseif($nuser == 3) {
                                                            echo "NO tiene Cuidador asignado"; 
                                                        }
                                                        ?>
                                                    </td>
                                            <?php
                                            }
                                        } ?>
                                                </tr>
                        </table>

                    <?php
                } else { ?> <!--Interfaz del formulario de consultas-->
                        <section class="fblanco">
                            <div class="container pu pi">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="11" class="letra n600 azulo" bgcolor="#ff9933">Total Usuarios Registrados:
                                                <?php
                                                $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna");
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
                                            <td class="col-md-4 control-label letra n600 azulo">Consultar Madres, Padres o Cuidadores</td>
                                        </tr>

                                        <tbody>
                                            
	                                        <?php 
                                            
                                            $busquedac = mysqli_query($con,"SELECT * FROM cuidadores" ); //cambiar nombre de la tabla de busqueda
                                            while($row = mysqli_fetch_array($busquedac)){
                                                $apellidos          = $row['Apellidos_cuidadores'];
                                                $nombres            = $row['Nombres_cuidadores'];
                                                $numero_documento   = $row['No_Cedula'];
                                                $id_municipio       = $row['id_municipio'];
                                                $id_provincia       = $row['id_provincia'];
                                                $edad               = $row['Edad'];
                                                $id_ninos           = $row['id_ninos'];
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
                                                        <?php
                                                        $busqueda1 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio='$id_municipio' ");
                                                        while ($row1 = mysqli_fetch_array($busqueda1)) {
                                                            echo $row1['descripcion'];
                                                        } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        $busqueda2 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia='$id_provincia' ");
                                                        while ($row2 = mysqli_fetch_array($busqueda2)) {
                                                            echo $row2['descripcion_prov'];
                                                        } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $edad; ?>
                                                    </td>
                                                    <?php 
                                                   
                                                   
                                                     ?>
                                                    <?php

                                                    ?>
                                                    <td align="center">
                                                        <?php
                                                       $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_cuidadores= $id_cuidador ");
                                                       while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                           $id_cuida = $row21['id_cuidadores'];
                                                           $id_ninos21 = $row21['id_ninos'];
                                                       }
                                                     /* $busquedamp = mysqli_query($con, "SELECT * FROM ninnosnna");
                                                      while ($row22 = mysqli_fetch_array($busquedamp)) {
                                                      $id_ninnoscui = $row22['id_ninnos'];
                                                      $id_cuidadoresnna = $row22['id_cuidadores'];
                                                   }*/                                                        
                                                       // if ($id_ninos == $id_ninos21){                                                        
                                                        echo '<a href="main.php?key=45&id_cuidadores='.$id_cuida.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar datos del cuidador"><span class="glyphicon glyphicon-search"></span> Consultar</a></h5>';
                                                        //}?> <br> <br>
                                                        <?php
                                                        if($nuser == 1 || $nuser == 2) {
                                        
                                                            echo '<a href="main.php?key=10&id_cuidadores='.$id_cuida.'"class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Registrar cuidador asignado"><span class="glyphicon glyphicon-edit"></span> Registrar</a>';
                                                      
                                                        } 
                                                        elseif($nuser == 3) {
                                                            echo "NO tiene Cuidador asignado"; 
                                                        }
                                                        ?>
                                                    </td>
                                            <?php
                                            }
                                        } ?>
                                                </tr>
                                                <!--<iframe name="usuario" src="MPC/ConsultarMPC.php" width="100%" height="0" frameborder="0" transparency="transparency" onload="autofitIframea(this);" scrolling="no"></iframe>-->

                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>
        </section>
    </form>