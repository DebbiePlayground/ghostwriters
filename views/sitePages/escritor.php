<?php

    if(!isset($_SESSION)){
        session_start();

    }

    $auth = $_SESSION['login'] ?? null;

?>

<main class="contenedor seccion">
<div class="entrada-caso-exito">

        <h1><?php echo $escritor->nombre; ?></h1>

        <!-- Slideshow container -->
        <div class="slideshow-container fade">

            <!-- Full images with numbers and message Info -->
            <div class="Containers">
            <img src="/imagenes/<?php echo $escritor->imagen1; ?>" alt="imagen1" style="width:100% ">
            </div>
        
            <div class="Containers">
            <img src="/imagenes/<?php echo $escritor->imagen2; ?>" alt="imagen2" style="width:100%">
            </div>
        
            <div class="Containers">
            <img src="/imagenes/<?php echo $escritor->imagen3; ?>" alt="imagen3" style="width:100%">
            </div>
        
            <!-- Back and forward buttons -->
            <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
            <a class="forward" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        
        <!-- The circles/dots -->
        <div style="text-align:center">
            <span class="dots" onclick="currentSlide(1)"></span>
            <span class="dots" onclick="currentSlide(2)"></span>
            <span class="dots" onclick="currentSlide(3)"></span>
        </div>          
        <div class="texto-entrada">
            <p>Desde <?php echo $escritor->preciohora; ?> €/hora</p>
            <ul class="especialidades">
            <li><?php echo $servicio->nombre; ?></li>
            </ul> 
            <p>Idiomas</p>
            <ul class="especialidades">
            <li><?php echo $idioma->nombre; ?></li>
            </ul>
 
            <?php echo $escritor->descripcion; ?>
        </div>
        <br>

        <div class="button-enviar">
        <a href="/opiniones/crear" class="button-form">Dejar opinion</a>
        </div>

   </div> 
   <br>

   <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Opiniones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($opiniones as $opinion) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $opinion->cuerpo; ?>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
</div>

 </main>