<div class="seccion-escritores">
    <?php foreach($escritores as $escritor){?>
    <div class="escritor">
            <img src="/imagenes/<?php echo $escritor->imagen1; ?>" alt="Escritor">
            <div class="escritor-descripcion">
                <h4><?php echo $escritor->nombre; ?></h4>
                <p>Especialidades</p>
                <ul class="especialidades">
                    <li>Autobiografia</li>
                    <li>Ficción</li>
                    <li>No-ficción</li>
                  </ul>
                  <p class="precio-hora"><?php echo $escritor->preciohora; ?> €/h</p>
                  <a href="/escritor?id=<?php echo $escritor->id; ?>" class="button button-blue">Saber Más</a>
            </div>    
    </div>  
    <?php } ?>
</div>  

<?php

?>