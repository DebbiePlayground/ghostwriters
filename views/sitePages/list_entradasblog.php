<section class="case-studies">
            <h3>Nuestras Historias</h3>
            <?php foreach($entradasblog as $entradablog){?>
            <article class="client-story">
                <div class="imagen-client-story">
                    <a href="/entrada-blog?id=<?php echo $entradablog->id; ?>">
                    <img src="/imagenes/<?php echo $entradablog->imagen; ?>" alt="Autobiografia">
                    </a>
                </div>
                <div class="texto-client-story">
                    <p class="signature">Publicado el <?php echo $entradablog->createDate; ?> entradablog por <span>Admin</span></p>
                    <h4><?php echo $entradablog->titulo; ?></h4>                        
                        <p><?php echo $entradablog->entradilla; ?></p>
                </div>
            </article>
            
            <?php } ?>

</section>

<?php

?>