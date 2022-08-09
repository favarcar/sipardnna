    <title>Menú Principal dos</title>
    <!-- Traemos los datos de la base de datos de la tabla ninnosnna para mostrar el documento en la consulta -->
    <?php
    $id_ninnos = $_GET['id_ninnos'];
    $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_ninnos = '$id_ninnos' "); //cambiar nombre de la tabla de busqueda 
    while ($row = mysqli_fetch_array($busqueda)) {
        $id_ninnos1         = $row['id_ninnos'];
        $No_identificacion  = $row['No_identificacion'];
        $Nombres            = $row['Nombres'];
        $Apellidos          = $row['Apellidos'];
    }  //Traemos los datos de la base de datos de la tabla cuidadores para mostrar el documento en la consulta 
    $busqueda1 = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_ninos = '$id_ninnos' "); //cambiar nombre de la tabla de busqueda
    while ($row1 = mysqli_fetch_array($busqueda1)) {
        // cuidadores
        $id_cuidadores      = $row1['id_cuidadores'];
        $id_tipo_documento  = $row1['id_tipo_documento'];
        $No_Cedula          = $row1['No_Cedula'];
        $NombresCuida       = $row1['Nombres_cuidadores'];
        $ApellidosCuida     = $row1['Apellidos_cuidadores'];
        $Fecha_Nacimiento   = $row1['Fecha_Nacimiento'];
        $Edad               = $row1['Edad'];
        $Direccion          = $row1['Direccion'];
        $telefono_movil     = $row1['telefono_movil'];
        $correo_electronico = $row1['correo_electronico'];
        $id_parentesco      = $row1['id_parentesco'];
        $id_estado          = $row1['id_estado'];
        $id_estrato         = $row1['id_estrato'];
        $id_etnia           = $row1['id_etnia'];
        $id_genero          = $row1['id_genero'];
        $id_niveleducativo  = $row1['id_niveleducativo'];
        $id_regimen         = $row1['id_regimen'];
        $id_eps             = $row1['id_eps'];
        $id_municipio       = $row1['id_municipio'];
        $id_provincia       = $row1['id_provincia'];
        $id_zona            = $row1['id_zona'];
        $Puntaje_Sisben     = $row1['Puntaje_Sisben'];
        $fecha_cuida        = $row1['fecha_cuida'];
        $id_usuario         = $row1['id_usuario'];
        $id_ninos           = $row1['id_ninos'];
        $id_pais = $row1["id_pais"];
        $id_departamento = $row1['id_departamento'];
    }
    ?>
    <?php


    //Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        echo '<script language = javascript>
           alert("usuario no autenticado")
           self.location = "index.html"
          </script>';
    }
    $id_usuario = $_SESSION['numero_documento'];
    $consulta = "SELECT * FROM usuarios WHERE numero_documento = '$id_usuario' ";
    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
    $fila = mysqli_fetch_array($resultado);
    $nombres = $fila['nombres'];
    $apellido = $fila['apellidos'];
    ?>

    <section class="fblanco">
        <div class="container pi3x">
        <h3 class="centrar letra n600 azulo pi">Consultar Formulario Madres, Padres o Cuidadores</h3>
            <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->

                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento N.N.A.</label>
                        <div class="col-md-8">
                            <input id="nom_nna1" name="nom_nna1" type="text" placeholder="" class=" form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label class="col-md-4 control-label letra n600 azulo" style="display:none"for="textinput">N. Documento N.N.A.</label>
                        <div class="col-md-8" style="display:none">
                            <input id="num_nino" name="num_nino" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php if (isset($No_identificacion)) {
echo $No_identificacion;
} else {
echo "No tiene N.N.A. a cargo"; }?>" readonly>                        
</div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-8">
                            <input id="nom_nna" name="nom_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $NombresCuida ?>" readonly>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-8">
                            <input id="ape_nna" name="ape_nna" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $ApellidosCuida ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda2 = mysqli_query($con, "SELECT * FROM tipos_documentos WHERE id_tipo_documento='$id_tipo_documento' ");
                            while ($row2 = mysqli_fetch_array($busqueda2)) {
                                $id_tipo_documento = $row2['id_tipo_documento'];
                                $des_id_tipo = $row2['descripcion'];
                            } ?>
                            <select name="tip_doc_nna" id="tip_doc_nna" class="form-control" style="text-transform: uppercase;" disabled>
                                <option value="<?php echo $id_tipo_documento ?>"><?php echo $des_id_tipo ?></option>
                                <?php
                                $con4 = mysqli_query($con, "select * from  tipos_documentos");
                                $reg = mysqli_fetch_array($con4);
                                do {
                                    $id = $reg['id_tipo_documento'];
                                    $des = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $des; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con4));
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. de Documento</label>
                        <div class="col-md-8">
                            <input id="num_nna" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_Cedula ?>" readonly>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>
                        <div class="col-md-8">
                            <input id="fecha_nna" name="fecha_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Fecha_Nacimiento; ?>" readonly>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>
                        <div class="col-md-8">
                            <input id="edad_nna" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Edad ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda3 = mysqli_query($con, "SELECT * FROM generos WHERE id_genero='$id_genero' ");
                            while ($row3 = mysqli_fetch_array($busqueda3)) {
                                $id_genero = $row3['id_genero'];
                                $des_genero = $row3['descripcion'];
                            } ?>
                            <select name="genero_nna" id="genero_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_genero ?>"><?php echo $des_genero  ?></option>
                                <?php
                                $con1 = mysqli_query($con, "SELECT * FROM  generos");
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

                    <?php
                    $consulta_Pais = $mysqli->query("SELECT Id_Pais,Nombre FROM paises ORDER BY Nombre");
                    $consulta_departamentos = $mysqli->query("SELECT id, descripcion FROM departamentos ORDER BY descripcion");
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Pais de nacimiento</label>
                        <div class="col-md-8">
                            <select name="pais_nna" id="pais_nna" class="form-control" required disabled>
                                <option value=''>SELECCIONE</option>
                                <?php
                                while ($row = $consulta_Pais->fetch_object()) {
                                    echo "<option value = '" . $row->Id_Pais . "' >" . $row->Nombre . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Departamento de nacimiento</label>
                        <div class="col-md-8">
                            <select name="departamento_nna" id="departamento_nna" class="form-control" style="text-transform: uppercase;" required disabled>
                                <?php
                                $busqueda13 = mysqli_query($con, "SELECT * FROM departamentos WHERE id = '$id_departamento' ");
                                while ($row13 = mysqli_fetch_array($busqueda13)) {
                                    $descripcion = $row13['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_departamento; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_departamentos->fetch_object()) {
                                    echo "<option value = '" . $row->id . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM municipios where id_municipio='$id_municipio' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_municipio = $row1['id_municipio'];
                                $des_municipio = $row1['descripcion'];
                            } ?>
                            <select name="municipio_nna" id="municipio_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_municipio ?>"><?php echo $des_municipio ?></option>
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
                            <select name="provincia_nna" id="provincia_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_provincia ?>"><?php echo $des_provincia ?></option>
                                <?php
                                $con3 = mysqli_query($con, "SELECT * FROM provincias");
                                $reg3 = mysqli_fetch_array($con3);
                                do {
                                    $id_provincia = $reg3['id_provincia'];
                                    $des_provincia = $reg3['descripcion_prov'];
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
                            <input id="dir_nna" name="dir_nna" type="text" placeholder="" class="form-control input-md" value="<?php echo $Direccion ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono móvil</label>
                        <div class="col-md-8">
                            <input id="tel_nna" name="tel_nna" type="tel" minlength="10" maxlength="10"placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $telefono_movil ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-8">
                            <input id="email_nna" name="email_nna" type="email" placeholder="" class="form-control input-md" value="<?php echo $correo_electronico ?>" readonly>
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

                            <select name="estrato_nna" id="estrato_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_estrato ?>"><?php echo $des_estrato ?></option>
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
                            }
                            ?>
                            <select name="nivel_educa_nna" id="nivel_educa_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_niveleducativo ?>"><?php echo $des_niveleducativo ?></option>
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
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Régimen</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM regimenes WHERE id_regimen='$id_regimen' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_regimen = $row1['id_regimen'];
                                $des_regimen = $row1['descripcion'];
                            }
                            ?>
                            <select name="regimen_nna" id="regimen_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_regimen ?>"><?php echo $des_regimen ?></option>
                                <?php
                                $con6 = mysqli_query($con, "SELECT * FROM regimenes");
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
                            $busqueda1 = mysqli_query($con, "SELECT * FROM eps WHERE id_eps='$id_eps' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_eps1 = $row1['id_eps'];
                                $des_eps = $row1['descripcion'];
                            }
                            ?>
                            <select name="eps_nna" id="eps_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_eps1 ?>"><?php echo $des_eps ?></option>
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
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM etnias WHERE id_etnia='$id_etnia' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_etnia = $row1['id_etnia'];
                                $des_etnia = $row1['descripcion'];
                            }
                            ?>

                            <select name="etnias_nna" id="etnias_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_etnia ?>"><?php echo $des_etnia ?></option>
                                <?php
                                $con8 = mysqli_query($con, "SELECT * FROM etnias");
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
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Categoría del Sisb&eacute;n</label>
                        <div class="col-md-8">
                            <input id="sisben_nna" name="sisben_nna" type="text" placeholder="Categorías [A1-A5] [B1-B7] [C1-C18] [D1-D21]" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Puntaje_Sisben ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda4 = mysqli_query($con, "SELECT * FROM zonas WHERE id_zona='$id_zona' ");
                            while ($row4 = mysqli_fetch_array($busqueda4)) {
                                $id_zona = $row4['id_zona'];
                                $des_zona = $row4['descripcion'];
                            }
                            ?>

                            <select name="zona_nna" id="zona_nna" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_zona ?>"><?php echo $des_zona ?></option>
                                <?php
                                $con9 = mysqli_query($con, "SELECT * FROM zonas");
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

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Parentesco</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda5 = mysqli_query($con, "SELECT * FROM parentescos WHERE id_parentesco='$id_parentesco' ");
                            while ($row5 = mysqli_fetch_array($busqueda5)) {
                                $id_parentesco10     = $row5['id_parentesco'];
                                $des_parentesco10    = $row5['descripcion'];
                            }
                            ?>

                            <select name="parentescos" id="parentescos" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_parentesco10 ?>"><?php echo $des_parentesco10 ?></option>
                                <?php
                                $con10 = mysqli_query($con, "SELECT * FROM parentescos");
                                $reg10 = mysqli_fetch_array($con10);
                                do {
                                    $id_parentesco20     = $reg20['id_parentesco'];
                                    $des_parentesco20    = $reg20['descripcion'];
                                ?>
                                    <option value="<?php echo $id_parentesco20; ?>"><?php echo $des_parentesco20; ?> </option>
                                <?php
                                } while ($reg20 = mysqli_fetch_array($con10));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado Civil</label>
                        <div class="col-md-8">
                            <?php
                            $busqueda6 = mysqli_query($con, "SELECT * FROM estados_civiles WHERE id_estado = '$id_estado' ");
                            while ($row6 = mysqli_fetch_array($busqueda6)) {
                                $id_estado = $row6['id_estado'];
                                $des_estado = $row6['descripcion'];
                            }
                            ?>
                            <select name="estado_civil" id="estado_civil" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_estado; ?>"><?php echo $des_estado; ?> </option>
                                <?php
                                $con21 = mysqli_query($con, "SELECT * FROM estados_civiles");
                                $reg21 = mysqli_fetch_array($con21);
                                do {
                                    $id_estado = $reg21['id_estado'];
                                    $des_estado = $reg21['descripcion'];
                                ?>
                                    <option value="<?php echo $id_estado; ?>"><?php echo $des_estado; ?> </option>
                                <?php
                                } while ($reg21 = mysqli_fetch_array($con21));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Ingreso</label>
                        <div class="col-md-8">
                            <input id="fecha_ingre" name="fecha_ingre" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $fecha_cuida ?>" required>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>
                        <div class="col-md-8">
                            <input id="id_usuario" name="id_usuario" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>');
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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