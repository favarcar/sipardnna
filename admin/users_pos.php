<?php
$apellidos = $_POST['apellidos'];
$Nombres = $_POST['nombres'];
$id_tipo = $_POST['id_tipo_documento'];
$numero = $_POST['numero_documento'];
$id_genero = $_POST['id_genero'];
$id_municipio = $_POST['id_municipio'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$pass = $_POST['clave'];
$email = $_POST['correo'];
$id_perfil = $_POST['id_perfil'];
$nivel = $_POST['Nivel'];
$id_entidad = $_POST['id_entidad'];
$estado = $_POST['estado'];



#Consulta de Datos Duplicados en el sistema
#Numero maximo de administradores
$maxadmin = mysqli_query($con,"SELECT * FROM usuarios WHERE Nivel='1'");
$totaladmin = mysqli_num_rows($maxadmin);

#revisar si el nombre de usuario ya existe
$us = mysqli_query($con,"SELECT * FROM usuarios WHERE usuario ='$usuario'");
$totalus = mysqli_num_rows($us);



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

else {

 mysqli_query($con,"INSERT INTO usuarios (id_usuario, apellidos, nombres, id_tipo_documento, numero_documento, id_genero, id_municipio, telefono, usuario, clave, correo, id_perfil, Nivel, id_entidad, estado) values ('','$apellidos','$Nombres','$id_tipo','$numero','$id_genero','$id_municipio','$telefono','$usuario','$pass','$email','$id_perfil','$nivel','$id_entidad','$estado',)") or Die(mysqli_error($con));


echo '<div class="alert alert-success">El Usuario se ha registrado correctamente, Sus datos Son:';
echo 'Nombres:'.$nombres.'<br>Usuario:'.$usuario;
echo '<br /><a href="main.php?key=102" class="btn btn-default"><i class="fa fa-arrow-left">Regresar a Gestión de Usuarios</i></a></div>';
}
?>
