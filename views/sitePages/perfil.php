
<main class="contenedor seccion">

<?php if(intval($resultado) === 1) : ?>
        <p class="alerta exito">Registro Creado Correctamente</p>
    <?php elseif(intval($resultado) === 2): ?>
        <p class="alerta exito">Registro Actualizado Correctamente</p>
    <?php elseif(intval($resultado) === 3): ?>
        <p class="alerta exito">Registro Eliminado Correctamente</p>        
    <?php endif; ?>

    <?php 
    include_once __DIR__ . "/../templates/alertas.php";
    ?>
<div class="container-form">
        <form class="formulario" action="/perfil" method="POST">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>" disabled>

                <label for="nombre">Apellido</label>
                <input type="text" placeholder="Tu Apellido" id="apellido" name="apellido" value="<?php echo $usuario->apellido; ?>" disabled>

                <label for="email">Email</label>
                <input type="text" placeholder="Tu email" id="email" name="email"  value="<?php echo $usuario->email; ?>" required>


            </fieldset>
            <?php if($escritor && $rol === '2') : ?>

            <fieldset>
                <legend>Mi cuenta de Escritor</legend>

                <label for="nombre-escritor">Nombre</label>
                <input type="text" id="nombre" name="escritor[nombre]" placeholder="Nombre Escritor" value="<?php echo $escritor->nombre;?>" disabled>

                <label for="nombre">Precio/Hora (€)</label>
                <input  type="number" id="preciohora" name="escritor[preciohora]" placeholder="Precio/Hora" value="<?php echo $escritor->preciohora;?>" disabled>
            <?php endif; ?>


            </fieldset>
            <div class="button-enviar">
                <input type="submit" value="Guardar Cambios">
                <?php if(!$escritor && $rol === '2') : ?>
                <a href="/escritores/crear" class="button-form">Crear Mi Perfil de Escritor</a>
                <?php endif; ?>
                <?php if($escritor && $rol === '2') : ?>

                <a href="/escritores/actualizar?id=<?php echo $escritor->id?>" class="button-form">Actualizar Mi Perfil de Escritor</a>
                <?php endif; ?>

            </div>
        </form>
        </div>
    </main>