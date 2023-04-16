<main class="contenedor seccion">
    <a href="/perfil" class="button-form">Atras</a>
    <h2>Crear Escritor</h2>

    <?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>
<div class="container-form">

    <form method= "POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Crear Escritor" class="button-gray">
    </form>
    </div>
</main>