
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
                        <li role="presentation" class="letra n500 active"><a href="main.php?key=12">Expedientes</a></li>
                        <!--<li role="presentation" class="letra n500"><a id="consultaBtn" href="main.php?key=3">Consultar Expedientes</a></li>-->
                        <li role="presentation" class="letra n500"><a href="main.php?key=15">Consultar Expedientes Remitidos</a></li>
                        <li role="presentation" class="letra n500"><a href="main.php?key=16">Consultar Total de Expedientes</a></li>
                    </ul>
                    <input type="button" id="refresh" value="Actualizar" onclick="location.reload()" style="display:none" />
                </div>
            </div>
        </div>
    </section>

    <section class="fblanco" id="ConsultaExp">
        <div class="container ps2x ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="">
                        <div class="x_content">
                            <input type="hidden" id="EstadoExp">
                            <input type="hidden" id="idIExp">
                            <input type="hidden" id="idExp">
                            <table id="expeTable" table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td colspan="11" class="letra n600 azulo" bgcolor="#ff9933">Total Niños, Niñas o Adolescentes Registrados:
                                            <?php $con4 = mysqli_query($con, "SELECT count(id_ninnos) FROM ninnosnna where id_usuario='$id_usuario'");
                                            while ($row4 = mysqli_fetch_array($con4)) {
                                                echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nombre y Apellido</th>
                                        <th>N° Documento</th>
                                        <th>Pais</th>
                                        <th>Departamento</th>
                                        <th>Municipio</th>
                                        <th>Provincia</th>
                                        <th>Edad</th>
                                        <th>Expediente</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--iframe name="usuario" src="Expediente/ConsultarExpediente.php" width="100%"   height="0" frameborder="0" transparency="transparency" onload="autofitIframea(this);" scrolling="no"></iframe-->

    <section class="fblanco" id="RegistroExp">
        <input type="hidden" id="idNino">
        <div class="container">
            <h2>Registrar Expediente Ni&ntilde;os Ni&ntilde;as o Adolescentes</h2>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="font-size:21px">
                        <i class="fa fa-list"></i> Información del Niño/a ó Adolescente
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Código del niño/a o Adolescente</label>
                                    <input id="idnino" name="idnino" type="text" placeholder="" class="form-control input-md" value="" readonly>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Fecha de Inicio del Expediente</label>
                                    <input id="fecha_exp" name="fecha_exp" type="text" placeholder="" class="form-control input-md" value="" readonly>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Nombres de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
                                    <input id="nom_nna_exp" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>No. de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
                                    <input id="num_nna_exp" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="" readonly>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Nombre de Madre, Padre o Acudiente</label>
                                    <input id="nom_mpa_exp" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>No. de Documento de Madre, Padre o Acudiente</label>
                                    <input id="num_mpa_exp" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div>

                                <div id="cual_vinculo" class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>id Cuidadores</label>
                                    <input id="cuidadores_exp" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div> <br> <br> <br>
                                <!--col-md-offset-8-->
                            </div> <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="font-size:21px">
                        <i class="fa fa-user"></i> Información del Expediente
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form id="formExpe" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Número del proceso</label>
                                        <input id='num_pro' type="number" name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" value="0" required>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Restablecimiento de Derechos</label>
                                        <select name="derechos_exp" id="derechos_exp" class="form-control" font style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con66 = mysqli_query($con, "select * from  derechos");
                                            $reg66 = mysqli_fetch_array($con66);
                                            do {
                                                $id_derecho66 = $reg66['id_derecho'];
                                                $des_derecho66 = $reg66['descripcion_derechos'];
                                            ?>
                                                <option value="<?php echo $id_derecho66; ?>"><?php echo $des_derecho66; ?> </option>
                                            <?php
                                            } while ($reg66 = mysqli_fetch_array($con66));
                                            ?>
                                        </select>
                                        <h5 class="letra n500  azulo "><a href="main.php?key=20" class=" btn btn-primary">Registrar Nuevo Derecho</a></h5>
                                       
                                        </div>
                                    <div class="col-md-8 col-sm-4 col-xs-12 form-group">
                                        <label>Discapacidad</label> <select name="discapacidad_exp" id="discapacidad_exp" class="form-control" font style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            include("../conexion/conexion.php");

                                            $con11 = mysqli_query($con, "select * from  discapacidades");
                                            $reg11 = mysqli_fetch_array($con11);
                                            do {
                                                $id_discapacidad11 = $reg11['id_discapacidad'];
                                                $des_discapacidad11 = $reg11['descripcion_discapacidades'];
                                            ?>
                                                <option value="<?php echo $id_discapacidad11; ?>"><?php echo $des_discapacidad11; ?> </option>
                                            <?php
                                            } while ($reg11 = mysqli_fetch_array($con11));
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12 col-sm-6 col-xs-12 form-group well">
                                        <label>Indicador</label>
                                        <select name="indicadores_exp" id="indicadores_exp" class="form-control" font style="text-transform: uppercase;">
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con77 = mysqli_query($con, "select * from  indicadores");
                                            $reg77 = mysqli_fetch_array($con77);
                                            do {
                                                $id_indicador77 = $reg77['id_indicador'];
                                                $des_indicador77 = $reg77['descripcion_indicadores'];
                                            ?>
                                                <option value="<?php echo $id_indicador77; ?>"><?php echo $des_indicador77; ?> </option>
                                            <?php
                                            } while ($reg77 = mysqli_fetch_array($con77));
                                            ?>
                                        </select> <br>
                                        <button type="button" class="btn btn-success gu table-add"> Agregar
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                        <!--FIN DE INSERTAR FILA -->
                                        <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 90%"> Indicadores asignados</th>
                                                    <!--th>Fecha actual</th-->
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--agrega el contenido aquí-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Maltrato</label>
                                        <select name="maltratos_exp" id="maltratos_exp" class="form-control" font style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            include("../conexion/conexion.php");

                                            $con22 = mysqli_query($con, "select * from  maltratos");
                                            $reg22 = mysqli_fetch_array($con22);
                                            do {
                                                $id_maltrato22 = $reg22['id_maltrato'];
                                                $des_maltrato22 = $reg22['descripcion_maltratos'];
                                            ?>
                                                <option value="<?php echo $id_maltrato22; ?>"><?php echo $des_maltrato22; ?> </option>
                                            <?php
                                            } while ($reg22 = mysqli_fetch_array($con22));
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Victimas</label>
                                        <select name="victima_exp" id="victima_exp" class="form-control" font style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con88 = mysqli_query($con, "select * from  victimas");
                                            $reg88 = mysqli_fetch_array($con88);
                                            do {
                                                $id_victima88 = $reg88['id_victima'];
                                                $des_victima88 = $reg88['descripcion_victimas'];
                                            ?>
                                                <option value="<?php echo $id_victima88; ?>"><?php echo $des_victima88; ?> </option>
                                            <?php
                                            } while ($reg88 = mysqli_fetch_array($con88));
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Descripci&oacute;n</label>
                                        <textarea class="form-control input-md" id="descripcion_exp" name="descripcion_exp" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="500" data-parsley-minlength-message="Escribir como mínimo 20 letras ..." data-parsley-validation-threshold="10" placeholder="Escriba el detalle del expediente" required></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Observaciones</label>
                                        <textarea class="form-control input-md" id="obs_exp" name="obs_exp" required></textarea>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Fecha limite de la actuación administrativa</label>
                                        <input id="finalizacion_exp" name="finalizacion_exp" type="date" class="form-control" placeholder="AAAA-MM-DD" font style="text-transform: uppercase;" required>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Entidad</label>
                                        <select name="entidad_exp" id="entidad_exp" class="form-control" font style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                        

                                            $con33 = mysqli_query($con, "select * from  entidades");
                                            $reg33 = mysqli_fetch_array($con33);
                                            do {
                                                $id_entidad33 = $reg33['id_entidad'];
                                                $des_entidad33 = $reg33['descripcion_entidades'];
                                            ?>
                                                <option value="<?php echo $id_entidad33; ?>"><?php echo $des_entidad33; ?> </option>
                                            <?php
                                            } while ($reg33 = mysqli_fetch_array($con33));
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Estado del Expediente</label>
                                        <select name="estadocaso_exp" id="estadocaso_exp" class="form-control" font style="text-transform: uppercase;" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $con99 = mysqli_query($con, "select * from  estado_caso");
                                            $reg99 = mysqli_fetch_array($con99);
                                            do {
                                                $id_estadocaso99 = $reg99['id_estadocaso'];
                                                $des_estadocaso99 = $reg99['descripcion_estado_caso'];
                                            ?>
                                                <option value="<?php echo $id_estadocaso99; ?>"><?php echo $des_estadocaso99; ?> </option>
                                            <?php
                                            } while ($reg99 = mysqli_fetch_array($con99));
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-8 col-sm-4 col-xs-12 form-group">
                                        <label>Concepto del Caso</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="requiere" name="defaultExampleRadios">
                                            <label class="custom-control-label" for="requiere">Requiere PARD</label>
                                            <label class="custom-control-label"> |---------| </label>
                                            <input type="radio" class="custom-control-input" id="noRequiere" name="defaultExampleRadios" checked>
                                            <label class="custom-control-label" for="noRequiere">No Requiere PARD</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-6 col-xs-12 form-group well" id="addActuacion">

                                        <label>Fecha Actuacion</label>
                                        <input id="FechaActuacion" name="FechaActuacion" type="date" placeholder="AAAA-MM-DD" class="form-control input-md" onkeypress="return numeros(event)">

                                        <label>Funcionario</label>

                                        <select name="funcionario_actua" id="funcionario_actua" class="form-control" font style="text-transform: uppercase;" style=" width:100px">
                                            <option value="">Seleccione</option>
                                            <option value="Comisario">Comisario</option>
                                            <option value="Trabajador Social">Trabajador Social</option>
                                            <option value="Psicologo">Psicologo</option>
                                        </select>
                                        <label>Descripci&oacute;n</label>
                                        <textarea id="desc_actua" class="form-control" name="desc_actua" style=" resize: none;" cols="40" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="500" data-parsley-minlength-message="Escribir como mínimo 20 letras ..." data-parsley-validation-threshold="10" placeholder="Escriba el detalle del expediente"></textarea>
                                        <label>Compromisos</label>
                                        <textarea id="compro_actua" font style="text-transform: uppercase;" class="form-control" name="compro_actua" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="500" data-parsley-minlength-message="Escribir como mínimo 20 letras ..." data-parsley-validation-threshold="10" placeholder="Escriba el detalle del requerimiento"></textarea>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                        <br>
                                        <button type="button" class="btn btn-success gu tableActua-add"> Agregar
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                        <!--FIN DE INSERTAR FILA -->
                                        <table id="tableActua" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th> Fecha Actuación</th>
                                                    <th> Funcionario</th>
                                                    <th style="width: 30%"> Descripción</th>
                                                    <th style="width: 30%"> Compromisos</th>
                                                    <!--th>Fecha actual</th-->
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--agrega el contenido aquí-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group" style="display:none">
                                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>
                                        <div class="col-md-4">
                                            <input id="textinput" name="id_usuario_exp" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>
                                        </div>
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
                    <button class="btn btn-primary " id="btnP" type="button" style="font-size: 22px; border-radius: 15px;"><i class="fa fa-refresh"></i> Limpiar Campos</button>
                    <button type="submit" class="btn btn-success btn-lg" style="font-size: 22px; border-radius: 15px;width: 300px;"><i class="fa fa-save"></i> Guardar Registro</button>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">

                </div>
            </div>
        </div>

        </form>
        <div class="clearfix"></div>
    </section>

    <section class="fblanco" id="ConsultarExp">
        <input type="hidden" id="idNino">
        <div class="container">
            <h2>Consultar Expediente Ni&ntilde;os Ni&ntilde;as o Adolescentes</h2>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="font-size:21px">
                        <i class="fa fa-list"></i> Información del niño/a ó adolescente
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Código del Niño/a o Adolescente</label>
                                    <input id="idSnino" name="idnino" type="text" placeholder="" class="form-control input-md" value="" readonly>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Fecha de Inicio del Expediente</label>
                                    <input id="fechaS_exp" name="fecha_exp" type="text" placeholder="" class="form-control input-md" value="" readonly>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Nombres de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
                                    <input id="nomS_nna_exp" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>No. de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
                                    <input id="numS_nna_exp" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="" readonly>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                    <label>Nombre de Madre, Padre o Acudiente</label>
                                    <input id="nomS_mpa_exp" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>No. de Documento de Madre, Padre o Acudiente</label>
                                    <input id="numS_mpa_exp" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
                                </div>

                                <div id="cual_vinculo" class="col-md-4 col-sm-4 col-xs-12 form-group">
                                    <label>id Cuidadores</label>
                                    <input id="cuidadoresS_exp" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="" readonly>
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
                        <i class="fa fa-user"></i> Información del Expediente
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form id="formExpe" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Número del proceso</label>
                                        <input id='num_show_pro' name='num_show_pro' class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Restablecimiento de Derechos</label>
                                        <input id='derechos_show_exp' name='derechos_show_exp' class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                    </div>
                                    <div class="col-md-8 col-sm-4 col-xs-12 form-group">
                                        <label>Discapacidad</label>
                                        <input id='discapacidad_show_exp' name='discapacidad_show_exp' class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                    </div>

                                    <div class="col-md-12 col-sm-6 col-xs-12 form-group well">
                                        <label>Indicadores</label>
                                        <table id="indicadorShowTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id Indicador</th>
                                                    <th>Descripción Indicador</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Maltrato</label>
                                        <input id='maltratos_show_exp' name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Victimas</label>
                                        <input id='victima_show_exp' name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Descripci&oacute;n</label>
                                        <textarea class="form-control input-md" id="descripcion_show_exp" name="descripcion_exp" readonly></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-12 form-group">
                                        <label>Observaciones</label>
                                        <textarea class="form-control input-md" id="obs_show_exp" name="obs_exp" readonly></textarea>
                                        <!--<p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Fecha limite de la actuación administrativa</label>
                                        <input id="finalizacion_show_exp" name="finalizacion_exp" class="form-control" placeholder="AAAA-MM-DD" font style="text-transform: uppercase;" readonly>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Entidad</label>
                                        <input id='entidad_show_exp' name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>

                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                        <label>Estado del Expediente</label>
                                        <input id='estadocaso_show_exp' name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                    </div>
                                    <div class="col-md-8 col-sm-4 col-xs-12 form-group">
                                        <label>Concepto del Caso</label>
                                        <input id='concepto_show' name='num_pro' min="0" class="form-control" placeholder="Ingrese la edad " font style="text-transform: uppercase;" onkeypress="return valida(event)" readonly>
                                    </div>

                                    <div class="col-md-12 col-sm-6 col-xs-12 form-group well" id="addActuacion">
                                        <label>Actuaciones</label>
                                        <table id="ActuacionesShpwTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Actuación</th>
                                                    <th>Funcionario</th>
                                                    <th>Descripcion</th>
                                                    <th>Compromisos</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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