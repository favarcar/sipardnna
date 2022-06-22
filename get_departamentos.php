<?php
include("conexion/conexion.php");
date_default_timezone_set('America/Bogota');
$time = time();
$fecha = date("Y-m-d", $time);

//pasamos id del departamento
if (!empty($_POST["id"])) {

    if ($_POST["identificador"] == '1') {

        if ($_POST["id"] != '42') {

            $pais = 0;
        } else {

            $pais = $_POST["id"];
        }
        //$sql ="SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = '" . $_POST["id_departamento"] . "'";
        //$consulta_departamento = $mysqli->query("SELECT id, descripcion FROM departamentos WHERE id = '".$_POST["id"]."' ");
        $consulta_departamento = $mysqli->query("SELECT de.id, de.descripcion, de.id_pais FROM departamentos de
        WHERE de.id_pais=$pais");
        //INNER JOIN paises pa  ON '=de.id_pais");
        //construimos lista nueva dependiente
        ?>
        <option value="">Seleccionar Departamento</option>

        <?php
        while ($departamento = $consulta_departamento->fetch_object()) {
            ?>
            <option value="<?php echo $departamento->id; ?>"
            <?php if ($departamento->id_pais == '0') { ?>
                        selected="0"
                    <?php } ?>
                    ><?php echo $departamento->descripcion; ?>
            </option>

            <?php
        }
    }


    if ($_POST["identificador"] == '2') {

        //$sql ="SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = '" . $_POST["id_departamento"] . "'";
        $consulta_municipios = $mysqli->query("SELECT id_municipio, descripcion FROM municipios WHERE id_departamento = '" . $_POST["id"] . "' ");

        //construimos lista nueva dependiente
        ?>
        <option value="">Seleccionar Municipio</option>
        <?php
        while ($municipio = $consulta_municipios->fetch_object()) {
            ?>
            <option value="<?php echo $municipio->id_municipio; ?>"><?php echo $municipio->descripcion; ?></option>
            <?php
        }
    }

    if ($_POST["identificador"] == '3') {

        $consulta_provincia = $mysqli->query("SELECT id_provincia, descripcion_prov FROM municipios WHERE id_municipio = '" . $_POST["id"] . "' ");

        //construimos lista nueva dependiente
        ?>
        <option value="">Seleccionar Provincia</option>
        <?php
        while ($provincia = $consulta_provincia->fetch_object()) {
            ?>
            <option value="<?php echo $provincia->id_provincia; ?>"><?php echo $provincia->descripcion_prov; ?></option>
            <?php
        }
    }
}
?>

























