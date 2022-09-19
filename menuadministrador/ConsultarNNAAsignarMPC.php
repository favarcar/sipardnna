<script language="JavaScript">
        function Borra(idcliente) {
            var agree = confirm("¿Realmente desea eliminar el cliente seleccionado?");
            if (agree) {
                document.location = "eliminar.php?id=" + idcliente;
            } else return false;
        }
    </script>

    <form name="form1" method="post" action="main.php?key=48" id="cdr">
        <center><br>
            <h2 class="centrar letra n600 azulo pi">Registrar o Asignar MPC a Ni&ntilde;os Ni&ntilde;as o Adolescentes</h2>
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
                <li role="presentation" class="letra n500"><a href="#">Registrar o Asignar MPC</a></li>
                    <li role="presentation" class="letra n500"><a href="main.php?key=14">Eliminar NNA</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container ps1x ">
    
                <?php
                if (isset($_POST['Submit'])) {
                ?>
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>   
                            <td colspan="10" class="letra n600 azulo"bgcolor="#ff9933">Total Ni&ntilde;os, Ni&ntilde;as Adolescentes Registrados:
                                    <?php $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna");
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
                                    <td class="col-md-4 control-label letra n600 azulo">Registrar MPC</td>
                                    <td class="col-md-4 control-label letra n600 azulo">Asignar MPC</td>
                                    <td class="col-md-4 control-label letra n600 azulo">Consultar o editar NNA</td>
                                </tr>
                                
                                <tbody>
                                <?php $busca = "";
                                $busca = $_POST['busca'];
                                if ($busca != "") {
                                    $busquedaninia = mysqli_query($con, "SELECT * FROM ninnosnna where Apellidos LIKE '%" . $busca . "%' OR No_identificacion LIKE '%" . $busca . "%'"); //cambiar nombre de la tabla de busqueda
                                    while ($row = mysqli_fetch_array($busquedaninia)) {
                                        $apellidos          = $row['Apellidos'];
                                        $nombres            = $row['Nombres'];
                                        $numero_documento   = $row['No_identificacion'];
                                        $id_municipio       = $row['id_municipio_hechos'];
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

                                            <?php if($nuser == 1 || $nuser == 2) { ?>
                                                <td align="center">
                                                <a href="main.php?key=10&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Registrar cuidador"><span class="glyphicon glyphicon-edit"></span> Registrar</a>      
                                                <br><br>
                                                <td align="center">
                                                      <a href="main.php?key=47&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Asignar cuidador ya registrado"><span class="glyphicon glyphicon-check"></span> Asignar      </a>

                                            <?php  } 
                                                   elseif($nuser == 3) {
                                                    echo "NO tiene Cuidador asignado"; 
                                                        }
                                                        ?>
                                            <td align="center">
            
                                                        
                                            <a href="main.php?key=5&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar<br>o editar</a>

                                           </td>     
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
                            <td class="col-md-4 control-label letra n600 azulo">Registrar MPC</td>
                            <td class="col-md-4 control-label letra n600 azulo">Asignar MPC</td>
                            <td class="col-md-4 control-label letra n600 azulo">Consultar o editar NNA</td>
                        </tr>
                        <tbody>
                        <?php $busqueda = mysqli_query($con,"SELECT * FROM ninnosnna  WHERE id_municipio_hechos ='$id_municipio' ORDER BY Apellidos ASC " ); //cambiar nombre de la tabla de busqueda
                       while($row = mysqli_fetch_array($busqueda)){
                                $apellidos          = $row['Apellidos'];
                                $nombres            = $row['Nombres'];
                                $numero_documento   = $row['No_identificacion'];
                                $id_municipio       = $row['id_municipio_hechos'];
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
                                        
                                    

                                            <?php if($nuser == 1 || $nuser == 2) { ?>
                                                <td align="center">
                                                <a href="main.php?key=10&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Registrar cuidador"><span class="glyphicon glyphicon-edit"></span> Registrar</a>      
                                                <br><br>    
                                                <td align="center">                                                              
                                                      <a href="main.php?key=47&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Asignar cuidador ya registrado"><span class="glyphicon glyphicon-check"></span> Asignar </a>
                                            
                                            <?php  } 
                                                   elseif($nuser == 3) {
                                                    echo "NO tiene Cuidador asignado"; 
                                                        }
                                                        ?>
                                                <td align="center">
                                                <a href="main.php?key=5&id_ninnos=<?php echo $row['id_ninnos']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar<br>o editar</a>

                                           </td>                                       
                                        <?php
                                                    $busquedacui = mysqli_query($con, "SELECT *  FROM cuidadores");
                                                   while ($row24 = mysqli_fetch_array($busquedacui)) {
                                                    $id_cuidadore = $row24['id_cuidadores'];
                                                    $id_ninos = $row24['id_ninos'];

                                                        
                                                   }


                                                   $busqueda21 = mysqli_query($con, "SELECT * FROM ninnosnna ");
                                                    while ($row21 = mysqli_fetch_array($busqueda21)) {
                                                        $id_ninos21 = $row21['id_ninnos'];
                                                        $id_cuida21 = $row21['id_cuidadores'];

                                                    }
                                                    if ($id_ninos == $id_ninos21) {
                                                        //echo "Ya tiene Cuidador asignado";
                                                    } else { ?>
                                                    <?php
                                                    }
                                                    ?>

                                                    </td>
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
