<?php
    require_once "../inc/session_start.php";
    require_once "main.php";   

    include "../inc/script.php";
    include "../inc/head.php";

    //Almacenamiento de datos
    $nombre = limpiar_cadena($_POST['personal_nombre']);
    $apellido = limpiar_cadena($_POST['personal_apellido']);
    $dni = limpiar_cadena($_POST['personal_dni']);
    $telefono = limpiar_cadena($_POST['personal_telefono']);
    $direccion = limpiar_cadena($_POST['personal_direccion']);
    $correo = limpiar_cadena($_POST['personal_correo']);
    $fecha_nac = limpiar_cadena($_POST['personal_fecha_nac']);
    $genero = $_POST['personal_genero'];
    $estado_civil = $_POST['personal_estado_civil'];
    $cargo = $_POST['cargos_id'];
    



    //Verificar campos obligatorios
    if ($nombre == "" || $apellido == "" || $dni == "" || $telefono == "" || $direccion == "" || $correo == "" || $fecha_nac == "" || $genero == "" || $estado_civil == "") {

        header('Location: ../index.php?vista=personal&error=campos');
        exit();
    }

    //Verificar integridad de datos
    //Nombre
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}",$nombre)) {

        header('Location: ../index.php?vista=personal&error=nombre');
        exit();
    }
    //Apellido
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}",$apellido)) {

        header('Location: ../index.php?vista=personal&error=apellido');
        exit();
    }
    //Cedula
    if (verificar_datos("[0-9]{7,25}",$dni)) {

        header('Location: ../index.php?vista=personal&error=dni');
        exit();
    }
    //Telefono
    if (verificar_datos("[0-9]{11}",$telefono)) {

        header('Location: ../index.php?vista=personal&error=telefono');
        exit();
    }
    //Direccion
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -#.,]{5,200}",$direccion)) {

        header('Location: ../index.php?vista=personal&error=direccion');
        exit();
    }

    // Correo
        if ($correo != "") {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $verificar_correo = conexion();
                $verificar_correo = $verificar_correo->query("SELECT personal_correo FROM personal WHERE personal_correo ='$correo'");
                if ($verificar_correo->rowCount() > 0) {

                    header('Location: ../index.php?vista=personal&error=correo_existe');
                    exit();
    
                }
                $verificar_correo = null; //Cerrar conexion
            }else {

                    header('Location: ../index.php?vista=personal&error=correo');
                    exit();
            }
        }

    // Fecha nacimiento
    $fecha_nac = $_POST['personal_fecha_nac'];
    $fecha_limite = date("2009-01-31");
    $fecha_final = strtotime($fecha_nac);

        if ($fecha_final > strtotime($fecha_limite)) {

            header('Location: ../index.php?vista=personal&error=fecha');
            exit();
        }

    //Verificar si ya esta registrada la cedula
    $verificar_dni = conexion();
    $verificar_dni = $verificar_dni->query("SELECT personal_dni FROM personal WHERE personal_dni ='$dni'");
    if ($verificar_dni->rowCount() > 0) {

        header('Location: ../index.php?vista=personal&error=dni_existe');
        exit();

    }
    $verificar_dni = null; //Cerrar conexion


    //Guardar datos
    $guardar_personal = conexion();
    $guardar_personal = $guardar_personal->prepare("INSERT INTO personal(personal_nombre, personal_apellido, personal_dni, personal_telefono, personal_direccion, personal_correo, personal_fecha_nac, personal_genero,personal_estado_civil, cargos_id) VALUES(:nombre, :apellido, :dni, :telefono, :direccion, :correo, :fecha_nac, :genero, :estado_civil, :cargo)");

    $marcadores = [
        ":nombre" => $nombre,
        ":apellido" => $apellido,
        ":dni" => $dni,
        ":telefono" => $telefono,
        ":direccion" => $direccion,
        ":correo" => $correo,
        ":fecha_nac" => $fecha_nac,
        ":genero" => $genero,
        ":estado_civil" => $estado_civil,
        ":cargo" => $cargo
    ];

    $guardar_personal->execute($marcadores);
    
    if ($guardar_personal->rowCount() == 1) {

        header('Location: ../index.php?vista=personal&error=guardado_exitoso');
        exit();

        
    } else {
        header('Location: ../index.php?vista=personal&error=guardado_fallido');
        exit();
    }

    $guardar_personal = null;



    




