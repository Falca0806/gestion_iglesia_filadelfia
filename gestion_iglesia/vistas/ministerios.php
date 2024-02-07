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
    if ($_GET['error'] == 'funcion') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Función no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'dni') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Cédula no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'dni_no_existe_permitido') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Cédula de Identidad no se encuentra registrada o no tiene el cargo admitido<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                <h1 class="modal-title fs-5">Nuevo Ministerio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                require_once "./php/main.php";
            ?>
                <!-- FORMULARIO -->
                <form action="./php/ministerios_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="ministerios_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,70}"  maxlength="70" required>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Función</label>
                            <input type="text" class="form-control" name="ministerios_funcion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{5,200}" maxlength="200" required >
                        </div>
                        <div class="mx-3 col-3">
                            <label>Cédula Responsable</label>
                            <input type="text" class="form-control" name="personal_dni" pattern="[0-9]{7,25}" maxlength="25" required>
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