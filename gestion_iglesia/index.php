<?php require "./inc/session_start.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./inc/head.php";?>
</head>
<body>
    <?php
    // Cargar ventana de login
        if(!isset($_GET['vista']) || $_GET['vista']==""){
            $_GET['vista'] ="login";
        }
        if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){
?>
<div class="contenedor-principal">
<div class="contenedor-izquierda">
    <?php

        include "./inc/navbar.php";
        include "./inc/script.php";
    ?>
</div>
<div class="contenedor-derecha">
<?php
        include "./vistas/".$_GET['vista'].".php";
        }else{
            if($_GET['vista']=="login"){
                include "./vistas/login.php";
            }else{
                include "./vistas/404.php";
            }
        }
 
?>
</div>
</div>



            



    
</body>
</html>