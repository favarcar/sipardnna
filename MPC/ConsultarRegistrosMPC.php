<?php
    include("../conexion/conexion.php");


    $id_ninnos = $_GET['id_ninnos'];



    $busqueda = mysqli_query($con, "SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
    while ($row = mysqli_fetch_array($busqueda)) {

        $id_ninnos1 = $row['id_ninnos'];
        $No_identificacion = $row['No_identificacion'];
        $Nombres = $row['Nombres'];
        $Apellidos = $row['Apellidos'];
    }
    $busqueda1 = mysqli_query($con, "SELECT * FROM cuidadores where id_ninos='$id_ninnos' "); //cambiar nombre de la tabla de busqueda
    while ($row1 = mysqli_fetch_array($busqueda1)) {

        //// cuidadores
        $id_cuidadores = $row1['id_cuidadores'];
        $id_tipo_documento = $row1['id_tipo_documento'];
        $No_Cedula = $row1['No_Cedula'];
        $NombresCuida = $row1['Nombres_cuidadores'];
        $ApellidosCuida = $row1['Apellidos_cuidadores'];
        $Fecha_Nacimiento = $row1['Fecha_Nacimiento'];
        $Edad = $row1['Edad'];
        $Direccion = $row1['Direccion'];
        $telefono_movil = $row1['telefono_movil'];
        $correo_electronico = $row1['correo_electronico'];
        $id_parentesco = $row1['id_parentesco'];
        $id_estado = $row1['id_estado'];
        $id_estrato = $row1['id_estrato'];
        $id_etnia = $row1['id_etnia'];
        $id_genero = $row1['id_genero'];
        $id_niveleducativo = $row1['id_niveleducativo'];
        $id_regimen = $row1['id_regimen'];
        $id_eps = $row1['id_eps'];
        $id_departamento = $row1['id_departamento'];
        $id_municipio = $row1['id_municipio'];
        $id_provincia = $row1['id_provincia'];
        $id_zona = $row1['id_zona'];
        $Puntaje_Sisben = $row1['Puntaje_Sisben'];
        $fecha_cuida = $row1['fecha_cuida'];
        $id_usuario = $row1['id_usuario'];
        $id_ninos = $row1['id_ninos'];
        $id_pais = $row1["id_pais"];
    }

    ?>
    <?php


    //Iniciar Sesión
    session_start();

    //Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
    }

    $id_usuario = $_SESSION['numero_documento'];

    $consulta = "SELECT * FROM usuarios where numero_documento='$id_usuario' ";
    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
    $fila = mysqli_fetch_array($resultado);
    $nombres = $fila['nombres'];
    $apellido = $fila['apellidos'];



    ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Menú Principal dos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <style>
        body {
            padding-top: 0px;
            padding-bottom: 0px;
        }
    </style>


    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>

    <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
    <script>
        function obtenerMunicipios(val) {
            $.ajax({
                type: "POST",
                url: "../get_municipio.php",
                data: 'id_departamento=' + val,
                success: function(data) {
                    $("#municipio_nna").html(data);
                }
            });
        }

        function obtenerProvincia(val) {
            $.ajax({
                type: "POST",
                url: "../get_provincia.php",
                data: 'id_municipio=' + val,
                success: function(data) {
                    $("#provincia_nna").html(data);
                }
            });
        }

        function obtenerEps(val) {
            $.ajax({
                type: "POST",
                url: "../get_eps.php",
                data: 'id_regimen=' + val,
                success: function(data) {
                    $("#eps_nna").html(data);
                }
            });
        }

        function obtenerDepartamento(val, iden) {
            $.ajax({
                type: "POST",
                url: "../get_departamentos.php",
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
    </script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <section class="fblanco">
        <div class="container pi3x">
        <h3 class="centrar letra n600 azulo pi">Consultar/Editar Formulario Madres, Padres o Cuidadores</h3>
            <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_nna1" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" >

                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente </label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_nino" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" value="<?php echo $No_identificacion; ?>" >

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" value="<?php echo $NombresCuida ?>" >

                        </div>
                    </div>



                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-8">
                            <input id="textinput" name="ape_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" value="<?php echo $ApellidosCuida ?>" >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-8">

                            <?php $busqueda2 = mysqli_query($con, "SELECT * FROM tipos_documentos where id_tipo_documento='$id_tipo_documento' ");
                            while ($row2 = mysqli_fetch_array($busqueda2)) {

                                $id_tipo_documento = $row2['id_tipo_documento'];
                                $des_id_tipo = $row2['descripcion'];
                            }
                            ?>
                            <select name="tip_doc_nna" id="tip_doc_nna" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_tipo_documento ?>"><?php echo $des_id_tipo ?></option>
                                <?php
                                $con1 = mysqli_query($con, "select * from  tipos_documentos");
                                $reg = mysqli_fetch_array($con1);
                                do {
                                    $id = $reg['id_tipo_documento'];
                                    $des = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $des; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($con1));
                                ?>

                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento</label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_Cedula ?>" >

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>
                        <div class="col-md-8">
                            <input id="fecha_nna" name="fecha_nna" type="date" placeholder="" class="form-control input-md" onchange="calculate_age()" value="<?php echo  $Fecha_Nacimiento ?>" >

                        </div>
                    </div>
                    <script type="text/javascript">
                        function calculate_age() {
                            var dob = new Date($("#fecha_nna").val());
                            var diff_ms = Date.now() - dob.getTime();
                            var age_dt = new Date(diff_ms);

                            var age = Math.abs(age_dt.getUTCFullYear() - 1970);
                            $("#edad_nna").val(age);
                        }
                    </script>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>
                        <div class="col-md-8">
                            <input id="edad_nna" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Edad ?>">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Género</label>
                        <div class="col-md-8">
                            <?php
                            include("../conexion/conexion.php");
                            $busqueda33 = mysqli_query($con, "SELECT * FROM generos where id_genero='$id_genero' ");
                            while ($row33 = mysqli_fetch_array($busqueda33)) {
                                $id_genero33 = $row33['id_genero'];
                                $des_genero33 = $row33['descripcion'];
                            }
                            ?>
                            <select name="genero_nna" id="genero_nna" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_genero33 ?>"><?php echo $des_genero33  ?></option>
                                <?php
                                $con11 = mysqli_query($con, "select * from  generos");
                                $reg11 = mysqli_fetch_array($con11);
                                do {
                                    $id_genero11 = $reg11['id_genero'];
                                    $descripcion11 = $reg11['descripcion'];
                                ?>
                                    <option value="<?php echo $id_genero11; ?>"><?php echo $descripcion11; ?> </option>
                                <?php } while ($reg11 = mysqli_fetch_array($con11));
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php
                    $consulta_Pais = $mysqli->query("SELECT Id_Pais,Nombre FROM paises ORDER BY Nombre");
                    $consulta_departamentos = $mysqli->query("SELECT id, descripcion FROM departamentos ORDER BY descripcion");
                    $consulta_municipios    = $mysqli->query("SELECT id_municipio, descripcion FROM municipios ORDER BY descripcion");
                    $consulta_provincia     = $mysqli->query("SELECT id_provincia, descripcion_prov FROM provincias ORDER BY descripcion_prov");
                    $consulta_regimen       = $mysqli->query("SELECT id_regimen, descripcion FROM regimenes");
                    $consulta_eps           = $mysqli->query("SELECT id_eps, descripcion FROM eps ORDER BY descripcion");
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Pais de nacimiento</label>
                        <div class="col-md-8">
                            <select name="pais_nna" id="pais_nna" class="form-control" onchange="obtenerDepartamento(this.value, '1')" >
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
                            <select name="departamento_nna" id="departamento_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerDepartamento(this.value, '2')" >
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
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio de nacimiento</label>
                        <div class="col-md-8">
                            <select name="municipio_nna" id="municipio_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerDepartamento(this.value, '3')" >
                                <?php
                                $busqueda23 = mysqli_query($con, "SELECT * FROM municipios WHERE id_municipio = '$id_municipio' ");
                                while ($row23 = mysqli_fetch_array($busqueda23)) {
                                    $id_municipio = $row23['id_municipio'];
                                    $descripcion = $row23['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_municipio; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_municipios->fetch_object()) {
                                    echo "<option value = '" . $row->id_municipio . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia</label>
                        <div class="col-md-8">
                            <select name="provincia_nna" id="provincia_nna" class="form-control" style="text-transform: uppercase;" >
                                <?php
                                $busqueda14 = mysqli_query($con, "SELECT * FROM provincias WHERE id_provincia = '$id_provincia' ");
                                while ($row14 = mysqli_fetch_array($busqueda14)) {
                                    $id_provincia = $row14['id_provincia'];
                                    $descripcion_prov = $row14['descripcion_prov'];
                                }
                                ?>
                                <option value="<?php echo $id_provincia; ?>"><?php echo $descripcion_prov; ?></option>
                                <?php
                                while ($row = $consulta_provincia->fetch_object()) {
                                    echo "<option value = '" . $row->id_provincia . "' >" . $row->descripcion_prov . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección y barrio</label>
                        <div class="col-md-8">
                            <input id="textinput" name="dir_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" value="<?php echo $Direccion ?>">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono móvil</label>
                        <div class="col-md-8">
                            <input id="textinput" name="tel_nna" type="tel_nna" minlength="10" maxlength="10" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $telefono_movil ?>" >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-8">
                            <input id="textinput" name="email_nna" type="email" placeholder="" class="form-control input-md" value="<?php echo $correo_electronico ?>" >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
                        <div class="col-md-8">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM estratos where 	id_estrato='$id_estrato' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_estrato = $row1['id_estrato'];
                                $des_estrato = $row1['descripcion'];
                            }
                            ?>
                            <select name="estrato_nna" id="estrato_nna" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_estrato ?>"><?php echo $des_estrato ?></option>
                                <?php
                                $con4 = mysqli_query($con, "select * from estratos");
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
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM nivel_educativo where id_niveleducativo='$id_niveleducativo' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_niveleducativo = $row1['id_niveleducativo'];
                                $des_niveleducativo = $row1['descripcion'];
                            }
                            ?>
                            <select name="nivel_educa_nna" id="nivel_educa_nna" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_niveleducativo ?>"><?php echo $des_niveleducativo ?></option>
                                <?php
                                $con5 = mysqli_query($con, "select * from nivel_educativo");
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
                            <select name="regimen_nna" id="regimen_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerEps(this.value);" required>
                                <?php
                                $busqueda15 = mysqli_query($con, "SELECT * FROM regimenes WHERE id_regimen = '$id_regimen' ");
                                while ($row15 = mysqli_fetch_array($busqueda15)) {
                                    $id_regimen = $row15['id_regimen'];
                                    $descripcion = $row15['descripcion'];
                                }
                                ?>
                                <option value="<?php echo $id_regimen; ?>"><?php echo $descripcion; ?></option>
                                <?php
                                while ($row = $consulta_regimen->fetch_object()) {
                                    echo "<option value = '" . $row->id_regimen . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">SGSSS</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select name="eps_nna" id="eps_nna" class="form-control" style="text-transform: uppercase;" required>
                                    <?php
                                    $busqueda16 = mysqli_query($con, "SELECT * FROM eps WHERE id_eps = '$id_eps' ");
                                    while ($row16 = mysqli_fetch_array($busqueda16)) {
                                        $id_eps = $row16['id_eps'];
                                        $descripcion = $row16['descripcion'];
                                    }
                                    ?>
                                    <option value="<?php echo $id_eps; ?>"><?php echo $descripcion; ?></option>
                                    <?php
                                    while ($row = $consulta_eps->fetch_object()) {
                                        echo "<option value = '" . $row->id_eps . "' >" . $row->descripcion . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Etnias</label>
                        <div class="col-md-8">

                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM etnias where id_etnia='$id_etnia' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_etnia = $row1['id_etnia'];
                                $des_etnia = $row1['descripcion'];
                            }
                            ?>
                            <select name="etnias_nna" id="etnias_nna" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_etnia ?>"><?php echo  $des_etnia ?></option>
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
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Categorías del Sisb&eacute;n</label>
                        <div class="col-md-8">
                            <input id="textinput" name="sisben_nna" type="sisben_nna" style="text-transform: uppercase;" placeholder="Categorías [A1-A5] [B1-B7] [C1-C18] [D1-D21]" pattern="[A][1-5]{1}$|[B][1-7]{1}$|([C]([1-9]|1[0-8])$)|[D]([1-9]|1[0-9]|2[0-1])$[a][1-5]{1}$|[b][1-7]{1}$|([c]([1-9]|1[0-8])$)|[d]([1-9]|1[0-9]|2[0-1])$"class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Puntaje_Sisben ?>" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                        <div class="col-md-8">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM zonas where id_zona='$id_zona' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_zona = $row1['id_zona'];
                                $des_zona = $row1['descripcion'];
                            }
                            ?>
                            <select name="zona_nna" id="zona_nna" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_zona ?>"><?php echo $des_zona ?></option>
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

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Parentesco</label>
                        <div class="col-md-8">

                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM parentescos where id_parentesco='$id_parentesco' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_parentesco1 = $row1['id_parentesco'];
                                $des_parentesco1 = $row1['descripcion'];
                            }
                            ?>
                            <select name="parentescos" id="parentescos" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_parentesco1 ?>"><?php echo $des_parentesco1 ?></option>
                                <?php
                                $con20 = mysqli_query($con, "select * from parentescos");
                                $reg20 = mysqli_fetch_array($con20);
                                do {
                                    $id_parentesco2 = $reg20['id_parentesco'];
                                    $des_parentesco2 = $reg20['descripcion'];
                                ?>
                                    <option value="<?php echo $id_parentesco2; ?>"><?php echo $des_parentesco2; ?> </option>
                                <?php
                                } while ($reg20 = mysqli_fetch_array($con20));
                                ?>


                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado Civil</label>
                        <div class="col-md-8">
                            <?php $busqueda1 = mysqli_query($con, "SELECT * FROM estados_civiles where id_estado='$id_estado' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {

                                $id_estado = $row1['id_estado'];
                                $des_estado = $row1['descripcion'];
                            }
                            ?>
                            <select name="estado_civil" id="estado_civil" required class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_estado ?>"><?php echo $des_estado ?></option>
                                <?php
                                $con21 = mysqli_query($con, "select * from estados_civiles");
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
                            <input id="textinput" name="fecha_ingre" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $fecha_cuida ?>" required>

                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>
                        <div class="col-md-8">
                            <input id="textinput" name="id_usuario" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-8">
                            <button id="singlebutton" name="actualizar" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>

                </fieldset>
                <?php
                if (isset($_POST['actualizar'])) { //si se ha presionado enviar                    
                    $tip_doc_nna = $_POST['tip_doc_nna'];
                    $num_nna = $_POST['num_nna'];
                    $nom_nna = $_POST['nom_nna'];
                    $ape_nna = $_POST['ape_nna'];
                    $fecha_nna = $_POST['fecha_nna'];
                    $edad_nna = $_POST['edad_nna'];
                    $dir_nna = $_POST['dir_nna'];
                    $tel_nna = $_POST['tel_nna'];
                    $email_nna = $_POST['email_nna'];
                    $parentescos = $_POST['parentescos'];
                    $estado_civil = $_POST['estado_civil'];
                    $estrato_nna = $_POST['estrato_nna'];
                    $etnias_nna = $_POST['etnias_nna'];
                    $genero_nna = $_POST['genero_nna'];
                    $nivel_educa_nna = $_POST['nivel_educa_nna'];
                    $regimen_nna = $_POST['regimen_nna'];
                    $eps_nna = $_POST['eps_nna'];
                    $municipio_nna = $_POST['municipio_nna'];
                    $provincia_nna = $_POST['provincia_nna'];
                    $zona_nna = $_POST['zona_nna'];
                    $sisben_nna = $_POST['sisben_nna'];
                    $fecha_ingre = $_POST['fecha_ingre'];
                    $id_usuario = $_POST['id_usuario'];
                    $num_nino = $_POST['num_nino'];
                    $id_pais = $_POST['pais_nna'];
                    $dep = $_POST['departamento_nna'];
                    mysqli_query($con, "UPDATE `cuidadores` SET `id_tipo_documento`='$tip_doc_nna',`No_Cedula`='$num_nna',`Nombres_cuidadores`='$nom_nna',`Apellidos_cuidadores`='$ape_nna',`Fecha_Nacimiento`='$fecha_nna',`Edad`='$edad_nna',`Direccion`='$dir_nna',`telefono_movil`='$tel_nna',`correo_electronico`='$email_nna',`id_parentesco`='$parentescos',`id_estado`='$estado_civil',`id_estrato`='$estrato_nna',`id_etnia`='$etnias_nna',`id_genero`='$genero_nna',`id_niveleducativo`='$nivel_educa_nna',`id_regimen`='$regimen_nna',`id_eps`='$eps_nna',`id_municipio`='$municipio_nna',`id_provincia`='$provincia_nna',`id_zona`='$zona_nna',`Puntaje_Sisben`='$sisben_nna',`fecha_cuida`='$fecha_ingre',`id_usuario`='$id_usuario',id_pais='$id_pais',id_departamento='$dep' WHERE id_ninos='$id_ninnos'");

                    mysqli_close($con);


                    echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "ConsultarMPC.php"
</script>';
                }
                ?>
            </form>

        </div>
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

        function init() {
            $("#pais_nna").val(<?php echo $id_pais ?>);
        }

        init();
    </script>
</body>

</html>