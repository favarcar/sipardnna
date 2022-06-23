
<?php 
    $user="usr_sipardna_new";
    $pass="Gober*2020";
	$server="localhost";
	$db="sipardnna_new2";
    $con = mysqli_connect($server, $user, $pass, $db) or die ("Error al conectar a la base de datos".mysqli_error($con));	
    
    /* Cambiamos el conjunto de caracteres a utf8 */
    mysqli_set_charset($con, "utf8");
    
    //mysql_select_db($db,$con) or die ("Base de datos no existente");
	
    //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
    $mysqli = new mysqli($server, $user, $pass, $db); 
	
	if(mysqli_connect_errno()){
            echo 'Conexion Fallida: ', mysqli_connect_error();
            exit();
	}
?>