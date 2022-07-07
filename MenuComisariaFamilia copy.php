<section class="fblanco" style="background-image: url(img/SIPARDNNA.png);
	background-position: center;
	background-repeat: no-repeat;
	background-attachment:fixed;" >
           <div class="container">


                             <div class="row clearfix ps2x pi">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <h1 class="centrar letra n600 azulo pi">Menú Principal</h1>
                                </div>
                             </div>
                             
                             <h3 class="centrar letra n600 azulo pi">Notificaciones</h3> 
          <h4 class="centrar letra n600 azulo pi">Expediente</h4>                                                               
        <div class="table-responsive"> 
        <table border="1" style="background:#FFFFFF" align="center" width="95%" class="table">
            
            
            <tr>
                <td class="centrar letra n600 azulo pi" >No.</td>
                <td class="centrar letra n600 azulo pi" >Fecha </td>
                <td class="centrar letra n600 azulo pi">Descripci&oacute;n Expediente</td>
                <td class="centrar letra n600 azulo pi">Estado del Caso</td>
                <td class="centrar letra n600 azulo pi">Fecha Limite</td>
                <td class="centrar letra n600 azulo pi">D&iacute;as Restantes para Resolver el caso </td>
                <td class="centrar letra n600 azulo pi">Ver Expediente</td>
            </tr>
        <?php
	include("conexion/conexion.php");
        $sql="select * from expediente where id_usuario_exp='$id_usuario' ORDER BY codigo_expediente ASC";
        $resultado=$mysqli->query($sql); 
        while($datos=$resultado->fetch_assoc()){			
            $codigo_expediente=$datos['codigo_expediente'];
            $Fecha_inicio_expediente=$datos['Fecha_inicio_expediente'];
            $id_ninnos=$datos['id_ninnos'];
            $id_cuidadores=$datos['id_cuidadores'];
            $id_discapacidad=$datos['id_discapacidad'];
            $id_indicador=$datos['id_indicador'];
            $id_maltrato=$datos['id_maltrato'];
            $id_victima=$datos['id_victima'];
            $Descripcion_expediente=$datos['Descripcion_expediente'];
            $id_derecho=$datos['id_derecho'];
            $Observacion=$datos['Observacion'];
            $Veredicto_Caso=$datos['Veredicto_Caso'];
            $Fecha_finalizacion_expediente=$datos['Fecha_finalizacion_expediente'];
            $id_entidad=$datos['id_entidad'];
            $id_usuario_exp=$datos['id_usuario_exp'];
            $id_estadocaso=$datos['id_estadocaso'];
            $fecha_limite=$datos['fecha_limite'];
            
            if($fecha == $fecha_limite || $id_estadocaso == 2 ){
            } else{                    
                ?>
            <tr>
                <td align="center" ><?php  echo $codigo_expediente ?></td>
                <td><?php echo $Fecha_inicio_expediente ?></td>
                <td align="center"><?php echo'<div class="wrap2">'.$Descripcion_expediente.'</div>'?></td>              
                <td align="center"><?php $busqueda1=mysqli_query($con,"SELECT * FROM estado_caso where id_estadocaso='$id_estadocaso' ");
                    while($row1=mysqli_fetch_array($busqueda1)){
                        $id_estadocaso=$row1['id_estadocaso'];		
                        echo $descripcion=$row1['descripcion_estado_caso'];     
                    } ?></td>
                <td align="center"><?php echo $fecha_limite; ?></td>

                <td align="center">
                 <?php
                    $datetime1 = new DateTime($fecha_limite);
                    $datetime2 = new DateTime($fecha);
                    $interval = $datetime2->diff($datetime1);
                    $dias = $interval->format('%a');
                if($dias>=135){
                  echo'<span style="color: green;">'.$interval->format('%a días').'</span>';
                }else if($dias>=90&&$dias<135){
                  echo'<span style="color: yellow;">'.$interval->format('%a días').'</span>';
                }else if($dias>=45&&$dias<90){
                  echo'<span style="color: orange;">'.$interval->format('%a días').'</span>';
                }else{
                  echo '<span style="color: red;">'.$interval->format('%a días').'</span>';
                } ?></td>
                <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="Expediente/ModificarExpedienteNoti.php?codigo_expediente=<?php echo $datos['codigo_expediente'];?>&id_ninnos=<?php echo $datos['id_ninnos'];?>" class="linku">Ver</a></h5></td>
            </tr>  
                <?php } } ?>

        </table>
        </div>


                            <div class="row clearfix ps pi">
                              <div class="col-md-3 col-sm-3 ps pi">
                                  <a href="MenuNinosNinasAdo.php"><img src="iconos/ninos.png" alt="..." width="150" height="150" class="center-block"></a>
                                <h4 class="centrar letra azulo n400 ps"><strong><b>Registrar Ni&ntilde;os, Ni&ntilde;as o Adolescentes</b></strong></h4>
                              </div>
                                
                               <div class="col-md-3 col-sm-3 ps pi">
                                    <a href="MenuMPC.php"><img src="iconos/padres.png" alt="..." width="150" height="150" class="center-block"></a>
                                    <h4 class="centrar letra azulo n400 ps"><strong>Madres, Padres o Cuidadores</strong></h4>
                              </div>


                               

                                <div class="col-md-3 col-sm-3 ps pi">
                                    <a href="MenuExpediente.php"><img src="iconos/expe.png" alt="..." width="150" height="150" class="center-block"></a>
                                    <h4 class="centrar letra azulo n400 ps"><strong>Expedientes </strong></h4>
                                </div>
                               <!-- <div class="col-md-3 col-sm-3 ps pi">
                                    <a href="MenuDerecho.php"><img src="iconos/derecho.png" alt="..." width="150" height="150" class="center-block"></a>
                                  <h4 class="centrar letra azulo n400 ps"><strong>Derechos</strong></h4>
                                </div> -->
                                
                                 <div class="col-md-3 col-sm-3 ps pi">
                                    <a href="MenuMiUsuario.php"><img src="iconos/usuario.png" alt="..." width="150" height="150" class="center-block"></a>
                                    <h4 class="centrar letra azulo n400 ps"><strong>Mi Usuario</strong></h4>
                                </div>
                              
                                
                                
                               
             </div>  



                             <div class="row clearfix ps pi"></div>  



                             <div class="row clearfix ps pi2x"></div>                        
          </div>        
    </section>



    <footer class="f4 borde_top">
                        <div class="container">
                           <div class="row clearfix pi1x ps"> 
                            <div >        
                                <img class="img-responsive  center-block  borde_blanco " src="img/logo_integracion_social.png" width="45%" alt=""/>
                                            <FONT COLOR="Ivory"><h4 align="center">Versión 3.0 - 2022</H4></FONT>
                      </div>
                      
                       <div  align="center">             
              <b>GOBERNACI&Oacute;N DE BOYAC&Aacute; <br> SECRETAR&Iacute;A DE INTEGRACI&Oacute;N SOCIAL <br> Sistema de Informaci&oacute;n a&ntilde;o 2021, Versi&oacute;n 2.0</b>    
                     </div>     
                </div>
           </div>
      </footer>      
   
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
        
    </body>
</html>