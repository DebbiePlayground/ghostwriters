<main class="contenedor seccion">

        <?php if($mensaje){ ?>
        <p class='alerta exito'><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><?php echo $mensaje; ?></p>
        <?php }  ?>

    <div class="container-form">
        <p class="title">¿Quieres que te asesoremos?</p>
        <form class="formulario" action="/contacto" method="POST">

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                <label for="email">Email</label>
                <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]">



                <label for="genero">Genero</label>
                <select id="genero" name="contacto[genero]" required>
                <option value="" disabled selected>--Seleccione--</option>

                    <?php foreach($servicios as $servicio) { ?>
                    <option <?php echo $escritor-> servicioId === $servicio->id ? 'selected' : '' ?> value="<?php echo s($servicio->id); ?>"><?php echo s($servicio->nombre); ?>
                    <?php  } ?>
                </select>

                <label for="idioma">Idioma</label>
                <select id="idioma" name="contacto[idioma]" required>
                    <option value="" disabled selected>--Seleccione--</option>
                    <?php foreach($idiomas as $idioma) { ?>
                    <option <?php echo $escritor-> idiomaId === $idioma->id ? 'selected' : '' ?> value="<?php echo s($idioma->id); ?>"><?php echo s($idioma->nombre); ?>
                    <?php  } ?>
                </select>

                <label for="presupuesto">Presupuesto</label>
                <input type="number" placeholder="presupuesto" id="presupuesto" name="contacto[presupuesto]" required>

                <label for="mensaje">Cuentanos sobre tu idea:</label>
                <textarea  id="mensaje" cols="30" rows="10" name="contacto[mensaje]" required></textarea>

                <p>¿Como deseas ser contactado?</p>
                    <label for="contacto-telefono">Telefono</label>
                    <input type="radio" value="telefono" id="contacto-telefono" name="contacto[contacto]" required>

                    <label for="contacto-email">Email</label>
                    <input type="radio" value="email" id="contacto-email" name="contacto[contacto]" required>
            <div class="button-enviar">
                <input type="submit" value="Enviar">

            </div>
        </form>
        </div>
    </main>