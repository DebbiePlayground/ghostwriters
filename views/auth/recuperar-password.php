<main class="contenedor seccion">
    <h1>Restablecer Contraseña</h1>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form method="POST" class="form-login">

    <div class="container-login">
    <input type="password" placeholder="Tu nueva contraseña" name="password" id="password" required>

      <button type="submit" value="Restablecer Contraseña" class="button-login-register">Restablecer Contraseña</button>
    </div>

    <div class="signin">
    <p>¿Ya tienes una cuenta? <a href="/login">Iniciar Sesion</a>.</p>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <a href="/"><button type="button" class="cancelbtn">Cancelar</button></a>
  </div>


  </form>
</main>