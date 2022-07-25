<?php
$id_usuario = $_SESSION['numero_documento'];

$consulta= "SELECT * FROM usuarios where numero_documento='$id_usuario' "; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error($con));
$fila=mysqli_fetch_array($resultado);
$nombres = $fila['nombres'];
$apellido = $fila['apellidos'];
$id_municipio = $fila['id_municipio'];

date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha=  date("Y-m-d", $time);
?>
              <section class="fblanco" >  
                <div class="row clearfix ps2x pi">  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                        <h3 class="centrar letra n600 azulo pi">Notificaciones</h3>   
                             
    <h4 class="centrar letra n600 azulo pi"></h4>                                                               
    <div class="table-responsive"> 
    <table class="table table-striped table-bordered">
    <fieldset>
            
            
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
            $fecha_limite=$datos['Fecha_finalizacion_expediente'];
            
            if($id_estadocaso == 2 ){
            } else{                    
                ?>
            <tr>
                <td align="center" ><?php  echo $codigo_expediente ?></td>
                <td><?php echo fecha($Fecha_inicio_expediente) ?></td>
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
                }else if($fecha > $fecha_limite ){
                    echo'<span style="color: Salmon";>'.$interval->format('%a días').' vencido</span> ';
                }else if($dias>=90&&$dias<135){
                  echo'<span style="color: yellow;">'.$interval->format('%a días').'</span>';
                }else if($dias>=45&&$dias<90){
                  echo'<span style="color: orange;">'.$interval->format('%a días').'</span>';
                
                }else{
                    echo '<span style="color: red;">'.$interval->format('%a días').'</span>';
                    
                } ?></td>
                <td align="center"><a href="main.php?key=19&codigo_expediente=<?php echo $datos['codigo_expediente'];?>&id_ninnos=<?php echo $datos['id_ninnos'];?>" class="linku">Ver</a></td>
            </tr>  
                <?php } } ?>

        </table>
        </div>                                                     
        </fieldset>
    <div class="clearfix"></div>
            </section>
            


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

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
    </script>




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