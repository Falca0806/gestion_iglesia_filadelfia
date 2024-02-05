<!-- Boton abrir modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Nuevo registro
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-end modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Miembro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            require_once "./php/main.php";
        ?>
        <!-- FORMULARIO -->
        <form action="">
            <div class="row mb-4">
                <div class="ms-3 col-3">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="miembros_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{6,40}" maxlength="40" required>
                </div>
                <div class="mx-3 col-3">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" class="form-control" name="miembros_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{6,40}" maxlength="40" required >
                </div>
                <div class="mx-3 col-3">
                    <label for="exampleInputEmail1">Cedula</label>
                    <input type="text" class="form-control" name="miembros_dni" pattern="[0-9]{7,25}" maxlength="25" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="ms-3 col-3">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" class="form-control" name="miembros_telefono" pattern="[0-9]{11}" maxlength="11" required>
                </div>
                <div class="mx-3 col-3">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" class="form-control" name="miembros_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ.,#- ]{8,200}" maxlength="200" required>
                </div>
                <div class="mx-3 col-3">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="email" class="form-control" name="miembros_correo" maxlength="100" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="ms-3 col-3">
                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="miembros_fecha_nac" required>
                </div>

                <div class="mx-3 col-3">
                    <label for="exampleInputEmail1">Genero</label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>
                <div class="mx-3 col-3">
                    <label for="exampleInputEmail1">Estado Civil</label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="Casado">Casado(a)</option>
                        <option value="Soltero">Soltero(a)</option>
                        <option value="Divorciado">Divorciado(a)</option>
                        <option value="Viudo">Viudo(a)</option>
                    </select>
                </div>
            </div>
            <!-- <div class="modal-footer"> -->
                <div class="row mb-4">
                    <div class="ms-3 col-3">
                        <label for="exampleInputEmail1">Ministerio 1</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione</option>
                            <option value="1">Casado(a)</option>
                            <option value="2">Soltero(a)</option>
                            <option value="3">Divorciado(a)</option>
                            <option value="4">Viudo(a)</option>
                        </select>
                    </div>
                    <div class="mx-3 col-3">
                        <label for="exampleInputEmail1">Ministerio 2</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione</option>
                            <option value="1">Casado(a)</option>
                            <option value="2">Soltero(a)</option>
                            <option value="3">Divorciado(a)</option>
                            <option value="4">Viudo(a)</option>
                        </select>
                    </div>
                    <div class="mx-3 col-3">
                        <label for="exampleInputEmail1">Ministerio 3</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione</option>
                            <option value="1">Casado(a)</option>
                            <option value="2">Soltero(a)</option>
                            <option value="3">Divorciado(a)</option>
                            <option value="4">Viudo(a)</option>
                        </select>
                    </div>
                </div>
            <!-- </div> -->






            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>