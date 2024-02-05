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
    if ($_GET['error'] == 'dni') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Cédula no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'dni_no_existe') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Cédula ingresada no se encuentra registrada<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    if ($_GET['error'] == 'rol') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Apellido no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'password') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> La Contraseña no coincide con el formato solicitado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'usuario_existe') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> El Usuario ingresado ya esta registrado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'clave_diferente') {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ocurrió un error inesperado!</strong> Las Contraseñas que ha ingresado no coinciden!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'guardado_exitoso') {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Usuario Registrado!</strong> El Usuario se registro con exito<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="cerrarAlerta()"></button>
            </div>
        ';
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'guardado_fallido') {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrio un error inesperado!</strong> No se puede registrar el usuario, por favor intente nuevamente<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" a></button>
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
                <h1 class="modal-title fs-5">Nuevo Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                require_once "./php/main.php";
            ?>
                <!-- FORMULARIO -->
                <form action="./php/usuarios_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Cédula</label>
                            <input type="text" class="form-control" name="personal_dni" pattern="[0-9]{7,25}" maxlength="25" required>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Nombre de Usuario</label>
                            <input type="text" class="form-control" name="usuarios_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{3,25}" maxlength="25" required >
                        </div>
                        <div class="mx-3 col-3">
                            <label>Rol</label>
                            <select class="form-select" name="roles_id" required>
                                <option value="" selected="" >Seleccione</option>
                                <?php
                                    $roles = conexion();
                                    $roles = $roles->query("SELECT * FROM roles");
                                    if ($roles->rowCount() > 0) {
                                        $roles = $roles->fetchAll();
                                        foreach ($roles as $row ) {
                                            echo '<option value="'. $row['roles_id'] .'" >'. $row['roles_nombre'] .'</option>';
                                        }
                                    }
                                    $roles = null;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="mx-3 col-3">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="usuarios_clave1" pattern="[a-zA-Z0-9$@.-]{8,16}" maxlength="100" required>
                            </div>
                            <div class="mx-3 col-3">
                                <label>Repetir Contraseña</label>
                                <input type="password" class="form-control" name="usuarios_clave2" pattern="[a-zA-Z0-9$@.-]{8,16}" maxlength="100" required>
                            </div>
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