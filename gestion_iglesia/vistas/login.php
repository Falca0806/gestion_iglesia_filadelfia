<div class="main-container">
  <div class=" d-flex align-items-center justify-content-center my-5 bg-body-tertiary">
    
    <form action="" method="POST" autocomplete="off">
      <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Gestion Administrativa</h1>

      <div class="form">
          <label class="label">Usuario</label>
          <input type="text" class="form-control" name="login_usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{3,25}" maxlength="25" required>

      </div>
      <div class="form">
          <label class="password">Cotraseña</label>
        <input type="password" class="form-control" name="login_clave" pattern="[a-zA-Z0-9$@.-]{8,16}" maxlength="100" required >
        
      </div>
      <br>
      <button class="btn btn-primary w-100 py-2" type="submit">Iniciar sesion</button>
      <!-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p> -->

      <?php
        if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
            require_once "./php/main.php";
            require_once "./php/iniciar_sesion.php";
        }


      ?>





    </form>
  </div>  

</div>

