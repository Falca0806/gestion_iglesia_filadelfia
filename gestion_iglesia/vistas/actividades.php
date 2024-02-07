<!-- MENSAJES DE ALERTAS -->
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'campos') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> No has llenado todos los campos<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'nombre') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Nombre no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'detalle') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Detalle no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'fecha') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Fecha no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'hora') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Hora no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'fecha_hora_existe') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Fecha y Hora ya se encuentran registradas<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'guardado_exitoso') {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registro exitoso!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'guardado_fallido') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Registro no se pudo realizar, intente de nuevo<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}

?>
<?php

    require_once "./php/main.php";

    // Boton abrir modal
    require_once "./inc/boton_modal.php";
?>


<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-end modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Nueva Actividad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                require_once "./php/main.php";
            ?>
                <!-- FORMULARIO -->
                <form action="./php/actividades_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="actividades_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,50}"  maxlength="50" required>
                        </div>
                        <div class="ms-3 col-3">
                            <label>Ministerio</label>
                            <select class="form-select" name="ministerios_id" required>
                                <option value="" selected="" >Seleccione</option>
                                <?php
                                    $ministerios = conexion();
                                    $ministerios = $ministerios->query("SELECT * FROM ministerios");
                                    if ($ministerios->rowCount() > 0) {
                                        $ministerios = $ministerios->fetchAll();
                                        foreach ($ministerios as $row ) {
                                            echo '<option value="'. $row['ministerios_id'] .'" >'. $row['ministerios_nombre'] .'</option>';
                                        }
                                    }
                                    $ministerios = null;
                                ?>
                            </select>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Detalle</label>
                            <textarea class="form-control" name="actividades_detalle" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -.,]{5,200}" maxlength="200"  rows="2" style="width: 300px;" required></textarea>                          
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                    <div class="ms-3 col-3">
                            <label>Fecha de Actividad</label>
                            <input type="date" class="form-control" name="actividades_fecha"
                            min="2024-04-30" max="2024-12-31" required> 
                        </div>
                        <div class="mx-3 col-3">
                            <label>Hora Inicio</label>
                            <input type="text" class="form-control" name="actividades_hora_ini" id="actividades_hora_ini" required>
                            <!-- <input type="time" class="form-control" name="actividades_hora_ini" id="actividades_hora_ini" max="20:00:00" min="08:00:00" required> -->
                        </div>
                        <div class="mx-3 col-3">
                            <label>Hora Final</label>
                            <input type="time" class="form-control" name="actividades_hora_fin" id="actividades_hora_fin" max="20:00:00" min="08:00:00" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>