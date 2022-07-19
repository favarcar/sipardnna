<?php
#Mostrar los nombres y apellidos del Usuario
function veruser($idvar){
global $con;

if($idvar == "Sistema"){

	return "Sistema";
}else{

$sql = mysqli_query($con,"select * from usuarios WHERE Usuario ='$idvar'");
$row_sql = mysqli_fetch_assoc($sql);
$nombre = $row_sql['Nombres'];
return "$nombre";}
}

#Mostrar el nivel de acceso del usuario
function usernivel($idvar){
global $con;
$sql = mysqli_query($con,"select * from Usuarios WHERE Usuario ='$idvar'");
$row_sql = mysqli_fetch_assoc($sql);
$nivelevel = $row_sql['Nivel'];
echo "$nivelevel";
}

#Mostrar los nombres y apellidos del Usuario
function versolic($idvar)
{
global $con;
$sql = mysqli_query($con,"SELECT * FROM solicitantes WHERE Id_solicita ='$idvar'");
$row_sql = mysqli_fetch_assoc($sql);
$nombre = $row_sql['Nombre'].' '.$row_sql['Apellidos'];
return $nombre;
}

# Tipo de Usuario
function vertipo($idvar){

switch ($idvar) {
	case 1:
$levelus = "Administrador";
break;
	case 2:
$levelus = "Registro";
break;
case 3:
$levelus = "Consulta";
break;
}

echo "$levelus";
}

# Funcion para mostrar la fecha en formato Dia mes y Año formato español

function fecha($date)
{
//formato fecha americana
$fecha2=date("d/m/Y",strtotime($date));
//El nuevo valor de la variable: $fecha2="20-10-2008"
return $fecha2;
}

function fecha_h($date)
{
//formato fecha americana
$fecha2=date("d/m/Y H:i:s",strtotime($date));
//El nuevo valor de la variable: $fecha2="20-10-2008"
return $fecha2;
}
# funcion para convertir de formato español a ingles

function fecha_ing($date)
{
    if($date)
    {
        $fecha=$date;
        $hora="";

        # separamos la fecha recibida por el espacio de separación entre
        # la fecha y la hora
        $fechaHora=explode(" ",$date);
        if(count($fechaHora)==2)
        {
            $fecha=$fechaHora[0];
            $hora=$fechaHora[1];
        }

        # cogemos los valores de la fecha
        $values=preg_split('/(\/|-)/',$fecha);
        if(count($values)==3)
        {
            # devolvemos la fecha en formato ingles
            if($hora && count(explode(":",$hora))==3)
            {
                # si la hora esta separada por : y hay tres valores...
                $hora=explode(":",$hora);
                return date("Y/m/d H:i:s",mktime($hora[0],$hora[1],$hora[2],$values[1],$values[0],$values[2]));
            }else{
                return date("Y/m/d",mktime(0,0,0,$values[1],$values[0],$values[2]));
            }
        }
    }
    return "0000/00/00";
}

#Calcula la cantidad de dias trascurridos entre dos fechas

function dias_trans($fecha_i,$fecha_f)
{
$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);

$dias++;

	return $dias;
	}
//funcion para mostrar datos en formato moneda
function Moneda($valor) {
	$amoneda = number_format($valor, 0,',','.');
	if (empty($valor)){
		echo "-";
	}
	else{
	return "$ ".$amoneda;
	}

	}

// Funcion para validar formularios grandes
	function validar($valor, $nulo){
	$numreq1 = intval(preg_replace('/[^0-9]+/', '', $valor), 10);

if($nulo == "NO"){
	$requerido = "required ";
	}else{
		$requerido = "";
		}

if ($numreq1 > 10){

		$numreq = "0, $numreq1" ;

	$titulonum = "de 0 a $numreq1";
		}else {

			$numreq = $numreq1;
			}

if (strpos($valor, 'int') === false ){$contenido = "[A-Za-Z0-9]"; $titulotipo = "Escriba caracteres "; $titulonum = "de 0 a $numreq1"; } else { $contenido = "[0-9]"; $titulotipo ="Solamente escriba numeros enteros"; $titulonum = "de 0 a $numreq1";}

	$titulo = $titulotipo.$titulonum;

return $requerido .' pattern = "'.$contenido.'{'.$numreq.'}" title = "'.$titulo.'" maxlength ="'.$numreq1.'"'; // resultado: 102030

		}

//Funcion para borrar y verificar

function borraryvalidar($tablaconsul, $campoconsul, $dato, $bid_dato, $btabla, $bclave,$bbackey){
global $con;
	//tablaconsul es la tabla donde se va a consultar la verificación
	//Campo es el campo que se busca el where
	//dato es el campo por el cual se comprobara la consulta WHERE
	//bid es el valor de la id del registro a eliminar
	//btabla es la tabla a la que pertenece este registro
	//$bclave es e Id de la tabla donde se elimiara el registro
	//bbackey es el id del a pagina a la cual debe regresar luego de borrar

$sql = mysqli_query($con,"SELECT * FROM $tablaconsul WHERE $campoconsul = '$dato'");
$row_sql = mysqli_fetch_array($sql);
$numsql = mysqli_num_rows($sql);

if ($numsql){
//Si se encuentra algo
		$boton = '<img src="images/eliminar.png" alt="Borrar" title="Este campo tiene valores relacionados en la tabla '.$tablaconsul.'" style=" opacity: 0.5;"/>';
	}else{
//Si no esta relacioada, borrar
$boton = '<a href="javascript:borrado('.$bid_dato.',\''.$btabla.'\',\''.$bclave.'\','.$bbackey.')"><img src="images/eliminar.png" alt="Borrar" title="Eliminar" class="pic"/></a>';
		}
//fin funcion borraryvalidar


return $boton;

	}

