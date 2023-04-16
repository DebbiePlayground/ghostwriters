<main class="contenedor seccion">
<a href="/admin" class="button-form">Atras</a>
    <h2>Actualizar Entrada</h2>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>
    <div class="container-form">

    <form class="formulario" method="POST">
   
    <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Actualizar Entrada" class="button-gray">
    </form>
    </div>


</main>