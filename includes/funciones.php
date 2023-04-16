<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/${nombre}.php";
}


function debuggear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//validar tipo

function validarTipo($tipo){
    $tipos = ['escritor', 'servicio', 'entradablog'];
    return in_array($tipo, $tipos);
}

function validarORedireccionar(string $url){
    //validar url para un Id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: ${url}");
    }    

    return $id;
}

function authenticatedUser() : bool {
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }  
        return false;
}

function isAdmin() : void{
    if($_SESSION['rolId'] !== '3'){
        header('Location: /');

    }
}