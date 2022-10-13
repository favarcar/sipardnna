
            <?php

$busqueda1=mysqli_query($con,"SELECT * FROM cuidadores where id_ninos='$id_ninos' ");//cambiar nombre de la tabla de busqueda
while($row1=mysqli_fetch_array($busqueda1)){

		  //// cuidadores
		 $id_cuidadores     = $row1['id_cuidadores'];
		 $id_tipo_documento = $row1['id_tipo_documento'];
		 $No_Cedula         = $row1['No_Cedula'];
		 $NombresCuida      = $row1['Nombres_cuidadores'];
		 $ApellidosCuida    = $row1['Apellidos_cuidadores'];
		 $Fecha_Nacimiento  = $row1['Fecha_Nacimiento'];
		 $Edad              = $row1['Edad'];
		 $Direccion         = $row1['Direccion'];
		 $telefono_movil    = $row1['telefono_movil'];
		 $correo_electronico=$row1['correo_electronico'];
		 $id_parentesco=$row1['id_parentesco'];
		 $id_estado=$row1['id_estado'];
		 $id_estrato=$row1['id_estrato'];
		 $id_etnia=$row1['id_etnia'];
		 $id_genero=$row1['id_genero'];
		 $id_niveleducativo=$row1['id_niveleducativo'];
		 $id_regimen=$row1['id_regimen'];
		 $id_eps=$row1['id_eps'];
		 $id_municipio=$row1['id_municipio'];
		 $id_provincia=$row1['id_provincia'];
		 $id_zona=$row1['id_zona'];
		 $Puntaje_Sisben=$row1['Puntaje_Sisben'];
		 $fecha_cuida=$row1['fecha_cuida'];
		 $id_usuario=$row1['id_usuario'];
		 $id_ninos=$row1['id_ninos'];
		 		
                      
          	  
}

?>
 <?php
   



//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
}

$id_usuario = $_SESSION['numero_documento'];

$consulta= "SELECT * FROM usuarios where numero_documento='$id_usuario' "; 
$resultado= mysqli_query($con,$consulta) or die (mysql_error());
$fila=mysqli_fetch_array($resultado);
$nombres = $fila['nombres'];
$apellido = $fila['apellidos'];



?>

    <section class="fblanco">
    <div class="container pi3x">

          <form class="form-horizontal ps2x"  method="post" enctype="multipart/form-data" >
                <fieldset>

                <!-- Form Name -->
                 <h3 class="centrar letra n600 azulo pi">Consultar/Editar Formulario Madres, Padres o Cuidadores</h3>
                 <!-- Appended checkbox --><!-- Appended checkbox --><!-- Text input-->
                 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres de Ni&ntilde;o Ni&ntilde;a o Adolescente</label>
                  <div class="col-md-4">
                  <input id="textinput" name="nom_nna1" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly >
                    
                  </div>
                </div>
                
                                               

                
                                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Ni&ntilde;o Ni&ntilde;a o Adolescente </label>  
                  <div class="col-md-4">
                  <input id="textinput" name="num_nino" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion;?>" readonly>
                    
                  </div>
                </div>
                
                
                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                  <div class="col-md-4">
                  <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo $NombresCuida ?>" required >
                    
                  </div>
                </div>
                
                                               

                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="ape_nna" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo $ApellidosCuida ?>" required>
                    
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                     <?php  $busqueda2=mysqli_query($con,"SELECT * FROM tipos_documentos where id_tipo_documento='$id_tipo_documento' ");
while($row2=mysqli_fetch_array($busqueda2)){
		  
		  $id_tipo_documento=$row2['id_tipo_documento'];		
          $des_id_tipo=$row2['descripcion'];             
	  
}
 ?>
                      <select name="tip_doc_nna" id="tip_doc_nna" required >
        <option value="<?php echo $id_tipo_documento ?>"><?php echo $des_id_tipo ?></option>
        <?php
	  $con=mysqli_query($con,"select * from  tipos_documentos");
	  $reg=mysqli_fetch_array($con);
	  do {
		  $id=$reg['id_tipo_documento'];
		  $des=$reg['descripcion'];
		  ?>
        <option value="<?php echo $id;?>" ><?php echo $des;?> </option>
        <?php
	  } while($reg=mysqli_fetch_array($con));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">N.o de Documento</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_Cedula ?>"  required>
                    
                  </div>
                </div>
                
                <!-- Text input-->
                                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="fecha_nna" type="date" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo  $Fecha_Nacimiento ?>" required >
                    
                  </div>
                </div>
                

                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Edad ?>" >
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Género</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                     <?php  
					 
					 $busqueda33=mysqli_query($con,"SELECT * FROM generos where id_genero='$id_genero' ");
