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
    if ($_GET['error'] == 'apellido') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Apellido no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    if ($_GET['error'] == 'telefono') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Teléfono no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'direccion') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Dirección no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'correo_existe') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Correo Electrónico ingresado ya esta registrado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'correo') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Correo Electrónico no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'fecha') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Fecha de Nacimiento no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'dni_existe') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Cédula de Identidad ya se encuentra registrada<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    <div class="modal-dialog modal-dialog-end modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Nuevo Personal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                require_once "./php/main.php";
            ?>
                <!-- FORMULARIO -->
                <form action="./php/personal_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="personal_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}"  maxlength="40" required>
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
                            <textarea class="form-control" name="cargos_descripcion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -.,]{5,200}" maxlength="200"  rows="2" style="width: 300px;" required></textarea>                          
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                    <div class="ms-3 col-3">
                            <label>Fecha de Actividad</label>
                            <input type="date" class="form-control" name="personal_fecha_nac"
                            min="1923-01-31" max="2009-01-31" required>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Hora Inicio</label>
                            <input type="time" class="form-control" name="personal_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -#.,]{5,200}" maxlength="200" required>
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