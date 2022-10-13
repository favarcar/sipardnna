<!--Buscar M.P.C. -->
        <form name="form1" method="post" action="main.php?key=42" id="cdr">
        <center><br><br>
            <h2 class="centrar letra n600 azulo pi">Consultar o Eliminar Madres, Padres o Cuidadores</h2>
            <br>
            <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento del M.P.C.</h5>
            <input name="busca" type="text" id="busqueda">
            <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        </center>
            
        <section class="fblanco">
            <div class="container pu pi">
            <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="letra n500"><a href="main.php?key=43">Registrar MPC</a></li>
                        <li role="presentation" class="letra n500"><a href="main.php?key=49">Editar MPC / Registrar o Asignar NNA</a></li>                        
                        <li role="presentation" class="letra n500"><a href="#">Eliminar MPC</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
                <?php
                if (isset($_POST['Submit'])) {
                ?>

<div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Total Usuarios Registrados:
                                    <?php
                                    $con4 = mysqli_query($con, "SELECT count(id_cuidadores) FROM cuidadores");
                                    while ($row4 = mysqli_fetch_array($con4)) {
                                        echo $nom_asignatura11 = $row4['count(id_cuidadores)'];
                                    } ?>
                                </td>
                            </tr>
                            </tr>

                                        <tr>
                                            <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
                                            <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Pais</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Departamento</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Provincia</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Edad</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Consultar MPC</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Eliminar MPC</td>
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
                                        $id_cuidadores = $row['id_cuidadores'];

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
                                                        <!--Consultar datos del cuidador-->

                                                        <a href="main.php?key=45&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar</a>
                                                        <br>
                                                        <?php
                                                        $busquedaexpe = mysqli_query($con, "SELECT * FROM expediente ");
                                                        while ($row21 = mysqli_fetch_array($busquedaexpe)) {
                                                       $id_cuida21 = $row21['id_cuidadores'];  
                                                       $id_ninos21 = $row['id_ninos'];

                                                    
                                                    }
                                                                                                             
                                                        
                                                        ?>
                                                        </td> 
                                                    
                                                    <?php
                                                        
                                                        ?>

                                                <td>
                                                <!--Consultar si el cuidador tiene expediente y si es así no puede ser eliminado-->
                                                    <?php 
                                                    if ($id_cuidadores != $id_cuida21){
                                                        if (!(consulta_campo('expediente','id_cuidadores',$id_cuidadores,'codigo_expediente'))){
                                                            echo '<a  class="btn btn-danger" href="javascript:borrado('.$id_cuidadores.',\'cuidadores\',\'id_cuidadores\','.$verdato.')"><span class="glyphicon glyphicon-trash"></span>  Eliminar</a>';} 
                                                            else{echo '<button class="btn btn-secundary  data-toggle="tooltip" data-placement="bottom" title="Elimine primero el expediente"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}
                                                        }
                                                        else if($id_cuidadores != $id_cuida21){echo '<button class="btn btn-secundary  disabled data-toggle="tooltip" data-placement="bottom" title="No tiene cuidador asignado"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}


                                                  }
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
                                            <td class="col-md-4 control-label letra n600 azulo">Consultar MPC</td>
                                            <td class="col-md-4 control-label letra n600 azulo">Eliminar MPC</td>
                                        </tr>
                                        <tbody>
                                            <?php
	                                        $busqueda = mysqli_query($con,"SELECT * FROM cuidadores  WHERE id_municipio ='$id_municipio' ORDER BY Apellidos_cuidadores ASC " ); //cambiar nombre de la tabla de busqueda
                                            while ($row = mysqli_fetch_array($busqueda)) {
                                                $apellidos = $row['Apellidos_cuidadores'];
                                                $nombres = $row['Nombres_cuidadores'];
                                                $numero_documento = $row['No_Cedula'];
                                                $id_pais = $row['id_pais'];
                                                $id_departamento = $row['id_departamento'];
                                                $id_municipio = $row['id_municipio'];
                                                $id_provincia = $row['id_provincia'];
                                                $edad = $row['Edad'];
                                                $id_cuidadores = $row['id_cuidadores'];
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
                                                        } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $edad;  ?>
                                                    </td>
                                                    <td align="center">
                                                        <!--Consultar datos del cuidador-->

                                                        <a href="main.php?key=45&id_cuidadores=<?php echo $row['id_cuidadores']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar o editar registro"><span class="glyphicon glyphicon-search"></span> Consultar</a>
                                                        
                                                        <br>
                                                        <?php
                                                        $busquedaexpe = mysqli_query($con, "SELECT * FROM expediente ");
                                                        while ($row21 = mysqli_fetch_array($busquedaexpe)) {
                                                       $id_cuida21 = $row21['id_cuidadores'];  
                                                       $id_ninos21 = $row['id_ninos'];

                                                    
                                                    }
                                                                                                             
                                                        
                                                        ?>
                                                        </td> 
                                                    
                                                    <?php
                                                        
                                                        ?>

                                                <td>
                                                <!--Consultar si el cuidador tiene expediente y si es así no puede ser eliminado-->
                                                    <?php 
                                                    if ($id_cuidadores != $id_cuida21){
                                                        if (!(consulta_campo('expediente','id_cuidadores',$id_cuidadores,'codigo_expediente'))){
                                                            echo '<a  class="btn btn-danger" href="javascript:borrado('.$id_cuidadores.',\'cuidadores\',\'id_cuidadores\','.$verdato.')"><span class="glyphicon glyphicon-trash"></span>  Eliminar</a>';} 
                                                            else{echo '<button class="btn btn-secundary  data-toggle="tooltip" data-placement="bottom" title="Elimine primero el expediente"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}
                                                        }
                                                        else if($id_cuidadores != $id_cuida21){echo '<button class="btn btn-secundary  disabled data-toggle="tooltip" data-placement="bottom" title="No tiene cuidador asignado"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></h5>';}


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