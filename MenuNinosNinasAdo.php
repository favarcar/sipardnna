<script>
        function autofitIframea(id) {
            if (!window.opera && document.all && document.getElementById) {
                id.style.height = id.contentWindow.document.body.scrollHeight;
            } else if (document.getElementById) {
                id.style.height = id.contentDocument.body.scrollHeight + "px";
            }
        }

        function valida(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
            // Patron de entrada, en este caso solo acepta numeros
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

        function obtenerPais(val) {
            $.ajax({
                type: "POST",
                url: "get_pais.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#pais_nna").html(data);
                }
            });
        }

        function obtenerDepartamento(val, iden) {
            $.ajax({
                type: "POST",
                url: "get_departamentos.php",
                data: {
                    id: val,
                    identificador: iden
                },
                success: function(data) {

                    if (iden == '1' && val != '42') {

                        $("#departamento_nna").html(data);
                        $("#municipio_nna").html(data);
                        $("#provincia_nna").html(data);

                    } else if (iden == '1' && val == '42') {
                        $("#departamento_nna").html(data);
                    }

                    if (iden == '2') {

                        $("#municipio_nna").html(data);
                    }
                    if (iden == '3') {

                        $("#provincia_nna").html(data);
                    }

                }
            });
        }
        /*
         */
        function obtenerEps(val) {
            $.ajax({
                type: "POST",
                url: "get_eps.php",
                data: 'id_regimen=' + val,
                success: function(data) {
                    $("#eps_nna").html(data);
                }
            });
        }
    </script>