while($row33=mysqli_fetch_array($busqueda33)){
		  
		  $id_genero33=$row33['id_genero'];		
          $des_genero33=$row33['descripcion'];             
	  
}
 ?>
                      <select name="genero_nna" id="genero_nna" required >
        <option value="<?php echo $id_genero33 ?>"><?php echo $des_genero33  ?></option>
        <?php
	  $con1=mysqli_query($con,"select * from  generos");
	  $reg1=mysqli_fetch_array($con1);
	  do {
		  $id_genero=$reg1['id_genero'];
		  $descripcion=$reg1['descripcion'];
		  ?>
        <option value="<?php echo $id_genero;?>" ><?php echo $descripcion;?> </option>
        <?php
	  } while($reg1=mysqli_fetch_array($con1));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>   
                
                                 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipio' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_municipio=$row1['id_municipio'];		
          $des_municipio=$row1['descripcion'];             
	  
}
 ?>
                      <select name="municipio_nna" id="municipio_nna" required >
        <option value="<?php echo $id_municipio ?>"><?php echo $des_municipio ?></option>
        <?php
	  $con2=mysqli_query($con,"select * from municipios");
	  $reg2=mysqli_fetch_array($con2);
	  do {
		  $id_mun=$reg2['id_municipio'];
		  $des_mun=$reg2['descripcion'];
		  ?>
        <option value="<?php echo $id_mun;?>" ><?php echo $des_mun;?> </option>
        <?php
	  } while($reg2=mysqli_fetch_array($con2));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>    
                
                 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                      <?php  $busqueda1=mysqli_query($con,"SELECT * FROM provincias where id_provincia='$id_provincia' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
                    $id_provincia=$row1['id_provincia'];		
                    $des_provincia=$row1['descripcion_prov'];             
	  
}
 ?>
                      <select name="provincia_nna" id="provincia_nna" required >
        <option value="<?php echo $id_provincia?>"><?php echo $des_provincia ?></option>
        <?php
	  $con3=mysqli_query($con,"select * from provincias");
	  $reg3=mysqli_fetch_array($con3);
	  do {
		  $id_provincia=$reg3['id_provincia'];
		  $des_provincia=$reg3['descripcion'];
		  ?>
        <option value="<?php echo $id_provincia;?>" ><?php echo $des_provincia;?> </option>
        <?php
	  } while($reg3=mysqli_fetch_array($con3));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>      
                  <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección y barrio</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="dir_nna" type="text" placeholder="" class="form-control input-md" value="<?php echo $Direccion ?>" >
                    
                  </div>
                </div>
                
                                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="tel_nna" type="tel_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $telefono_movil ?>" required >
                    
                  </div>
                </div>
                
 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="email_nna" type="email" placeholder="" class="form-control input-md" value="<?php echo $correo_electronico ?>" required   >
                    
                  </div>
                </div>
                
                                                 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM estratos where 	id_estrato='$id_estrato' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_estrato=$row1['id_estrato'];		
          $des_estrato=$row1['descripcion'];             
	  
}
 ?>
                      <select name="estrato_nna" id="estrato_nna" required >
        <option value="<?php echo $id_estrato ?>"><?php echo $des_estrato ?></option>
        <?php
	  $con4=mysqli_query($con,"select * from estratos");
	  $reg4=mysqli_fetch_array($con4);
	  do {
		  $id_estrato=$reg4['id_estrato'];
		  $des_estrato=$reg4['descripcion'];
		  ?>
        <option value="<?php echo $id_estrato;?>" ><?php echo $des_estrato;?> </option>
        <?php
	  } while($reg4=mysqli_fetch_array($con4));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div> 
                
                      <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel Educativo</label>
                  <div class="col-md-4">
                    <div class="input-group">
                     <?php  $busqueda1=mysqli_query($con,"SELECT * FROM nivel_educativo where id_niveleducativo='$id_niveleducativo' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_niveleducativo=$row1['id_niveleducativo'];		
          $des_niveleducativo=$row1['descripcion'];             
	  
}
 ?>
                      <select name="nivel_educa_nna" id="nivel_educa_nna" required >
        <option value="<?php echo $id_niveleducativo ?>"><?php echo $des_niveleducativo ?></option>
        <?php
	  $con5=mysqli_query($con,"select * from nivel_educativo");
	  $reg5=mysqli_fetch_array($con5);
	  do {
		  $id_niveleducativo=$reg5['id_niveleducativo'];
		  $des_niveleducativo=$reg5['descripcion'];
		  ?>
        <option value="<?php echo $id_niveleducativo;?>" ><?php echo $des_niveleducativo;?> </option>
        <?php
	  } while($reg5=mysqli_fetch_array($con5));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div> 
                
                 <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Reg&iacute;menes</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM regimenes where id_regimen='$id_regimen' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_regimen=$row1['id_regimen'];		
          $des_regimen=$row1['descripcion'];             
	  
}
 ?>
                      <select name="regimen_nna" id="regimen_nna" required >
        <option value="<?php echo $id_regimen ?>"><?php echo $des_regimen ?></option>
        <?php
	  $con6=mysqli_query($con,"select * from regimenes");
	  $reg6=mysqli_fetch_array($con6);
	  do {
		  $id_regimen=$reg6['id_regimen'];
		  $des_regimen=$reg6['descripcion'];
		  ?>
        <option value="<?php echo $id_regimen;?>" ><?php echo $des_regimen;?> </option>
        <?php
	  } while($reg6=mysqli_fetch_array($con6));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>
                
                
               <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">EPS</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM eps where id_eps='$id_eps' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_eps1=$row1['id_eps'];		
          $des_eps=$row1['descripcion'];             
	  
}
 ?>
                      <select name="eps_nna" id="eps_nna" required >
        <option value="<?php echo $id_eps1 ?>"><?php echo $des_eps?></option>
        <?php
	  $con7=mysqli_query($con,"select * from eps");
	  $reg7=mysqli_fetch_array($con7);
	  do {
		  $id_eps=$reg7['id_eps'];
		  $des_eps=$reg7['descripcion'];
		  ?>
        <option value="<?php echo $id_eps;?>" ><?php echo $des_eps;?> </option>
        <?php
	  } while($reg7=mysqli_fetch_array($con7));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>
                
                               <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Etnias</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM etnias where id_etnia='$id_etnia' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_etnia=$row1['id_etnia'];		
          $des_etnia=$row1['descripcion'];             
	  
}
 ?>
                      <select name="etnias_nna" id="etnias_nna" required >
        <option value="<?php echo $id_etnia ?>"><?php echo  $des_etnia ?></option>
        <?php
	  $con8=mysqli_query($con,"select * from etnias");
	  $reg8=mysqli_fetch_array($con8);
	  do {
		  $id_etnia=$reg8['id_etnia'];
		  $des_etnia=$reg8['descripcion'];
		  ?>
        <option value="<?php echo $id_etnia;?>" ><?php echo $des_etnia;?> </option>
        <?php
	  } while($reg8=mysqli_fetch_array($con8));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>
                
                                                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Categoría del Sisben</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="sisben_nna" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Puntaje_Sisben ?>" required >
                    
                  </div>
                </div>
                
                                               <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM zonas where id_zona='$id_zona' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_zona=$row1['id_zona'];		
          $des_zona=$row1['descripcion'];             
	  
}
 ?>
                      <select name="zona_nna" id="zona_nna" required >
        <option value="<?php echo $id_zona ?>"><?php echo $des_zona ?></option>
        <?php
	  $con9=mysqli_query($con,"select * from zonas");
	  $reg9=mysqli_fetch_array($con9);
	  do {
		  $id_zona=$reg9['id_zona'];
		  $des_zona=$reg9['descripcion'];
		  ?>
        <option value="<?php echo $id_zona;?>" ><?php echo $des_zona;?> </option>
        <?php
	  } while($reg9=mysqli_fetch_array($con9));
	  ?>
        
        </select>
                    </div>
                  </div>
                </div>
                
                          <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Parentesco</label>
                  <div class="col-md-4">
                    <div class="input-group">
                    
                    <?php  $busqueda1=mysqli_query($con,"SELECT * FROM parentescos where id_parentesco='$id_parentesco' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_parentesco1=$row1['id_parentesco'];		
          $des_parentesco1=$row1['descripcion'];             
	  
}
 ?>
                      <select name="parentescos" id="parentescos" required >
        <option value="<?php echo $id_parentesco1 ?>"><?php echo $des_parentesco1 ?></option>
        <?php
	  $con20=mysqli_query($con,"select * from parentescos");
	  $reg20=mysqli_fetch_array($con20);
	  do {
		  $id_parentesco2=$reg20['id_parentesco'];
		  $des_parentesco2=$reg20['descripcion'];
		  ?>
        <option value="<?php echo $id_parentesco2;?>" ><?php echo $des_parentesco2;?> </option>
        <?php
	  } while($reg20=mysqli_fetch_array($con20));
	  ?>
      
        
        </select>
                    </div>
                  </div>
                </div>
          
           <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado Civil</label>
                  <div class="col-md-4">
                    <div class="input-group">
                     <?php  $busqueda1=mysqli_query($con,"SELECT * FROM estados_civiles where id_estado='$id_estado' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_estado=$row1['id_estado'];		
          $des_estado=$row1['descripcion'];             
	  
}
 ?>	
                      <select name="estado_civil" id="estado_civil" required >
        <option value="<?php echo $id_estado ?>"><?php echo $des_estado ?></option>
        <?php
	  $con21=mysqli_query($con,"select * from estados_civiles");
	  $reg21=mysqli_fetch_array($con21);
	  do {
		  $id_estado=$reg21['id_estado'];
		  $des_estado=$reg21['descripcion'];
		  ?>
        <option value="<?php echo $id_estado;?>" ><?php echo $des_estado;?> </option>
        <?php
	  } while($reg21=mysqli_fetch_array($con21));
	  ?>
      
      
        
        </select>
                    </div>
                  </div>
                </div>  
                
                             <div class="form-group" style="display:none">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Ingreso</label>  
                  <div class="col-md-4">
                  <input id="textinput" name="fecha_ingre" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $fecha_cuida ?>" required >
                    
                  </div>
                </div>  
                
                             <div class="form-group" style="display:none">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>  
                  <div class="col-md-4">
                  <input id="textinput" name="id_usuario" type="sisben_nna" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required >
                    
                  </div>
                </div>  
               
                <div class="form-group">
                  <label class="col-md-4 control-label" for="singlebutton"></label>
                  <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar</button>
                  </div>
                </div>

                </fieldset>
                       <?php
					   include("../conexion/conexion.php");
