<main class="contenedor seccion">

<h1>Crear Cuenta</h1>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

   <form class="form-register" method="POST" action="/crear-cuenta">

  <div class="container-register">
    <p>Rellena los datos para crear tu cuenta.</p>
    <hr>

    <input type="text" placeholder="Tu Nombre" name="nombre" id="nombre" value= "<?php echo s($usuario->nombre); ?>" required>

    <input type="text" placeholder="Tu Apellido" name="apellido" id="apellido" value= "<?php echo s($usuario->apellido); ?>" required>

    <input type="email" placeholder="Tu Email" name="email" id="email" value= "<?php echo s($usuario->email); ?>" required>

    <input type="password" placeholder="Tu Contraseña" name="password" id="password" value= "<?php echo s($usuario->password); ?>"required>

            <select name="rol" id="rol" value="<?php echo s($usuario->rol); ?>" required>
                <option value="1">Soy un Escritor</option>
                <option value="2">Busco un Escritor</option>
            </select>

    <p>Al crear una cuenta, acepto los <a href="#">Terminos & Condiciones</a>.</p>
    <button type="submit" class="registerbtn">Crear Cuenta</button>
  </div>

  <div class="signin">
    <p>¿Ya tienes una cuenta? <a href="/login">Iniciar Sesión</a>.</p>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <a href="/"><button type="button" class="cancelbtn">Cancelar</button></a>
  </div>
</form>
</main>