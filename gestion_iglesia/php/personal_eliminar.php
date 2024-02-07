<?php
    $personal_borrar = limpiar_cadena($_GET['personal_borrar']);

    //Verificar persona
    $verificar_personal = conexion();
    $verificar_personal = $verificar_personal->query("SELECT personal_id FROM personal WHERE personal_id = '$personal_borrar'");
    if ($verificar_personal->rowCount() == 1) {

        $eliminar_personal = conexion();
            $eliminar_personal = $eliminar_personal->prepare("DELETE FROM personal WHERE personal_id = :id");

            $eliminar_personal->execute([":id" => $personal_borrar]);

            if ($eliminar_personal->rowCount() == 1) {
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Personal Eliminado!</strong> Los datos del personal han sido eliminados<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
                
            } else {
                echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Ocurrio un error inesperado!</strong> No se pudo eliminar el personal, por favor intente nuevamente<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            }

            $eliminar_personal = null; 
    } else {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ocurrio un error inesperado!</strong> El Personal que intenta eliminar no existe!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    $verificar_personal = null;
    