if($_POST){ //si se ha presionado enviar
   
   $tip_doc_nna=$_POST['tip_doc_nna'];
   $num_nna=$_POST['num_nna'];
   $nom_nna=$_POST['nom_nna'];
   $ape_nna=$_POST['ape_nna'];
   $fecha_nna=$_POST['fecha_nna']; 
   $edad_nna=$_POST['edad_nna'];
   $dir_nna=$_POST['dir_nna'];
   $tel_nna=$_POST['tel_nna'];
   $email_nna=$_POST['email_nna'];
   $parentescos=$_POST['parentescos'];
   $estado_civil=$_POST['estado_civil'];
   $estrato_nna=$_POST['estrato_nna'];
   $etnias_nna=$_POST['etnias_nna'];
   $genero_nna=$_POST['genero_nna'];
   $nivel_educa_nna=$_POST['nivel_educa_nna'];
   $regimen_nna=$_POST['regimen_nna'];
   $eps_nna=$_POST['eps_nna'];
   $municipio_nna=$_POST['municipio_nna'];
   $provincia_nna=$_POST['provincia_nna'];
   $zona_nna=$_POST['zona_nna'];   
   $sisben_nna=$_POST['sisben_nna'];
   $fecha_ingre = $_POST['fecha_ingre']; 
   $id_usuario= $_POST['id_usuario'];
   $num_nino= $_POST['num_nino'];
   

mysqli_query($con,"UPDATE `cuidadores` SET `id_tipo_documento`='$tip_doc_nna',`No_Cedula`='$num_nna',`Nombres`='$nom_nna',`Apellidos`='$ape_nna',`Fecha_Nacimiento`='$fecha_nna',`Edad`='$edad_nna',`Direccion`='$dir_nna',`telefono_movil`='$tel_nna',`correo_electronico`='$email_nna',`id_parentesco`='$parentescos',`id_estado`='$estado_civil',`id_estrato`='$estrato_nna',`id_etnia`='$etnias_nna',`id_genero`='$genero_nna',`id_niveleducativo`='$nivel_educa_nna',`id_regimen`='$regimen_nna',`id_eps`='$eps_nna',`id_municipio`='$municipio_nna',`id_provincia`='$provincia_nna',`id_zona`='$zona_nna',`Puntaje_Sisben`='$sisben_nna',`fecha_cuida`='$fecha_ingre',`id_usuario`='$id_usuario',`id_ninos`='$id_ninos' WHERE id_ninos='$id_ninos'");
	
 mysqli_close($con);
 
	echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "ConsultarMPC1.php"
</script>'; 
	

	

	}
?>
                </form>

     </div>        
</section>











 


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>



<script>
function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
</script>
    </body>
</html>
