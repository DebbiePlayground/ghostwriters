<main class="contenedor seccion">
        <div class="entrada-caso-exito">

        <h1><?php echo $entradablog->titulo; ?></h1>
        <div class="imagen-entrada">  
            <img src="/imagenes/<?php echo $entradablog->imagen; ?>" alt="Imagen-entrada" style="width:30%">
        </div>

            <div class="texto-entrada">
            <p class="signature">Publicado el <?php echo $entradablog->createDate; ?> por <span>Admin</span></p>
            <?php echo $entradablog->cuerpo; ?>
              
            </div>
        </div>

    </main>