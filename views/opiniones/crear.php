<main class="contenedor seccion">
<div class="container-form">

    <p>Deja tu opinon</p>
    <form class="formulario" method="POST" action="/opiniones/crear">
        <textarea id="cuerpo" name="opinion[cuerpo]" required><?php echo s($opinion->cuerpo); ?></textarea>
        <input type="submit" value="Crear" class="button-gray">
    </form>
    </div>

</main>