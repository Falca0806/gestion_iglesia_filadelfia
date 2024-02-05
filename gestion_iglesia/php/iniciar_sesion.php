<?php


    //Almacenamiento de datos
    $usuario = limpiar_cadena($_POST['login_usuario']);
    $clave = limpiar_cadena($_POST['login_clave']);

    //Verificar campos obligatorios
    if ($usuario == "" || $clave == "" ) {

        header('Location: ../index.php?vista=login&error=campos');
        exit();
    }

    //Verificar integridad de datos
    //Usuario
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{3,25}",$usuario)) {

        header('Location: ../index.php?vista=login&error=usuario');
        exit();
    }
    //Clave
    if (verificar_datos("[a-zA-Z0-9$@.-]{8,16}",$clave)) {

        header('Location: ../index.php?vista=login&error=clave');
        exit();
    }

    //Verificar usuario
    $verificar_usuario = conexion();
    $verificar_usuario = $verificar_usuario->query("SELECT * FROM usuarios WHERE usuarios_nombre ='$usuario'");
    if ($verificar_usuario->rowCount() == 1) {
        $verificar_usuario=$verificar_usuario->fetch();

        //Comparar usuario y clave ingresada con la base de datos
        if ($verificar_usuario['usuarios_nombre'] == $usuario && password_verify($clave,$verificar_usuario['usuarios_clave'])) {
            $_SESSION['id']=$verificar_usuario['usuarios_id'];
            $_SESSION['nombre']=$verificar_usuario['usuarios_nombre'];
            $_SESSION['dni']=$verificar_usuario['personal_id'];
            $_SESSION['rol']=$verificar_usuario['roles_id'];
            
            if (headers_sent()) {
                echo "<script> window.location.href='index.php?vista=home'; </script>";
            }else {
                header("Location: index.php?vista=home");
            }
        }else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> Usuario y/o Contraseña incorrectos<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
        }


    }else {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ocurrió un error inesperado!</strong> Usuario y/o Contraseña incorrectos<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
    }
    $verificar_usuario = null; //Cerrar conexion