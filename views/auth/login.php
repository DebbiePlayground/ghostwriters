<main class="contenedor seccion">
    <h1>Bienvenido de Nuevo</h1>

    <?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

    <form method="POST" class="form-login" action="/login">

    <div class="container-login">
      <input type="email" maxsize="40" placeholder="Correo Electronico" name="email" id="email" required>

      <input type="password" placeholder="Contraseña" name="password" id="password" required>

      <button type="submit" value="Iniciar sesion" class="button-login-register">Iniciar Sesión</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Recordarme
      </label>
      <div class = "newuser">
      <span>¿Aún no tienes una cuenta? <a href="/crear-cuenta">Registrate aquí</a></span>
      </div>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <a href="/"><button type="button" class="cancelbtn">Cancelar</button></a>
      <span class="psw">¿Has olvidado tu <a href="/olvide">contraseña?</a></span>
    </div>
  </form>
</main>