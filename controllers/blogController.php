<?php

namespace Controllers;
use MVC\Router;
use Model\entradablog;
use Intervention\Image\ImageManagerStatic as Image;

class blogController{

    public static function index(Router $router) {
        $entradasblog = entradablog::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;


        $router->render('blog/admin', [
            'entradasblog' => $entradasblog,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $entradablog = new entradablog;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //crear una nueva instancia
            $entradablog = new entradablog($_POST['entradablog']);

            //generar unique name
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            // Setear la imagen
            if($_FILES['entradablog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['entradablog']['tmp_name']['imagen'])->fit(800,600);
                $entradablog->setImagen($nombreImagen);
            }
            //crear carpeta de imagenes
    
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
    
            //guardar imagenes
            $image->save(CARPETA_IMAGENES . $nombreImagen);

           //debuggear($entradablog);

           $resultado = $entradablog -> guardar();

            header('Location: /admin?resultado=1');

        }

        $router->render('blog/crear', [
            'entradablog' => $entradablog
        ]);
    
    }

    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

        $entradablog = entradablog::find($id);


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['entradablog'];
            $entradablog->sincronizar($args);

            //generar unique name
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";        
            
            //ajustar y setear imagenes

            if($_FILES['entradablog']['tmp_name']['imagen']){
                $image = Image::make($_FILES['entradablog']['tmp_name']['imagen'])->fit(800,600);
                $entradablog->setImagen($nombreImagen);
            }

            if($_FILES['entradablog']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            
                
                $resultado = $entradablog->guardar();
                header('Location: /admin?resultado=2');

        }

        $router->render('blog/actualizar', [
            'entradablog' => $entradablog,

        ]);
    }


    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = $_POST['tipo'];

            if(validarTipo($tipo)){
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                // encontrar y eliminar el escritor
                $entradablog = entradablog::find($id);
                $resultado = $entradablog->eliminar();

                if($resultado) {
                    header('Location: /admin?resultado=3');
                }

            } 
             
        }
    }


}
