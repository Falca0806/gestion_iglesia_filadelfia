<?php
    require_once "../inc/session_start.php";
    require_once "main.php";   

    include "../inc/script.php";
    include "../inc/head.php";

    //Almacenamiento de datos
    $dni = limpiar_cadena($_POST['personal_dni']);
    $nombre = limpiar_cadena($_POST['usuarios_nombre']);
    $rol = limpiar_cadena($_POST['roles_id']);
    $password1 = limpiar_cadena($_POST['usuarios_clave1']);
    $password2 = limpiar_cadena($_POST['usuarios_clave2']);


    //Verificar campos obligatorios
    if ($dni == "" || $nombre == "" || $rol == "" || $password1 == "" || $password2 == "" ) {

        header('Location: ../index.php?vista=usuarios&error=campos');
        exit();
    }

    //Verificar integridad de datos
    //Cedula
    if (verificar_datos("[0-9]{7,25}",$dni)) {

        header('Location: ../index.php?vista=usuarios&error=dni');
        exit();
    }
    //Nombre
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{3,25}",$nombre)) {

        header('Location: ../index.php?vista=usuarios&error=nombre');
        exit();
    }
    //Contraseña
    if (verificar_datos("[a-zA-Z0-9$@.-]{8,16}",$password1) || verificar_datos("[a-zA-Z0-9$@.-]{8,16}",$password2)) {

        header('Location: ../index.php?vista=usuarios&error=password');
        exit();
    }

    //Verificar usuario
    $verificar_usuario = conexion();
    $verificar_usuario = $verificar_usuario->query("SELECT usuarios_nombre FROM usuarios WHERE usuarios_nombre ='$nombre'");
    if ($verificar_usuario->rowCount() > 0) {

        header('Location: ../index.php?vista=usuarios&error=usuario_existe');
        exit();

    }
    $verificar_usuario = null; //Cerrar conexion

    //Verificar contrasena
    if ($password1 != $password2) {

        header('Location: ../index.php?vista=usuarios&error=clave_diferente');
        exit();
    } else {
        $clave = password_hash($password1, PASSWORD_BCRYPT, ["cost"=>10]); //Encrictar
    }

    //Verificar si ya esta registrada la cedula
    

    $verificar_dni = conexion();
    $verificar_dni = $verificar_dni->prepare("SELECT * FROM personal WHERE personal_dni = :dni");
    $verificar_dni->bindParam(":dni",$dni);
    $verificar_dni->execute();

    if ($verificar_dni->rowCount() > 0) {

        //Guardar datos
        $guardar_usuario = conexion();
        $guardar_usuario = $guardar_usuario->prepare("INSERT INTO usuarios(usuarios_nombre, usuarios_clave, roles_id, personal_dni) VALUES(:nombre, :clave, :rol, :personal)");

        $marcadores = [
            ":nombre" => $nombre,
            ":clave" => $clave,
            ":rol" => $rol,
            ":personal" => $dni

        ];

        $guardar_usuario->execute($marcadores);

        if ($guardar_usuario->rowCount() == 1) {

            header('Location: ../index.php?vista=usuarios&error=guardado_exitoso');
            exit();
            
        }else {

            header('Location: ../index.php?vista=usuarios&error=guardado_fallido');
            exit();
        }

        $guardar_usuario = null;

                
    }else {
        header('Location: ../index.php?vista=usuarios&error=dni_no_existe');
        exit();
    }
    $verificar_dni = null;

    