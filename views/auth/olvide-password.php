<main class="contenedor seccion">

<h1>Olvide mi contraseña</h1>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="form-login" action="olvide" method="POST">
<div class="container-login">

    <p>Por favor introduzca la dirección de correo con el que está registrado.<br> En breve le enviaremos un email con las instrucciones para recuperar su contraseña</p>
    <input type="email" maxsize="40" placeholder="Correo Electronico" name="email" id="email" required>
    <button type="submit" class="registerbtn" value="Enviar Instrucciones">Recuperar</button>
</div>

  <div class="container" style="background-color:#f1f1f1">
      <a href="/"><button type="button" class="cancelbtn">Cancelar</button></a>
  </div>

</form>

</main>