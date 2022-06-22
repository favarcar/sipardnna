<?php
//Proceso de conexi�n con la base de datos
include("conexion/conexion.php");

//Inicio de variables de sesi�n
if (!isset($_SESSION)) {
  session_start();
}

//Recibir los datos ingresados en el formulario
$usuario        = $_POST['usuario'];
$contrasena     = $_POST['contrasena'];
$contrasena_md5 = md5($contrasena);
//echo $usuario.'-'.$contrasena_md5;

/////////////////Consulta para el ingreso a administrativos

//Consultar si los datos son est�n guardados en la base de datos
$consulta= "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND clave = '".$contrasena_md5."' AND estado = 1";
$resultado = mysqli_query ($con,$consulta) or die (mysqli_error());
$fila = mysqli_fetch_array($resultado);

if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "index.html"
	</script>';
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesi�n y redirigimos a la p�gina de usuario
	$_SESSION['nombres'] = $fila['nombres'];
	$_SESSION['numero_documento'] = $fila['numero_documento'];

	$con1= "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND clave='".$contrasena_md5."' AND estado = 1";
	$resultado1 = mysqli_query ($con,$con1) or die (mysqli_error());

	 while($row=mysqli_fetch_array($resultado1)){
	 $consecutivo= $row['consecutivo'];
	  $id_usuario= $row['id_usuario'];
	  $id_perfil= $row['id_perfil'];
	 }
	date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha=  date("Y-m-d", $time);
	$hora=  date("H:m:n", $time);

	 mysqli_query($con,"INSERT INTO `logins` VALUES ('$consecutivo','$id_usuario','$fecha','$hora')") or die(mysql_error());

if($id_perfil == 10 )
    {
	 header("Location: MenuSuperUsuario.php");
	}
	else
	 {
	  echo '<script language = javascript>
	  alert("Usuario o Password errados, por favor verifique.")
	  self.location = "index.html"
	  </script>';
	 }

      if($id_perfil == 9 )
      {
	   header("Location: MenuJuezFamilia.php");
	  }
	   else
	    {
		 echo '<script language = javascript>
	     alert("Usuario o Password errados, por favor verifique.")
	     self.location = "index.html"
	     </script>';
	    }

		 if($id_perfil == 8 )
         {
          header("Location: MenuProcura.php");
	     }
	      else
	       {
		    echo '<script language = javascript>
	        alert("Usuario o Password errados, por favor verifique.")
	        self.location = "index.html"
	        </script>';
	       }

			if($id_perfil == 7 )
            {
	         header("Location: MenuPersoneria.php");
	        }
	         else
	          {
		       echo '<script language = javascript>
	           alert("Usuario o Password errados, por favor verifique.")
	           self.location = "index.html"
	           </script>';
	          }

	           if($id_perfil == 6 )
               {
              //header("Location: MenuComisariaFamilia.php");
              header("Location: main.php?key=7&Id_perfil=6;");
	           }
	            else
	             {
		          echo '<script language = javascript>
	              alert("Usuario o Password errados, por favor verifique.")
	              self.location = "index.html"
	              </script>';
		         }

	              if($id_perfil == 5 )
                  {
                   header("Location: MenuInvitado.php");
	              }
	               else
	                {
		             echo '<script language = javascript>
	                 alert("Usuario o Password errados, por favor verifique.")
	                 self.location = "index.html"
	                 </script>';
	                }

					 if($id_perfil == 4 )
                     {
                       //header("Location: MenuEnlaceMunicipal.php");
					   header("Location: main.php?key=0&Id_perfil=4;");
	                 }
	                  else
	                   {
		                echo '<script language = javascript>
	                    alert("Usuario o Password errados, por favor verifique.")
	                    self.location = "index.html"
	                    </script>';
		     	       }

	                    if($id_perfil == 3 )
                        {
		                 header("Location: MenuSupervisor.php");
		                }
	                     else
	                      {
		                   echo '<script language = javascript>
	                       alert("Usuario o Password errados, por favor verifique.")
	                       self.location = "index.html"
	                       </script>';
		                   }

	                        if($id_perfil == 2 )
                            {
	                      	 header("Location: MenuDirector.php");
		                    }
	                         else
	                          {
		                       echo '<script language = javascript>
	                           alert("Usuario o Password errados, por favor verifique.")
	                           self.location = "index.html"
	                           </script>';
		               	      }

	                           if($id_perfil == 1 )
                               {
	        	                header("Location: MenuAdministrador.php");
	                           }
	                            else
	                             {
		                          echo '<script language = javascript>
	                              alert("Usuario o Password errados, por favor verifique.")
	                              self.location = "index.html"
	                              </script>';
			                     }
}

?>
