<?php

$id_ninnos = $_GET['id_ninnos'];

$busqueda = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_ninnos ='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
while ($row = mysqli_fetch_array($busqueda)) {
    $id_ninnos1         = $row['id_ninnos'];
    $id_tipo_documento  = $row['id_tipo_documento'];
    $No_identificacion  = $row['No_identificacion'];
    $Nombres            = $row['Nombres'];
    $Apellidos          = $row['Apellidos'];
    $Fecha_Nacimiento   = $row['Fecha_Nacimiento'];
    $Edad               = $row['Edad'];
    $Direccion          = $row['Direccion'];
    $telefono_movil     = $row['telefono_movil'];
    $correo_electronico = $row['correo_electronico'];
    $id_genero          = $row['id_genero'];
    $id_estrato         = $row['id_estrato'];
    $id_niveleducativo  = $row['id_niveleducativo'];
    $id_cuidadores      = $row['id_cuidadores'];
    $id_municipio       = $row['id_municipio'];
    $id_provincia       = $row['id_provincia'];
    $id_regimen         = $row['id_regimen'];
    $id_eps             = $row['id_eps'];
    $id_etnia           = $row['id_etnia'];
    $Puntaje_Sisben     = $row['Puntaje_Sisben'];
    $id_zona            = $row['id_zona'];
    $fecha_ingreso      = $row['fecha_ingreso'];
    $id_usuario         = $row['id_usuario'];
} ?>

    <?php
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha = date("Y-m-d", $time);
    ?>

    <section class="fblanco">
        <div class="container pi3x">
          <h3 class="centrar letra n600 azulo pi">Consultar Formulario Ni&ntilde;os Ni&ntilde;as y Adolescentes</h3>
            <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                <fieldset> 
                    <!-- Form Name -->
                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_ninos</label>
                        <div class="col-md-8">
                            <input id="textinput" name="id_ninnos" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $id_ninnos1;  ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Nombres; ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-8">
                            <input id="textinput" name="ape_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-8">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM tipos_documentos WHERE id_tipo_documento = '$id_tipo_documento' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_tipo_documento = $row1['id_tipo_documento'];
                                $descripcion = $row1['descripcion'];
                            }
                            ?>
                            <select name="tip_doc_nna" id="tip_doc_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_tipo_documento; ?>"><?php echo $descripcion; ?></option>
                                <?php $con1 = mysqli_query($con, "SELECT * FROM tipos_documentos");
                                $reg = mysqli_fetch_array($con1);
                                do {
                                    $id = $reg['id_tipo_documento'];
                                    $des = $reg['descripcion']; ?>
                                    <option value="<?php echo $id; ?>"><?php echo $des; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con1)); ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento</label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>
                        <div class="col-md-8">
                            <input id="fecha_nna" name="fecha_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Fecha_Nacimiento; ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>
                        <div class="col-md-8">
                            <input id="textinput" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Edad ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                        <div class="col-md-8">
                            <?php

                            $busqueda2 = mysqli_query($con, "SELECT * FROM generos WHERE id_genero = '$id_genero' ");
                            while ($row2 = mysqli_fetch_array($busqueda2)) {
                                $id_genero = $row2['id_genero'];
                                $des_genero = $row2['descripcion'];
                            } ?>
                            <select name="genero_nna" id="genero_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_genero; ?>"><?php echo $des_genero;  ?></option>
                                <?php
                                $con1 = mysqli_query($con, "SELECT * FROM generos");
                                $reg1 = mysqli_fetch_array($con1);
                                do {
                                    $id_genero = $reg1['id_genero'];
                                    $descripcion = $reg1['descripcion'];
                                ?>
                                    <option value="<?php echo $id_genero; ?>"><?php echo $descripcion; ?> </option>
                                <?php
                                } while ($reg1 = mysqli_fetch_array($con1));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio='$id_municipio' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_municipio = $row1['id_municipio'];
                                $des_municipio = $row1['descripcion'];
                            }
                            ?>
                            <select name="municipio_nna" id="municipio_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_municipio; ?>"><?php echo $des_municipio; ?></option>
                                <?php
                                $con2 = mysqli_query($con, "SELECT * FROM municipios");
                                $reg2 = mysqli_fetch_array($con2);
                                do {
                                    $id_mun = $reg2['id_municipio'];
                                    $des_mun = $reg2['descripcion'];
                                ?>
                                    <option value="<?php echo $id_mun; ?>"><?php echo $des_mun; ?> </option>
                                <?php
                                } while ($reg2 = mysqli_fetch_array($con2));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia='$id_provincia' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_provincia = $row1['id_provincia'];
                                $des_provincia = $row1['descripcion_prov'];
                            } ?>
                            <select name="provincia_nna" id="provincia_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_provincia; ?>"><?php echo $des_provincia; ?></option>
                                <?php
                                $con3 = mysqli_query($con, "SELECT * FROM provincias");
                                $reg3 = mysqli_fetch_array($con3);
                                do {
                                    $id_provincia = $reg3['id_provincia'];
                                    $des_provincia = $reg3['descripcion'];
                                ?>
                                    <option value="<?php echo $id_provincia; ?>"><?php echo $des_provincia; ?> </option>
                                <?php
                                } while ($reg3 = mysqli_fetch_array($con3));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección</label>
                        <div class="col-md-8">
                            <input id="textinput" name="dir_nna" type="text" placeholder="" class="form-control input-md" value="<?php echo $Direccion ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                        <div class="col-md-8">
                            <input id="tel_nna" name="tel_nna" type="tel" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $telefono_movil;  ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-8">
                            <input id="textinput" name="email_nna" type="email" placeholder="" class="form-control input-md" value="<?php echo $correo_electronico ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM estratos WHERE id_estrato='$id_estrato' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_estrato = $row1['id_estrato'];
                                $des_estrato = $row1['descripcion'];
                            } ?>
                            <select name="estrato_nna" id="estrato_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_estrato; ?>"><?php echo $des_estrato; ?></option>
                                <?php
                                $con4 = mysqli_query($con, "SELECT * FROM estratos");
                                $reg4 = mysqli_fetch_array($con4);
                                do {
                                    $id_estrato = $reg4['id_estrato'];
                                    $des_estrato = $reg4['descripcion'];
                                ?>
                                    <option value="<?php echo $id_estrato; ?>"><?php echo $des_estrato; ?> </option>
                                <?php
                                } while ($reg4 = mysqli_fetch_array($con4));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel Educativo</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM nivel_educativo WHERE id_niveleducativo='$id_niveleducativo' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_niveleducativo = $row1['id_niveleducativo'];
                                $des_niveleducativo = $row1['descripcion'];
                            } ?>
                            <select name="nivel_educa_nna" id="nivel_educa_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_niveleducativo;  ?>"><?php echo $des_niveleducativo; ?></option>
                                <?php
                                $con5 = mysqli_query($con, "SELECT * FROM nivel_educativo");
                                $reg5 = mysqli_fetch_array($con5);
                                do {
                                    $id_niveleducativo = $reg5['id_niveleducativo'];
                                    $des_niveleducativo = $reg5['descripcion'];
                                ?>
                                    <option value="<?php echo $id_niveleducativo; ?>"><?php echo $des_niveleducativo; ?> </option>
                                <?php
                                } while ($reg5 = mysqli_fetch_array($con5));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Reg&iacute;menes</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM regimenes WHERE id_regimen='$id_regimen' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_regimen = $row1['id_regimen'];
                                $des_regimen = $row1['descripcion'];
                            } ?>
                            <select name="regimen_nna" id="regimen_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_regimen;  ?>"><?php echo  $des_regimen; ?></option>
                                <?php
                                $con6 = mysqli_query($con, "select * from regimenes");
                                $reg6 = mysqli_fetch_array($con6);
                                do {
                                    $id_regimen = $reg6['id_regimen'];
                                    $des_regimen = $reg6['descripcion'];
                                ?>
                                    <option value="<?php echo $id_regimen; ?>"><?php echo $des_regimen; ?> </option>
                                <?php
                                } while ($reg6 = mysqli_fetch_array($con6));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">EPS</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM eps where id_eps='$id_eps' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_eps1 = $row1['id_eps'];
                                $des_eps = $row1['descripcion'];
                            } ?>
                            <select name="eps_nna" id="eps_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_eps1;  ?>"><?php echo $des_eps;   ?></option>
                                <?php
                                $con7 = mysqli_query($con, "SELECT * FROM eps");
                                $reg7 = mysqli_fetch_array($con7);
                                do {
                                    $id_eps = $reg7['id_eps'];
                                    $des_eps = $reg7['descripcion'];
                                ?>
                                    <option value="<?php echo $id_eps; ?>"><?php echo $des_eps; ?> </option>
                                <?php
                                } while ($reg7 = mysqli_fetch_array($con7));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Etnias</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM etnias where id_etnia='$id_etnia' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_etnia = $row1['id_etnia'];
                                $des_etnia = $row1['descripcion'];
                            } ?>
                            <select name="etnias_nna" id="etnias_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_etnia;  ?>"><?php echo $des_etnia; ?></option>
                                <?php
                                $con8 = mysqli_query($con, "select * from etnias");
                                $reg8 = mysqli_fetch_array($con8);
                                do {
                                    $id_etnia = $reg8['id_etnia'];
                                    $des_etnia = $reg8['descripcion'];
                                ?>
                                    <option value="<?php echo $id_etnia; ?>"><?php echo $des_etnia; ?> </option>
                                <?php
                                } while ($reg8 = mysqli_fetch_array($con8));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Puntaje del Sisb&eacute;n</label>
                        <div class="col-md-8">
                            <input id="sisben_nna" name="sisben_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Puntaje_Sisben ?>" <?= $dis ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM zonas where id_zona='$id_zona' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_zona = $row1['id_zona'];
                                $des_zona = $row1['descripcion'];
                            } ?>
                            <select name="zona_nna" id="zona_nna" <?= $dis ?> class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_zona;  ?>"><?php echo $des_zona;  ?></option>
                                <?php
                                $con9 = mysqli_query($con, "select * from zonas");
                                $reg9 = mysqli_fetch_array($con9);
                                do {
                                    $id_zona = $reg9['id_zona'];
                                    $des_zona = $reg9['descripcion'];
                                ?>
                                    <option value="<?php echo $id_zona; ?>"><?php echo $des_zona; ?> </option>
                                <?php
                                } while ($reg9 = mysqli_fetch_array($con9));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Ingreso</label>
                        <div class="col-md-8">
                            <input id="fecha_ingre_nna" name="fecha_ingre_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $fecha_ingreso ?>" required readonly>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id Usuario</label>
                        <div class="col-md-8">
                            <input id="id_usuario_nna" name="id_usuario_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>
                        </div>
                    </div>
                    <div class="form-group <?= $visiblemod ?>" >
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <?php
    if ($_POST) { //si se ha presionado enviar
        $id_ninnos11        = $_POST['id_ninnos'];
        $nom_nna            = strtoupper($_POST['nom_nna']);
        $ape_nna            = strtoupper($_POST['ape_nna']);
        $tip_doc_nna        = $_POST['tip_doc_nna'];
        $num_nna            = $_POST['num_nna'];
        $fecha_nna          = $_POST['fecha_nna'];
        $genero_nna         = $_POST['genero_nna'];
        $edad_nna           = $_POST['edad_nna'];
        $municipio_nna      = $_POST['municipio_nna'];
        $provincia_nna      = $_POST['provincia_nna'];
        $dir_nna            = $_POST['dir_nna'];
        $tel_nna            = $_POST['tel_nna'];
        $email_nna          = $_POST['email_nna'];
        $estrato_nna        = $_POST['estrato_nna'];
        $nivel_educa_nna    = $_POST['nivel_educa_nna'];
        $regimen_nna        = $_POST['regimen_nna'];
        $eps_nna            = $_POST['eps_nna'];
        $etnias_nna         = $_POST['etnias_nna'];
        $sisben_nna         = $_POST['sisben_nna'];
        $zona_nna           = $_POST['zona_nna'];
        $fecha_ing          = $_POST['fecha_ingre_nna'];
        $id_usuario_nna     = $_POST['id_usuario_nna'];
        $cuidadores_nna     = 0;

        mysqli_query($con, "UPDATE `ninnosnna` SET `id_tipo_documento`='$tip_doc_nna',`No_identificacion`='$num_nna',`Nombres`='$nom_nna',`Apellidos`='$ape_nna',`Fecha_Nacimiento`='$fecha_nn',`Edad`='$edad_nna',`Direccion`='$dir_nna',`telefono_movil`='$tel_nna',`correo_electronico`='$email_nna',`id_genero`='$genero_nna',`id_estrato`='$estrato_nna',`id_niveleducativo`='$nivel_educa_nna',`id_cuidadores`='$cuidadores_nna',`id_municipio`='$municipio_nna',`id_provincia`='$provincia_nna',`id_regimen`='$regimen_nna',`id_eps`='$eps_nna',`id_etnia`='$etnias_nna',`Puntaje_Sisben`='$sisben_nna',`id_zona`='$zona_nna',`fecha_ingreso`='$fecha_ing',`id_usuario`='$id_usuario_nna' WHERE id_ninnos='$id_ninnos'") or die(mysqli_error($con));
        echo '<script language = javascript>
                 alert("la Informacion ha sido Guardada Correctamente")
                 self.location = "main.php?key=5&id_ninnos='.$id_ninnos.'"
                 </script>';
    } ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
    <script src="js/jquery-ui.js"></script>
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

    <script src="js/jsMenuAddNinosNinas.js"></script>

</body>

</html>
