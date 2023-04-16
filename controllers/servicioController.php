<?php

namespace Controllers;
use MVC\Router;
use Model\servicio;

class servicioController{

    public static function index(Router $router) {
        $servicios = servicio::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('servicios/admin', [
            'servicios' => $servicios,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        $alertas = servicio::getAlertas();
        $servicio = new servicio;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //crear una nueva instancia
            $servicio = new servicio($_POST['servicio']);

            // Validar
            $alertas = $servicio->validar();

            if(empty($alertas)) {

                $resultado = $servicio -> guardar();

                header('Location: /admin?resultado=1');

            }
        }

        $router->render('servicios/crear', [
            'alertas' => $alertas,
            'servicio' => $servicio
        ]);
    
    }

    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

        $servicio = servicio::find($id);

        // Arreglo con mensajes de errores
        $alertas = servicio::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['servicio'];
            $servicio->sincronizar($args);
        
            // Validación
            $alertas = $servicio->validar();    
            
            if(empty($alertas)) {


                $resultado = $servicio->guardar();
                header('Location: /admin?resultado=2');

            }

        }

        $router->render('servicios/actualizar', [
            'servicio' => $servicio,
            'alertas' => $alertas

        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = $_POST['tipo'];

            if(validarTipo($tipo)){
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                // encontrar y eliminar el escritor
                $servicio = servicio::find($id);
                $resultado = $servicio->eliminar();

                if($resultado) {
                    header('Location: /admin?resultado=3');
                }

            } 
             
        }
    }
}