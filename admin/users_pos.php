<?php
$id_usuario =  $_GET ['id_usuario'];

$id_usuario = $_POST['id_usuario '];
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$id_tipo_documento = $_POST['id_tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$id_genero = $_POST['id_genero'];
$id_municipio = $_POST['id_municipio'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$clave = sha1($_POST['clave']);
$email = $_POST['correo'];
$id_perfil = $_POST['id_perfil'];
$nivel = $_POST['Nivel'];
$id_entidad = date("id_entidad");
$estado = $_FILES['estado'];
$fecha_registro = $fecha_registro;

#Consulta de Datos Duplicados en el sistema
#Numero maximo de administradores
$maxadmin = mysqli_query($con,"SELECT * FROM usuarios WHERE Nivel='1'");
$totaladmin = mysqli_num_rows($maxadmin);

#revisar si el nombre de usuario ya existe
$selus = mysqli_query($con,"SELECT * FROM usuarios WHERE user ='$usuario'");
$totalus = mysqli_num_rows($selus);



#Condicionales de validación de datos.
if ($totalus > 0) {
		echo '<div class="alert alert-warning">El Usuario Ya existe</div>';
		echo '<a class="btn btn-default" href="javascript: history.go(-1)"><i class="fa fa-left-arrow"></i>Regresar</a>';
}
elseif ($totalus == 1) {
	if ($totaladmin > 1){
	echo '<div class="alert alert-warning">No se permite el ingreso de mas Administradores del Sistema</div>';
		echo '<a class="btn btn-default" href="javascript: history.go(-1)"><i class="fa fa-left-arrow"></i>Regresar</a>';
	}
}
elseif ($pass <> $pass2) {

	echo '<div class="alert alert-warning">Las contraseñas no coinciden</div>';
		echo '<a class="btn btn-default" href="javascript: history.go(-1)"><i class="fa fa-left-arrow"></i>Regresar</a>';
}
else {

 mysqli_query($con,"INSERT INTO usuarios (Nombres, User, Pass, Nivel, Email, Activo, Id_secre) values ('$nombres','$usuario','$pass','$level','$email', '1', 'Id_secre')") or Die(mysqli_error($con));


echo '<div class="alert alert-success">El Usuario se ha registrado correctamente, Sus datos Son:';
echo 'Nombres:'.$nombres.'<br>Usuario:'.$usuario;
echo '<br /><a href="main.php?key=102" class="btn btn-default"><i class="fa fa-arrow-left">Regresar a Gestión de Usuarios</i></a></div>';
}
?>
