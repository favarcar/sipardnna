

    <form name="form1" method="post" action="main.php?key=49" id="cdr">
        <center><br>
            <h2 class="centrar letra n600 azulo pi">Registrar o Asignar N.N.A. a Madres, Padres o Cuidadores</h2>
            <br>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento del M.P.C.</h5>
            <input name="busca" type="text" id="busqueda">
            <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        </center>
        <br> 

        <section class="fblanco">
            <div class="container pu pi">
            <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="letra n500"><a href="main.php?key=43">Registrar MPC</a></li>
                        <!--<li role="presentation" class="letra n500"><a href="main.php?key=23">Consultar MPC con NNA</a></li>-->
                        <li role="presentation" class="letra n500"><a href="#">Editar MPC / Registrar o Asignar NNA</a></li>                        
                        <li role="presentation" class="letra n500"><a href="main.php?key=42">Eliminar MPC</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

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
                                <td class="col-md-4 control-label letra n600 azulo">Registrar NNA</td>
                                <td class="col-md-4 control-label letra n600 azulo">Asignar NNA</td>
                                <td class="col-md-4 control-label letra n600 azulo">Consultar o editar MPC</td>
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
                                            
                                            <?php   
                                                    
                                                    $busqueda21 = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_ninos='$id_ninos' ");
                                                    while ($row21 = mysqli_fetch_array($busqueda21)) {                                                      
                                                        $idcuida = $row21['id_cuidadores'];                                                            
                                                        $id_ninos21 = $row21['id_ninos'];
                                                        }
                                                 
                                                        ?>
                                                            <?php
                                                        if($nuser == 1 || $nuser == 2) {
                                                        
                                                           ?> 
                                                           <td align="center">
                                                           <a href="main.php?key=44&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Registrar cuidador"><span class="glyphicon glyphicon-edit"></span> Registrar</a>
                                                           <br><br>
                                                           <td align="center">
                                                               <a href="main.php?key=50&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Asignar cuidador"><span class="glyphicon glyphicon-check"></span> Asignar      </a>
                                                              
                                                        <?php 
                                                        } 
                                                        elseif($nuser == 3) {
                                                            echo "NO tiene Cuidador asignado"; 
                                                        }
                                                        ?>
                                                        <td align="center">
                                                        <a href="main.php?key=18&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar<br>o editar</a>

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
                                        <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Total Usuarios Registrados:
                                                <?php
                                                $con4 = mysqli_query($con, "SELECT count(id_cuidadores) FROM cuidadores where id_usuario='$id_usuario'");
                                                while ($row4 = mysqli_fetch_array($con4)) {
                                                    echo $nom_asignatura11 = $row4['count(id_cuidadores)'];
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
                                            <td class="col-md-4 control-label letra n600 azulo">Registrar NNA</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Asignar NNA</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Consultar o editar MPC</td>
                                        </tr>

                                        <tbody>
                                            
	                                        <?php 
                                            
                                            //Traer en la tabla de cuidadores para asignar NNA
	                                        $busquedacui = mysqli_query($con,"SELECT * FROM cuidadores  WHERE id_municipio ='$id_municipio' ORDER BY Apellidos_cuidadores ASC " ); 
                                            while ($row = mysqli_fetch_array($busquedacui)) {
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
                                            <?php 
                                                     $busquedacuidador = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_ninos='$id_ninos' ");
                                                     while ($row21 = mysqli_fetch_array($busquedacuidador)) {                                                      
                                                         $idcuida = $row21['id_cuidadores'];                                                            
                                                         $id_ninos21 = $row21['id_ninos'];
                                                         }

                                                         ?>

                                                         <td align="center">
                                                         <?php
                                                         if($nuser == 1 || $nuser == 2) {
                                         
                                                            ?> <a href="main.php?key=44&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Registrar cuidador"><span class="glyphicon glyphicon-edit"></span> Registrar</a>
                                                            <br><br>
                                                        <td align="center">   
                                                               <a href="main.php?key=50&id_cuidadores=<?php echo $row['id_cuidadores'];?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Asignar cuidador"><span class="glyphicon glyphicon-check"></span> Asignar      </a>
                                                        <?php 
                                                        } 
                                                        elseif($nuser == 3) {
                                                            echo "NO tiene Cuidador asignado"; 
                                                        }
                                                        ?>
                                                        <td align="center">

                                                        <a href="main.php?key=18&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar<br>o editar</a>

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