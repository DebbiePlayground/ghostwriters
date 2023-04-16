<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\escritorController;
use Controllers\servicioController;
use Controllers\siteController;
use Controllers\loginController;
use Controllers\blogController;
use Controllers\opinionController;
use Controllers\idiomaController;


$router = new Router();

//Admin Panel
$router->get('/admin', [escritorController::class, 'index']);

$router->get('/escritores/crear', [escritorController::class, 'crear']);
$router->post('/escritores/crear', [escritorController::class, 'crear']);
$router->get('/escritores/actualizar', [escritorController::class, 'actualizar']);
$router->post('/escritores/actualizar', [escritorController::class, 'actualizar']);
$router->post('/escritores/eliminar', [escritorController::class, 'eliminar']);

$router->get('/servicios/crear', [servicioController::class, 'crear']);
$router->post('/servicios/crear', [servicioController::class, 'crear']);
$router->get('/servicios/actualizar', [servicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [servicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [servicioController::class, 'eliminar']);

$router->get('/blog/crear', [blogController::class, 'crear']);
$router->post('/blog/crear', [blogController::class, 'crear']);
$router->get('/blog/actualizar', [blogController::class, 'actualizar']);
$router->post('/blog/actualizar', [blogController::class, 'actualizar']);
$router->post('/blog/eliminar', [blogController::class, 'eliminar']);

$router->get('/idiomas/crear', [idiomaController::class, 'crear']);
$router->post('/idiomas/crear', [idiomaController::class, 'crear']);
$router->get('/idiomas/actualizar', [idiomaController::class, 'actualizar']);
$router->post('/idiomas/actualizar', [idiomaController::class, 'actualizar']);
$router->post('/idiomas/eliminar', [idiomaController::class, 'eliminar']);


$router->get('/idiomas/crear', [opinionController::class, 'crear']);
$router->post('/idiomas/crear', [opinionController::class, 'crear']);


//User access
$router->get('/', [siteController::class, 'index']);
$router->get('/nosotros', [siteController::class, 'nosotros']);
$router->get('/escritores', [siteController::class, 'escritores']);
$router->get('/escritor', [siteController::class, 'escritor']);
$router->get('/entradas-blog', [siteController::class, 'entradasBlog']);
$router->get('/entrada-blog', [siteController::class, 'entradaBlog']);
$router->get('/contacto', [siteController::class, 'contacto']);
$router->post('/contacto', [siteController::class, 'contacto']);
$router->get('/perfil', [siteController::class, 'perfil']);
$router->post('/perfil', [siteController::class, 'perfil']);


//login y autenticacion

$router->get('/login', [loginController::class, 'login']);
$router->post('/login', [loginController::class, 'login']);
$router->get('/logout', [loginController::class, 'logout']);

//recuperar password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [loginController::class, 'recuperar']);
$router->get('/mensajepwd', [loginController::class, 'mensajepwd']);
$router->post('/recuperar', [loginController::class, 'recuperar']);

//creacion de cuentas
$router->get('/crear-cuenta', [loginController::class, 'crear']);
$router->post('/crear-cuenta', [loginController::class, 'crear']);

//confirmacion de cuenta
$router->get('/confirmar-cuenta', [loginController::class, 'confirmar']);
$router->get('/mensaje', [loginController::class, 'mensaje']);


$router->comprobarRutas();
