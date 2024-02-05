<?php
    require_once "../inc/session_start.php";
    require_once "main.php";   

    include "../inc/script.php";
    include "../inc/head.php";

    //Almacenamiento de datos
    $nombre = limpiar_cadena($_POST['cargos_nombre']);
    $descripcion = limpiar_cadena($_POST['cargos_descripcion']);
    
    //Verificar campos obligatorios
    if ($nombre == "" || $descripcion == "" ) {

        header('Location: ../index.php?vista=cargos&error=campos');
        exit();
    }

    //Verificar integridad de datos
    //Nombre
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}",$nombre)) {

        header('Location: ../index.php?vista=cargos&error=nombre');
        exit();
    }
    //Descripcion
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -.,]{5,200}",$descripcion)) {

        header('Location: ../index.php?vista=cargos&error=descripcion');
        exit();
    }

    //Verificar si ya esta registrado el cargo
    $verificar_cargo = conexion();
    $verificar_cargo = $verificar_cargo->query("SELECT cargos_nombre FROM cargos WHERE cargos_nombre ='$nombre'");
    if ($verificar_cargo->rowCount() > 0) {

        header('Location: ../index.php?vista=cargos&error=cargo_existe');
        exit();

    }
    $verificar_cargo = null; //Cerrar conexion


    //Guardar datos
    $guardar_cargo = conexion();
    $guardar_cargo = $guardar_cargo->prepare("INSERT INTO cargos(cargos_nombre, cargos_descripcion) VALUES(:nombre, :descripcion)");

    $marcadores = [
        ":nombre" => $nombre,
        ":descripcion" => $descripcion
    ];

    $guardar_cargo->execute($marcadores);
    
    if ($guardar_cargo->rowCount() == 1) {

        header('Location: ../index.php?vista=cargos&error=guardado_exitoso');
        exit();

        
    } else {
        header('Location: ../index.php?vista=cargos&error=guardado_fallido');
        exit();
    }

    $guardar_cargo = null;



    




