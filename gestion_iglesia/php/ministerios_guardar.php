<?php
    require_once "../inc/session_start.php";
    require_once "main.php";   

    include "../inc/script.php";
    include "../inc/head.php";

    //Almacenamiento de datos
    $nombre = limpiar_cadena($_POST['ministerios_nombre']);
    $funcion = limpiar_cadena($_POST['ministerios_funcion']);
    $dni = limpiar_cadena($_POST['personal_dni']);


    //Verificar campos obligatorios
    if ($nombre == "" || $funcion == "" || $dni == "") {

        header('Location: ../index.php?vista=ministerios&error=campos');
        exit();
    }

    //Verificar integridad de datos
    //Nombre
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚ ]{5,70}",$nombre)) {

        header('Location: ../index.php?vista=ministerios&error=nombre');
        exit();
    }
    //Descripcion
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{5,200}",$funcion)) {

        header('Location: ../index.php?vista=ministerios&error=funcion');
        exit();
    }
    //Cedula
    if (verificar_datos("[0-9]{7,25}",$dni)) {

        header('Location: ../index.php?vista=ministerios&error=dni');
        exit();
    }

    //Verificar si ya esta registrada la cedula

    $verificar_dni = conexion();
    $verificar_dni = $verificar_dni->prepare("SELECT * FROM personal WHERE personal_dni = :dni");
    $verificar_dni->bindParam(":dni",$dni);
    $verificar_dni->execute();

    if ($verificar_dni->rowCount() > 0) {

        //Guardar datos
        $guardar_ministerio = conexion();
        $guardar_ministerio = $guardar_ministerio->prepare("INSERT INTO ministerios(ministerios_nombre, ministerios_funcion, personal_dni) VALUES(:nombre, :funcion, :personal)");

        $marcadores = [
            ":nombre" => $nombre,
            ":funcion" => $funcion,
            ":personal" => $dni

        ];

        $guardar_ministerio->execute($marcadores);

        if ($guardar_ministerio->rowCount() == 1) {

            header('Location: ../index.php?vista=ministerios&error=guardado_exitoso');
            exit();
            
        }else {

            header('Location: ../index.php?vista=ministerios&error=guardado_fallido');
            exit();
        }

        $guardar_ministerio = null;

                
    }else {
        header('Location: ../index.php?vista=ministerios&error=dni_no_existe');
        exit();
    }
    $verificar_dni = null;

    