# Funcion para mostrar marcado un valor dependiendo de 1 0 0 usado en checkbox
function marcar_check($check){

	if($check == 1){
		return "checked";
	}
}

# Funcion para descativar control al administrador
function activado($idvar){

	if($idvar < 2){
		return 'disabled="disabled"';
	}
}



//#Funcion para limpiar variables
function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
    '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }

function limpia_var($input) {
global $con;

	if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = cleanInput($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysqli_real_escape_string($con,$input);
    }
    return $output;
}
#funcion para generar contraseñas
function genera_clave(){
	//Se define una cadena de caractares. Te recomiendo que uses esta.
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	//Obtenemos la longitud de la cadena de caracteres
	$longitudCadena=strlen($cadena);

	//Se define la variable que va a contener la contraseña
	$pass = "";
	//Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
	$longitudPass=10;

	//Creamos la contraseña
	for($i=1 ; $i<=$longitudPass ; $i++){
		//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
		$pos=rand(0,$longitudCadena-1);

		//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
		$pass .= substr($cadena,$pos,1);
	}
	return $pass;
}

#Funcion para crear carpetas segun la ruta asignada
function mkdir_recursivo($pathname, $mode){
	umask(0);
	is_dir(dirname($pathname)) || mkdir_recursive(dirname($pathname), $mode);
	return is_dir($pathname) || mkdir($pathname, $mode);
}

#Funcion para eliminar los directorios
function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
}
// Funcion para describir los campos de forma legible para el usuario
function mask_val($val, $campo){

	switch ($campo){
		case "Atipico":
	    return	ati_option('',$val,'text');
			break;
		case "Fecha_exp":
		return fecha($val);
		    break;
	    case "Despues_de":
		return fecha($val);
		    break;
	    case "Antes_de":
		return fecha($val);
		    break;
	case "Fecha":
		return fecha_h($val);
	    break;
		default:
			return $val;
	}


}
// Funcion para describir los campos de forma legible para el usuario
function mask_field($campo){

	switch ($campo){
	case "Fecha_exp":
		return "Fecha de expedición";
	break;
		default:
			return str_replace("_"," ",$campo);
	}

}
# Funcion para esconder las columnas de la tabla
function colvisible($idvar)
{
if ($idvar == "Id_certifica" | $idvar == "Id" | $idvar == "Usuario" | $idvar == "Fecha_mod" |  $idvar == "Adjunto" | $idvar == "Cer_digital" | $idvar == "Notas" ||  $idvar == "Id_datcer" || $idvar == "Residuo" || $idvar == "Password"){
$visible = "none";
}
else{$visible = "table-cell";}
return $visible;
}

// funcion para marcar seleccionado datos en listbox
function selecion($val1, $val2){
	if($val1 == $val2){
		echo "selected";
	}
}

//Funcion para consultar cualquier dato de cualquien tabla

function consulta_campo($table, $fieldq, $idvar,$fieldr){
	//tabla, campo de consulta, valor, campo de respuesta
 global $con;
$sql = mysqli_query($con,"SELECT * from $table WHERE $fieldq = '$idvar'");
$row_sql = mysqli_fetch_assoc($sql);
if (!($row_sql)){
	return "";
}else{
	return $row_sql[$fieldr];
}

}
 //Funcion para registrar movimientos de usuarios
 function user_log($user,$actividad){
	 global $con;
mysqli_query($con,"INSERT INTO users_log (User_log, Actividad) VALUES('$user','$actividad') ") or die(mysqli_error($con));
 };


# funcion para mostrar los inputs necesarios en un edit muy largo
function define_input($type, $field, $value, $null){

$tipo = explode("(",$type);

//Si el campo es requerido, lo sera en el control
if($null == "YES"){
$req = "";
	}else{
		$req = "required";
		}

//Si es tipo numero muestra un campo tipo number
if ($tipo[0] == "date"){
$control = '<input type="date" name="'.$field.'" id="'.$field.'" value="'.$value.' '.$req.'" class="form-control">';
	}
else if ($tipo[0] == "int" || $tipo == "bigint"){
$control = '<input type="number" name="'.$field.'" id="'.$field.'" value="'.$value.'" '.$req.' class="form-control">';
	}
else if ($tipo[0] == "text"){
$control = '<textarea name="'.$field.'" id="'.$field.'" cols="50" rows="3" '.$req.' class="form-control">'.$value.' </textarea>';
}
 else{
$control = 	'<input type="text" name="'.$field.'" id="'.$field.'" value="'.$value.'" '.$req.' class="form-control">';
	}
return $control;

	}


	
	

