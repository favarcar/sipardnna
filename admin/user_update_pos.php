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
$maxadmin = mysqli_query($con,"SELECT * FROM usuarios WHERE Nivel = '1'");
$totaladmin = mysqli_num_rows($maxadmin);

#Condicionales de validación de datos.

	if ($totaladmin > 1 && $level == 1){
	echo '<h1 class="error">No se permite el ingreso de más Administradores del Sistema</h1>';
		echo '<a href="javascript: history.go(-1)"> Regresar</a>';
	}

elseif ($pass <> $pass2) {
	
	echo '<div class="alert alert-warning">Las contraseñas no coinciden<br />';
		echo '<a href="javascript: history.go(-1)"><span class="glyphicon glyphicon-circle-arrow-left"></span>Regresar</a></div>';
}
else {

		
	
mysqli_query($con,"UPDATE usuarios SET apellidos = '$apellidos', nombres = '$nombres', id_tipo_documento = '$id_tipo_documento', numero_documento = '$numero_documento',
id_genero = '$id_genero', id_municipio = '$id_municipio', telefono = '$telefono', usuario = '$usuario', clave= '$clave', correo ='$email', id_perfil = $id_perfil',
Nivel = '$nivel', id_entidad = '$id_entidad', estado = '$estado', fecha_registro = '$fecha_registro' WHERE id_usuario = '$id_usuario'") or Die(mysqli_error($con));
  
 
echo '<div class="alert alert-success">El usuario se ha modificado correctamente</div>';
echo '<a href="main.php?key=105&Idusu='.$id_usuario.'" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-circle-arrow-left"></span>Regresar a Gestión de Usuarios</a>';
}

?>