</head>
<section style="background-color: #FFFF;">
        <div class="container ps ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <h2 class="centrar letra n600 azulo pi">Ni&ntilde;os y Ni&ntilde;as o Adolescentes NNA</h2>
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
                        <li role="presentation" class="letra n500"><a href="main.php?key=14">Consultar NNA</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="fblanco">
        <div class="container">
            <h2>Registrar Formulario Ni&ntilde;os Ni&ntilde;as o Adolescentes</h2>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="font-size:21px">
                        <i class="fa fa-list"></i> Información de ingreso
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form id="formNNA" method="post" enctype="multipart/form-data">
                                    <div class="col-md-12 col-sm-4 col-xs-12 form-group">
                                        <label>Motivo de ingreso</label>
                                        <select id='motivo_ingreso' name='motivo_ingreso' class="form-control" style="text-transform: uppercase;" required>
                                            <option value="">Elija un motivo de ingreso</option>
                                            <?php
                                            $con11 = mysqli_query($con, "select * from  motivoingreso");
                                            $reg11 = mysqli_fetch_array($con11);
                                            do {
                                                $idMotivo = $reg11['id_motivo_ingreso'];
                                                $desMotivo = $reg11['desc_motivo_ingreso'];
                                            ?>
                                                <option value="<?php echo $idMotivo; ?>"><?php echo $idMotivo; ?> <?php echo $desMotivo; ?> </option>
                                            <?php
                                            } while ($reg11 = mysqli_fetch_array($con11));
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Municipio de notificación</label>
                                        <select name="municipio_in" id="municipio_in" class="form-control" style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con33 = mysqli_query($con, "select * from municipios where id_departamento = '15'");
                                            $reg33 = mysqli_fetch_array($con33);
                                            do {
                                                $id_mun33 = $reg33['id_municipio'];
                                                $des_mun33 = $reg33['descripcion'];
                                            ?>
                                                <option value="<?php echo $id_mun33; ?>"><?php echo $des_mun33; ?> </option>
                                            <?php
                                            } while ($reg33 = mysqli_fetch_array($con33));
                                            ?>
                                        </select>
                                    </div>
                                    <div id="cual_mun" class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Escriba el Municipio </label>
                                        <input id='mun_aux' name='mun_aux' class="form-control" placeholder="¿Escriba cual?" style="text-transform: uppercase;" value="NA" required>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Fecha de los hechos</label>
                                        <input id='fecha_hechos' name='fecha_hechos' class="form-control" style="text-transform: uppercase;" type="date" required>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Lugar de los hechos</label>
                                        <select name="lugar_hechos" id="lugar_hechos" class="form-control" style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con11 = mysqli_query($con, "select * from  lugar_hechos");
                                            $reg11 = mysqli_fetch_array($con11);
                                            do {
                                                $idLugar = $reg11['codigo_lugar'];
                                                $desLugar = $reg11['desc_lugar'];
                                            ?>
                                                <option value="<?php echo $idLugar; ?>"><?php echo $desLugar; ?> </option>
                                            <?php
                                            } while ($reg11 = mysqli_fetch_array($con11));
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Vínculo con el presunto agresor/a</label>
                                        <select name="vinculo_agresor" id="vinculo_agresor" class="form-control" style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <option value="PADRE">Padre</option>
                                            <option value="MADRE">Madre</option>
                                            <option value="CUIDADOR">Cuidador/a</option>
                                            <option value="ABUELO">Abuelo/a</option>
                                            <option value="TIO">Tio/a</option>
                                            <option value="AGRESOR DESCONOCIDO">Agresor Desconocido/a</option>
                                            <option value="AMIGO">Amigo/a</option>
                                            <option value="CONOCIDO">Conocido/a</option>
                                            <option value="PRIMO">Primo/a</option>
                                            <option value="OTRO">Otro</option>
                                        </select>
                                    </div>

                                    <div id="cual_vinculo" class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Escriba el vínculo con el presunto agresor/a </label>
                                        <input id='vinculo_aux' name='vinculo_aux' class="form-control" placeholder="¿Cual?" style="text-transform: uppercase;" value="NA" required>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Edad del presunto agresor</label>
                                        <input id='edad_agresor' name='edad_agresor' type="number" min="1" max="99" class="form-control" placeholder="Ingrese la edad del presunto agresor" style="text-transform: uppercase;" onkeypress="return valida(event)" value="1" required>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Nivel de escolaridad del presunto agresor/a (Último nivel cursado)</label>
                                        <select name="nivel_escolaridad" id="nivel_escolaridad" class="form-control" style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con11 = mysqli_query($con, "select * from  nivel_escolaridad");
                                            $reg11 = mysqli_fetch_array($con11);
                                            do {
                                                $idNivelEs = $reg11['codigo_escolaridad'];
                                                $desNivelEs = $reg11['desc_escolaridad'];
                                            ?>
                                                <option value="<?php echo $idNivelEs; ?>"><?php echo $desNivelEs; ?> </option>
                                            <?php
                                            } while ($reg11 = mysqli_fetch_array($con11));
                                            ?>
                                        </select>
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    <!--col-md-offset-8-->
                            </div>

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="font-size:21px">
                        <i class="fa fa-user"></i> Información del niño/a ó adolescente
                    </div>
                    <div class="panel-body" >
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Nombres</label>
                                    <input id='nom_nna' name='nom_nna' class="form-control" placeholder="Ingrese el nombre del niño(a) ó adolescente" style="text-transform: uppercase;" required>
                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Apellidos</label>
                                    <input id='ape_nna' name='ape_nna' class="form-control" placeholder="Ingrese los apellidos del niño(a) ó adolescente" style="text-transform: uppercase;" required>
                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Tipo de documento</label>
                                    <select name="tip_doc_nna" id="tip_doc_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        $con11 = mysqli_query($con, "select * from  tipos_documentos");
                                        $reg11 = mysqli_fetch_array($con11);
                                        do {
                                            $id11 = $reg11['id_tipo_documento'];
                                            $des11 = $reg11['descripcion'];
                                        ?>
                                            <option value="<?php echo $id11; ?>"><?php echo $des11; ?> </option>
                                        <?php
                                        } while ($reg11 = mysqli_fetch_array($con11));
                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>N° de documento</label>
                                    <input id='num_nna' name='num_nna' class="form-control" placeholder="Ingrese el número de documento" style="text-transform: uppercase;" onkeypress="return valida(event)" required>
                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">

                                    <label>Fecha de nacimiento</label>


                                    <input id='fecha_nna' name='fecha_nna' class="form-control" type="date" onchange="calcularEdad()" style="text-transform: uppercase; " required>
                                    <script type="text/javascript">
                                        function calcularEdad() {

                                            var fechaNA = fecha_nna.value;
                                            //  $fecha_ingreso= Date('Y-m-d H:i:s');//fecha de hoy
                                            var f = new Date();
                                            var FechaActu = f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate();

                                            jDatos = {
                                                jfechaNA: fechaNA,
                                                jFechaActu: FechaActu
                                            };
                                            JForm = new FormData();
                                            JForm.append('jDatos', JSON.stringify(jDatos));
                                            fetch('./Clases/Funciones.php', {
                                                    method: 'post',
                                                    cache: 'no-cache',
                                                    body: JForm
                                                })
                                                .then(Respuesta => Respuesta.json())
                                                .then(Datos => {
                                                    document.getElementById('edad_nna').value = Datos;
                                                });
                                        }
                                    </script>

                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>

                                <?php

                                $consulta_regimen = $mysqli->query("SELECT id_regimen, descripcion FROM regimenes");
                                $consulta_eps = $mysqli->query("SELECT id_eps, descripcion FROM eps ORDER BY descripcion");
                                $consulta_Pais = $mysqli->query("SELECT Id_Pais,Nombre FROM paises ORDER BY Nombre");
                                ?>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Pais de nacimiento</label>
                                    <select name="pais_nna" id="pais_nna" class="form-control " onchange="obtenerDepartamento(this.value, '1')" required>
                                        <option value=''>SELECCIONE</option>

                                        <?php
                                        while ($row = $consulta_Pais->fetch_object()) {
                                            echo "<option value = '" . $row->Id_Pais . "' >" . $row->Nombre . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Departamento de nacimiento</label>
                                    <select name="departamento_nna" id="departamento_nna" class="form-control" onchange="obtenerDepartamento(this.value, '2')" required>
                                        <option value=''>SELECCIONE</option>

                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Municipio de nacimiento</label>
                                    <select name="municipio_nna" id="municipio_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerDepartamento(this.value, '3')" required>
                                        <option value="">Seleccione</option>

                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Provincia</label>
                                    <select name="provincia_nna" id="provincia_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Edad</label>
                                    <input id='edad_nna' type="text" name='edad_nna' min="1" max="99" class="form-control" placeholder="Ingrese la edad " style="text-transform: uppercase;" onkeypress="return valida(event)" value="1" required>
                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Genero</label>
                                    <select name="genero_nna" id="genero_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        include("../conexion/conexion.php");

                                        $con22 = mysqli_query($con, "select * from  generos");
                                        $reg22 = mysqli_fetch_array($con22);
                                        do {
                                            $id_genero22 = $reg22['id_genero'];
                                            $descripcion22 = $reg22['descripcion'];
                                        ?>
                                            <option value="<?php echo $id_genero22; ?>"><?php echo $descripcion22; ?> </option>
                                        <?php
                                        } while ($reg22 = mysqli_fetch_array($con22));
                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Dirección</label>
                                    <input id='dir_nna' name='dir_nna' class="form-control" placeholder="Ingrese la dirección" style="text-transform: uppercase;" required>
                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Estrato</label>
                                    <select name="estrato_nna" id="estrato_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        $con55 = mysqli_query($con, "select * from estratos");
                                        $reg55 = mysqli_fetch_array($con55);
                                        do {
                                            $id_estrato55 = $reg55['id_estrato'];
                                            $des_estrato55 = $reg55['descripcion'];
                                        ?>
                                            <option value="<?php echo $id_estrato55; ?>"><?php echo $des_estrato55; ?> </option>
                                        <?php
                                        } while ($reg55 = mysqli_fetch_array($con55));
                                        ?>

                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Nivel educativo (Último nivel cursado)</label>
                                    <select name="nivel_educa_nna" id="nivel_educa_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        $con66 = mysqli_query($con, "select * from nivel_educativo");
                                        $reg66 = mysqli_fetch_array($con66);
                                        do {
                                            $id_niveleducativo66 = $reg66['id_niveleducativo'];
                                            $des_niveleducativo66 = $reg66['descripcion'];
                                        ?>
                                            <option value="<?php echo $id_niveleducativo66; ?>"><?php echo $des_niveleducativo66; ?> </option>
                                        <?php
                                        } while ($reg66 = mysqli_fetch_array($con66));
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Etnias</label>
                                    <select name="etnias_nna" id="etnias_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        $con99 = mysqli_query($con, "select * from etnias");
                                        $reg99 = mysqli_fetch_array($con99);
                                        do {
                                            $id_etnia99 = $reg99['id_etnia'];
                                            $des_etnia99 = $reg99['descripcion'];
                                        ?>
                                            <option value="<?php echo $id_etnia99; ?>"><?php echo $des_etnia99; ?> </option>
                                        <?php
                                        } while ($reg99 = mysqli_fetch_array($con99));
                                        ?>

                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Regímenes</label>
                                    <select name="regimen_nna" id="regimen_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerEps(this.value);" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        while ($row = $consulta_regimen->fetch_object()) {
                                            echo "<option value = '" . $row->id_regimen . "' >" . $row->descripcion . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>SGSSS</label>
                                    <select name="eps_nna" id="eps_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        while ($row = $consulta_eps->fetch_object()) {
                                            echo "<option value = '" . $row->id_eps . "' >" . $row->descripcion . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="cual_eps" class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Escriba el SGSSS </label>
                                    <input id='eps_aux' name='eps_aux' class="form-control" placeholder="¿Escriba cual?" style="text-transform: uppercase;" value="NA" required>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Puntaje del sisbén</label>
                                <input id='sisben_nna' name='sisben_nna' class="form-control" placeholder="Ingrese el puntaje del sisben" pattern="[A][1-5]{1}$|[B][1-7]{1}$|([C]([1-9]|1[0-8])$)|[D]([1-9]|1[0-9]|2[0-1])$" style="text-transform: uppercase;" required>
                                    <!--<p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>Zona</label>
                                    <select name="zona_nna" id="zona_nna" class="form-control" style="text-transform: uppercase;" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        $con10 = mysqli_query($con, "select * from zonas");
                                        $reg10 = mysqli_fetch_array($con10);
                                        do {
                                            $id_zona10 = $reg10['id_zona'];
                                            $des_zona10 = $reg10['descripcion'];
                                        ?>
                                            <option value="<?php echo $id_zona10; ?>"><?php echo $des_zona10; ?> </option>
                                        <?php
                                        } while ($reg10 = mysqli_fetch_array($con10));
                                        ?>

                                    </select>
                                </div>
                                <br>
                                <br>
                                <br>

                            </div>

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="line-height: 4.4;">
                <div class="col-md-4 col-sm-4 col-xs-12">

                </div>

                <div class="col-md-7 col-sm-4 col-xs-12">
                    <button class="btn btn-primary " id="btnP" type="reset" style="font-size: 22px; border-radius: 15px;"><i class="fa fa-refresh"></i> Limpiar Campos</button>
                    <button type="submit" class="btn btn-success btn-lg" style="font-size: 22px; border-radius: 15px;width: 300px;"><i class="fa fa-save"></i> Guardar Registro</button>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">

                </div>
            </div>
        </div>

        </form>
        <div class="clearfix"></div>
    </section>
    <!--iframe id="registro2" name="usuario" src="NNA/IngresarNNA.php" width="100%"   height="900px" frameborder="0" transparency="transparency" onload="autofitIframea(this);" scrolling="no"></iframe-->






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


    <?php
    if ($_POST) { //si se ha presionado enviar
        include("../conexion/conexion.php");
        $nom_nna = strtoupper($_POST['nom_nna']);
        $ape_nna = strtoupper($_POST['ape_nna']);
        $tip_doc_nna = $_POST['tip_doc_nna'];
        $num_nna = $_POST['num_nna'];
        $fecha_nna = $_POST['fecha_nna'];
        $genero_nna = $_POST['genero_nna'];
        $edad_nna = $_POST['edad_nna'];
        $departamento_nna = $_POST['departamento_nna'];
        $municipio_nna = $_POST['municipio_nna'];
        $provincia_nna = $_POST['provincia_nna'];
        $dir_nna = $_POST['dir_nna'];
        $estrato_nna = $_POST['estrato_nna'];
        $nivel_educa_nna = $_POST['nivel_educa_nna'];
        $regimen_nna = $_POST['regimen_nna'];
        $eps_nna = $_POST['eps_nna'];
        $etnias_nna = $_POST['etnias_nna'];
        $sisben_nna = $_POST['sisben_nna'];
        $zona_nna = $_POST['zona_nna'];
        $pais_nna = $_POST['pais_nna'];
        $fecha_ing = $fecha;
        $cuidadores_nna = 0;
        $motivoingreso = $_POST['motivo_ingreso'];
        $fecha_hechos = $_POST['fecha_hechos'];
        //$municipio_in=$_POST['municipio_in'];

        if ($_POST['municipio_in'] == "OTRO") {
            $municipio_in = $_POST['mun_aux'];
            $query = "INSERT INTO municipios (id_municipio, descripcion) VALUES ('$municipio_in', '$municipio_in');";
            mysqli_query($con, $query);
        } else {
            $municipio_in = $_POST['municipio_in'];
        }

        $lugar_hechos = $_POST['lugar_hechos'];

        if ($_POST['vinculo_agresor'] == "OTRO") {
            $vinculo_agresor = $_POST['vinculo_aux'];
        } else {
            $vinculo_agresor = $_POST['vinculo_agresor'];
        }

        if ($_POST['eps_nna'] == "OTRO") {
            $eps_nna = $_POST['eps_aux'];
            $query = "INSERT INTO eps (id_eps, descripcion) VALUES ('$eps_nna', '$eps_nna');";
            mysqli_query($con, $query);
        } else {
            $eps_nna = $_POST['eps_nna'];
        }
        $edad_agresor = $_POST['edad_agresor'];
        $nivel_escolaridad = $_POST['nivel_escolaridad'];

        $sql = "INSERT INTO ninnosnna (id_ninnos, id_tipo_documento, No_identificacion, Nombres,
					Apellidos, Fecha_Nacimiento, Edad, Direccion,
					id_genero, id_estrato, id_niveleducativo, id_cuidadores, id_departamento, id_municipio, id_provincia,
					id_regimen, id_eps, id_etnia, Puntaje_Sisben, id_zona, fecha_ingreso, id_usuario,
					id_motivo_ingreso, fecha_hechos, id_municipio_hechos, id_lugar_hechos, vinculo_agresor,
					edad_agresor, nivel_escolaridad,id_pais) VALUES('$id_ninos','$tip_doc_nna','$num_nna','$nom_nna',
					'$ape_nna','$fecha_nna','$edad_nna','$dir_nna','$genero_nna',
					'$estrato_nna','$nivel_educa_nna','$cuidadores_nna','$departamento_nna','$municipio_nna','$provincia_nna',
					'$regimen_nna','$eps_nna','$etnias_nna','$sisben_nna','$zona_nna','$fecha_ing','$id_usuario',
					'$motivoingreso','$fecha_hechos','$municipio_in','$lugar_hechos','$vinculo_agresor','$edad_agresor','$nivel_escolaridad','$pais_nna')";

        if (mysqli_query($con, $sql)) {
		$nino_id = mysqli_insert_id($con);
            echo '<script language = javascript>
					alert("Se guardó exitosamente el registro")
					self.location = "main.php?key=10&id_ninnos='.$nino_id.'"
				 </script>';
        } else {
            echo '<script language = javascript>
				alert("Error")
				self.location = "main.php?key=8"
				</script>';
        }

        mysqli_close($con);
    }
    ?>


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
