<?php

namespace Controllers;
use MVC\Router;
use Model\idioma;

class idiomaController{

    public static function index(Router $router) {
        $idiomas = idiomas::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('idiomas/admin', [
            'idiomas' => $idiomas,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        $idioma = new idioma;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //crear una nueva instancia
            $idioma = new idioma($_POST['idioma']);


                $resultado = $idioma -> guardar();

                header('Location: /admin?resultado=1');

        }

        $router->render('idiomas/crear', [
            'alertas' => $alertas,
            'idioma' => $idioma
        ]);
    
    }

    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

        $idioma = idioma::find($id);


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['idioma'];
            $idioma->sincronizar($args);
        
            

                $resultado = $idioma->guardar();
                header('Location: /admin?resultado=2');


        }

        $router->render('idiomas/actualizar', [
            'idioma' => $idioma,
            'alertas' => $alertas

        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = $_POST['tipo'];

            if(validarTipo($tipo)){
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                $idioma = idioma::find($id);
                $resultado = $idioma->eliminar();

                if($resultado) {
                    header('Location: /admin?resultado=3');
                }

            } 
             
        }
    }
}