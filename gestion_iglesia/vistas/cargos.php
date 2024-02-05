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
    if ($_GET['error'] == 'descripcion') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Descripción no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'cargo_existe') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Nombre del Cargo ya se encuentra registrado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
<!-- Boton abrir modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Nuevo registro
</button>


<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-end modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Nuevo Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                require_once "./php/main.php";
            ?>
                <!-- FORMULARIO -->
                <form action="./php/cargos_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="ms-3 col-8">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="cargos_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}"  maxlength="40" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="mx-3 col">
                            <label>Descripcion</label>
                            <textarea class="form-control" name="cargos_descripcion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -.,]{5,200}" maxlength="200"  rows="3" required></textarea>
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