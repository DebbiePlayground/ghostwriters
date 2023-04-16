<?php

    if(!isset($_SESSION)){
        session_start();

    }

    $auth = $_SESSION['login'] ?? null;

    if (!isset($inicio)){
        $inicio = false;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="cache-control" content="no-cache">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghostwriters</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <link  rel="icon"  href="../build/img/favicon.png" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"><img src="/build/img/logoempresa.png" alt="logo"></a>
                <div class="mobile-menu">
                    <img src="/build/img/menu.png" alt="menu-hamburguesa">
                </div>
                <nav class="navegacion">
                    <a href="/escritores">Escritores</a>
                    <a href="/entradas-blog">Blog</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/contacto">Contacto</a>
                    <?php if(!$auth) : ?>
                    <a href="/login">Iniciar Sesión</a>
                    <?php endif; ?>
                    <?php if($auth) : ?>
                    <a href="/perfil">Mi Perfil</a>
                    <a href = "/logout">Cerrar Sesión</a>
                    <?php endif; ?>

                </nav>
            </div>
            <?php 
                if($inicio){
                    echo "<h1>Necesitas escribir tu historia, <br>¿A quién vas a llamar?</h1>";
                }
            ?>     
        </div>
    </header>


    <?php echo $contenido ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                    <a href="/escritores">Escritores</a>
                    <a href="/entradas-blog">Blog</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Todos los Derechos Reservados</p>

    </footer>
    <script src="../build/js/bundle.min.js"></script>

</body>
</html>