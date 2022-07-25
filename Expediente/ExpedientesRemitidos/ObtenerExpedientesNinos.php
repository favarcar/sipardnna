<?php

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    echo '<script language = javascript>
            alert("usuario no autenticado")
            self.location = "index.html"
            </script>';
}

$id_usuario = $_SESSION['numero_documento'];
$consulta = "SELECT apellidos, nombres, id_municipio FROM usuarios WHERE numero_documento ='$id_usuario' ";
$resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
$fila = mysqli_fetch_array($resultado);
$nombres = $fila['nombres'];
$apellido = $fila['apellidos'];
$id_municipio = $fila['id_municipio'];
date_default_timezone_set('UTC');


?>

<!doctype html>
<html class="no-js" lang="">

<head style="background-color: #64AF59;">

    <style>

    </style>
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>
    <script src="../../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../engine1/style.css" />
    <script type="text/javascript" src="../../engine1/jquery.js"></script>
    <script>
        function autofitIframea(id) {
            if (!window.opera && document.all && document.getElementById) {
                id.style.height = id.contentWindow.document.body.scrollHeight;
            } else if (document.getElementById) {
                id.style.height = id.contentDocument.body.scrollHeight + "px";
            }
        }
    </script>
</head>

<body>
   

    <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="letra n500"><a href="main.php?key=15">Volver Men&uacute; Principal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <iframe name="usuario" src="main.php?key=29&id_ninnos=<?php echo $_REQUEST['id_ninnos'] ?>" width="100%" height="0" frameborder="0" transparency="transparency" onload="autofitIframea(this);" scrolling="no"></iframe>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../../js/vendor/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>


</body>

</html>