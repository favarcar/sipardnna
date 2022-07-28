<body class="fblanco">
<script language="JavaScript">
function Borra(idcliente)
{
var agree=confirm("¿Realmente desea eliminar el cliente seleccionado?");
if (agree) { document.location="eliminar.php?id="+idcliente; }
else return false ;
}
</script>

<form name="form1" method="post" action="RemitirJuezfamilia.php" id="cdr" >
  <center>
    <h3 class="centrar letra n600 azulo pi">Remitir Juez de Familia</h3>
   
  <br>
  <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento </h5> 

        <input name="busca"  type="text" id="busqueda">
        <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
</center>

    
     


<br>
<section class="fblanco">
           <div class="container pu pi">
  <?php 

  
  $codigo_expediente=$_GET['codigo_expediente'];
  $id_ninnos=$_GET['id_ninnos'];
  
  ?>

<?php
  if(isset($_POST['Submit'])){ ?>                                                                      
              <div class="table-responsive"> 
<table class="table table-striped table-bordered">

   <tr>
          
		  <td class="col-md-4 control-label letra n600 azulo" bgcolor="#ff9933">Nombre</td>
          <td class="col-md-4 control-label letra n600 azulo" bgcolor="#ff9933">No. Documento</td>
          <td class="col-md-4 control-label letra n600 azulo" bgcolor="#ff9933">Municipio</td>
		  <td class="col-md-4 control-label letra n600 azulo" bgcolor="#ff9933">Teléfono</td>
          <td class="col-md-4 control-label letra n600 azulo" style="display:none" bgcolor="#ff9933">Email</td>
          <td class="col-md-4 control-label letra n600 azulo" bgcolor="#ff9933">Remitir</td>
          </tr>
				<tbody>
	 <?php
$busca="";
$busca=$_POST['busca'];

if($busca!=""){
$busqueda=mysqli_query($con,"SELECT * FROM usuarios where id_perfil = 9 and apellidos LIKE '%".$busca."%' OR numero_documento LIKE '%".$busca."%'");//cambiar nombre de la tabla de busqueda
while($row=mysqli_fetch_array($busqueda)){
						
                        
          $apellidos=$row['apellidos'];
          $nombres=$row['nombres'];
          $id_tipo_documento=$row['id_tipo_documento'];
		  $numero_documento=$row['numero_documento'];
		  $id_genero=$row['id_genero'];
		  $id_municipio=$row['id_municipio'];
          $telefono=$row['telefono'];
          $usuario=$row['usuario'];
          $clave=$row['clave'];
		  $correo=$row['correo'];
          $id_perfil=$row['id_perfil'];
          $id_entidad=$row['id_entidad'];
		  $estado=$row['estado'];
		  $fecha_registro=$row['fecha_registro'];
		  
    ?>  				
						<tr>
                        
          <td><?php echo $apellidos;?>&nbsp;<?php echo $nombres;?></td>
          <td align="center"><?php echo $numero_documento;?></td>
          <td align="center">
          <?php
		   $busqueda1=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipio'  ");
           while($row1=mysqli_fetch_array($busqueda1))
		   { echo $row1['descripcion'];}
		   ?></td>
          <td align="center"><?php echo $telefono; ?></td>
		  <td align="center" style="display:none"><?php echo $correo; ?></td>  
          <td align="center"><a href="main.php?key=40&id_usuario=<?php echo $row['id_usuario'];?>&id_tipo_documento=<?php echo $row['id_tipo_documento']; ?>&id_genero=<?php echo $row['id_genero']; ?>&id_municipio=<?php echo $row['id_municipio']; ?> &id_perfil=<?php echo $row['id_perfil']; ?>&codigo_expediente=<?php echo $codigo_expediente ?>&id_ninnos=<?php echo $id_ninnos ?>" class=" btn btn-primary">
              <span class="glyphicon glyphicon-share"></span> Remitir</a></h5></td>
          <?php } }?>
         </tr>



</table>

 <?php 
 }
 else { ?>
	<section class="fblanco">
           <div class="container pu pi">
                                                                        
              <div class="table-responsive"> 
<table class="table table-striped table-bordered">

   <tr>
          <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
          <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
          <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
		  <td class="col-md-4 control-label letra n600 azulo">Teléfono</td>
          <td class="col-md-4 control-label letra n600 azulo" style="display:none">Email</td>
          <td class="col-md-4 control-label letra n600 azulo">Remitir </td>
          </tr>
				<tbody>
	 <?php

$busqueda=mysqli_query($con,"SELECT * FROM usuarios where id_perfil = 9  order by apellidos ");//cambiar nombre de la tabla de busqueda
while($row=mysqli_fetch_array($busqueda)){
						
          $id_usuario=$row['id_usuario'];             
          $apellidos=$row['apellidos'];
          $nombres=$row['nombres'];
          $id_tipo_documento=$row['id_tipo_documento'];
		  $numero_documento=$row['numero_documento'];
		  $id_genero=$row['id_genero'];
		  $id_municipio=$row['id_municipio'];
          $telefono=$row['telefono'];
          $usuario=$row['usuario'];
          $clave=$row['clave'];
		  $correo=$row['correo'];
          $id_perfil=$row['id_perfil'];
          $id_entidad=$row['id_entidad'];
		  $estado=$row['estado'];
		  $fecha_registro=$row['fecha_registro'];
		  
    ?>  				
						<tr>
            
          <td><?php echo $apellidos;?>&nbsp;<?php echo $nombres;?></td>
          <td align="center"><?php echo $numero_documento;?></td>
          <td align="center">
          <?php
		   $busqueda1=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipio'  ");
           while($row1=mysqli_fetch_array($busqueda1))
		   { echo $row1['descripcion'];}
		   ?></td>
          <td align="center"><?php echo $telefono; ?></td>
		  <td align="center" style="display:none"><?php echo $correo; ?></td>  
          <td align="center"><a href="main.php?key=40&id_usuario=<?php echo $row['id_usuario'];?>&id_tipo_documento=<?php echo $row['id_tipo_documento']; ?>&id_genero=<?php echo $row['id_genero']; ?>&id_municipio=<?php echo $row['id_municipio']; ?> &id_perfil=<?php echo $row['id_perfil']; ?>&codigo_expediente=<?php echo $codigo_expediente ?>&id_ninnos=<?php echo $id_ninnos ?>" class=" btn btn-primary">
              <span class="glyphicon glyphicon-share"></span> Remitir</a></h5></td>
          <?php } }?>
         </tr>
         </table>
         </form>
    <div class="clearfix"></div>
    </section>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="css/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="css/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="css/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="css/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="css/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


    <!-- PNotify -->
    <script src="css/pnotify/dist/pnotify.js"></script>
    <script src="css/pnotify/dist/pnotify.buttons.js"></script>
    <script src="css/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ui-pnotify').remove();
        });
    </script>

    <script src="js/jsAddExpediente.js"></script>

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
    </script>
</body>

</html>
    </div>
    </div>
    </section>
</body>

</html>	
	
