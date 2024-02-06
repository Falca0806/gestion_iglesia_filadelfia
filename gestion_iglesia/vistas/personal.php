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
<?php
    require_once "./php/main.php";
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

                <!-- FORMULARIO -->
                <form action="./php/personal_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="personal_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}"  maxlength="40" required>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="personal_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}" maxlength="40" required >
                        </div>
                        <div class="mx-3 col-3">
                            <label>Cedula</label>
                            <input type="text" class="form-control" name="personal_dni" pattern="[0-9]{7,25}" maxlength="25" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Telefono</label>
                            <input type="text" class="form-control" name="personal_telefono" pattern="[0-9]{11}" maxlength="11" required>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="personal_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ -#.,]{5,200}" maxlength="200" required>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Correo Electronico</label>
                            <input type="email" class="form-control" name="personal_correo" maxlength="100" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="ms-3 col-3">
                            <label>Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="personal_fecha_nac"
                            min="1923-01-31" max="2009-01-31" required>
                        </div>

                        <div class="mx-3 col-3">
                            <label>Genero</label>
                            <select class="form-select" name="personal_genero" required>
                                <option value="" selected="" >Seleccione</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="mx-3 col-3">
                            <label>Estado Civil</label>
                            <select class="form-select"  name="personal_estado_civil" required>
                                <option value="" selected="" >Seleccione</option>
                                <option value="Casado">Casado(a)</option>
                                <option value="Soltero">Soltero(a)</option>
                                <option value="Divorciado">Divorciado(a)</option>
                                <option value="Viudo">Viudo(a)</option>
                            </select>
                        </div>
                        <div class="mx-3 mt-3 col-3">
                            <label>Cargo</label>
                            <select class="form-select" name="cargos_id" required>
                                <option value="" selected="" >Seleccione</option>
                                <?php
                                    $cargos = conexion();
                                    $cargos = $cargos->query("SELECT * FROM cargos");
                                    if ($cargos->rowCount() > 0) {
                                        $cargos = $cargos->fetchAll();
                                        foreach ($cargos as $row ) {
                                            echo '<option value="'. $row['cargos_id'] .'" >'. $row['cargos_nombre'] .'</option>';
                                        }
                                    }
                                    $cargos = null;
                                ?>
                            </select>
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
<br>
<br>
<br>

<div class="container pb-6 pt-6">

<?php


        //Eliminar persona
        if (isset($_GET['personal_id_del'])) {
            require_once "./php/personal_eliminar.php";
        }

        if (!isset($_GET['page'])) {
            $pagina = 1;
        } else {
            $pagina = (int) $_GET['page'];
            if ($pagina <=1) {
                $pagina = 1;
                
            }
        }

        $pagina = limpiar_cadena($pagina);
        $url = "index.php?vista=personal&page=";
        $registros = 3;
        $busqueda = "";
        
        require_once "./php/personal_lista.php";
    ?>

    
</div>