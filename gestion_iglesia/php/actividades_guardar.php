<?php
    require_once "../inc/session_start.php";
    require_once "main.php";   

    include "../inc/script.php";
    include "../inc/head.php";

    //Almacenamiento de datos
    $nombre = limpiar_cadena($_POST['actividades_nombre']);
    $detalle = limpiar_cadena($_POST['actividades_detalle']);
    $fecha = limpiar_cadena($_POST['actividades_fecha']);
    $hora_ini = limpiar_cadena($_POST['actividades_hora_ini']);
    $hora_fin = limpiar_cadena($_POST['actividades_hora_fin']);
    $ministerio = limpiar_cadena($_POST['ministerios_id']);
    



    //Verificar campos obligatorios
    if ($nombre == "" || $detalle == "" || $fecha == "" || $hora_ini == ""|| $hora_fin == "" || $ministerio == "") {

        header('Location: ../index.php?vista=actividades&error=campos');
        exit();
    }

    //Verificar integridad de datos
    //Nombre de actividad
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚ ]{3,50}",$nombre)) {

        header('Location: ../index.php?vista=actividades&error=nombre');
        exit();
    }
    //Detalle
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -.,]{5,200}",$detalle)) {

        header('Location: ../index.php?vista=actividades&error=detalle');
        exit();
    }
    //Fecha
    $fecha = $_POST['actividades_fecha'];
    $fecha_min ='2024-04-30';
    $fecha_max ='2024-12-31';
    if ($fecha < $fecha_min || $fecha > $fecha_max) {
        header('Location: ../index.php?vista=actividades&error=fecha');
        exit();
    }

    //Hora
  $hora_ini = $_POST['actividades_hora_ini'];
  $hora_fin = $_POST['actividades_hora_fin'];

  if ($hora_fin <= $hora_ini || $hora_ini >= $hora_fin ) {
    header('Location: ../index.php?vista=actividades&error=hora');
    exit();
  }
    

    //Verificar si ya esta registrada la fecha y hora
    $verificar_fecha_hora = conexion();
    $verificar_fecha_hora = $verificar_fecha_hora->prepare("SELECT * FROM actividades WHERE actividades_fecha = :fecha AND ((:hora_ini >= actividades_hora_ini AND :hora_ini <= actividades_hora_fin) OR (:hora_fin >= actividades_hora_ini AND :hora_fin <= actividades_hora_fin) OR (:hora_ini <= actividades_hora_ini AND :hora_fin >= actividades_hora_fin))");
    $verificar_fecha_hora->bindParam(':fecha', $fecha);
    $verificar_fecha_hora->bindParam(':hora_ini', $hora_ini);
    $verificar_fecha_hora->bindParam(':hora_fin', $hora_fin);
    $verificar_fecha_hora->execute();

    if ($verificar_fecha_hora->rowCount() > 0) {

        header('Location: ../index.php?vista=actividades&error=fecha_hora_existe');
        exit();

    }else {

    //Guardar datos
    $guardar_actividad = conexion();
    $guardar_actividad = $guardar_actividad->prepare("INSERT INTO actividades(actividades_nombre, actividades_detalle, actividades_fecha, actividades_hora_ini, actividades_hora_fin, ministerios_id) VALUES(:nombre, :detalle, :fecha, :hora_ini, :hora_fin, :ministerio)");

    $marcadores = [
        ":nombre" => $nombre,
        ":detalle" => $detalle,
        ":fecha" => $fecha,
        ":hora_ini" => $hora_ini,
        ":hora_fin" => $hora_fin,
        ":ministerio" => $ministerio
    ];

    $guardar_actividad->execute($marcadores);
    
    if ($guardar_actividad->rowCount() == 1) {

        header('Location: ../index.php?vista=actividades&error=guardado_exitoso');
        exit();

        
    } else {
        header('Location: ../index.php?vista=actividades&error=guardado_fallido');
        exit();
    }

    $guardar_actividad = null;
    }
    $verificar_fecha_hora = null; //Cerrar conexion


    



    




