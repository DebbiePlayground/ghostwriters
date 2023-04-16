<?php

namespace Controllers;
use MVC\Router;
use Model\escritor;
use Model\servicio;
use Model\usuario;
use Model\entradablog;
use Model\idioma;


use Intervention\Image\ImageManagerStatic as Image;


class escritorController{

    public static function index(Router $router){

        session_start();
        isAdmin();

        $escritores = escritor::all();

        $servicios = servicio::all();

        $entradasblog = entradablog::all();
        $usuarios = usuario::all();
        $idiomas = idioma::all();




        $resultado = $_GET['resultado'] ?? null;


        $router->render('escritores/admin', [
            'escritores' => $escritores,
            'servicios' => $servicios,
            'entradasblog' => $entradasblog,
            'usuarios' =>  $usuarios,
            'idiomas' =>  $idiomas,
            'resultado' => $resultado

        ]);    
    }

    public static function crear(Router $router){
        session_start();
        $usuario = Usuario::find($_SESSION['id']);

        $alertas = escritor::getAlertas();
        $escritor = new escritor;
        $servicios = servicio::all();
        $idiomas = idioma::all();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $escritor = new escritor($_POST['escritor']);


            //generar unique name
            $nombreImagen1 = md5(uniqid(rand(), true)) . ".jpg";
            $nombreImagen2 = md5(uniqid(rand(), true)) . ".jpg";
            $nombreImagen3 = md5(uniqid(rand(), true)) . ".jpg";
    
            //ajustar y setear imagenes
    
            if($_FILES['escritor']['tmp_name']['imagen1']){
                $image1 = Image::make($_FILES['escritor']['tmp_name']['imagen1'])->fit(800,600);
                $escritor->setImagen1($nombreImagen1);
            }
    
            if($_FILES['escritor']['tmp_name']['imagen2']){
                $image2 = Image::make($_FILES['escritor']['tmp_name']['imagen2'])->fit(800,600);
                $escritor->setImagen2($nombreImagen2);
            }
    
            if($_FILES['escritor']['tmp_name']['imagen3']){
                $image3 = Image::make($_FILES['escritor']['tmp_name']['imagen3'])->fit(800,600);
                $escritor->setImagen3($nombreImagen3);
            }
    
            // Almacenar el creador del proyecto
    
            //validacion
            $alertas = $escritor->validar();
    
            //insertar en la base de datos
    
            if(empty($alertas)){
    
                $escritor->usuarioId = $_SESSION['id'];     
    
                //crear carpeta de imagenes
    
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                //guardar imagenes
                $image1->save(CARPETA_IMAGENES . $nombreImagen1);
                $image2->save(CARPETA_IMAGENES . $nombreImagen2);
                $image3->save(CARPETA_IMAGENES . $nombreImagen3); 

                    

                //guardar en DB
                $resultado = $escritor->guardar();

                header('Location: /perfil?resultado=1');
    
            }
        }

        $router->render('escritores/crear', [
            'alertas' => $alertas,
            'escritor' => $escritor,
            'servicios' => $servicios,
            'idiomas' => $idiomas

        ]);

    }

    public static function actualizar(Router $router){

        session_start();
        $usuario = Usuario::find($_SESSION['id']);


        $id = validarORedireccionar('/escritores');

        // Obtener los datos del escritor

        $escritor = escritor::find($id);

        // Obtener los datos de los servicios e idiomas

        $servicios = servicio::all();
        $idiomas = idioma::all();


        // Arreglo con mensajes de errores
        $alertas = servicio::getAlertas();        
        $alertas = idioma::getAlertas();        

        //metodo post para actualizar

            //ejecutar codigo despues de validacion

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $args = $_POST['escritor'];

        $escritor->sincronizar($args);

        $alertas = $escritor->validar();

        //generar unique name
        $nombreImagen1 = md5(uniqid(rand(), true)) . ".jpg";
        $nombreImagen2 = md5(uniqid(rand(), true)) . ".jpg";
        $nombreImagen3 = md5(uniqid(rand(), true)) . ".jpg";

        //ajustar y setear imagenes

        if($_FILES['escritor']['tmp_name']['imagen1']){
            $image1 = Image::make($_FILES['escritor']['tmp_name']['imagen1'])->fit(800,600);
            $escritor->setImagen1($nombreImagen1);
        }

        if($_FILES['escritor']['tmp_name']['imagen2']){
            $image2 = Image::make($_FILES['escritor']['tmp_name']['imagen2'])->fit(800,600);
            $escritor->setImagen2($nombreImagen2);
        }

        if($_FILES['escritor']['tmp_name']['imagen3']){
            $image3 = Image::make($_FILES['escritor']['tmp_name']['imagen3'])->fit(800,600);
            $escritor->setImagen3($nombreImagen3);
        }


        //actualizar en la base de datos

        if(empty($alertas)){

            //almacenar las imagenes
            if($_FILES['escritor']['tmp_name']['imagen1']) {
                $image1->save(CARPETA_IMAGENES . $nombreImagen1);
            }
            if($_FILES['escritor']['tmp_name']['imagen2']) {
                $image2->save(CARPETA_IMAGENES . $nombreImagen2);
            }
            if($_FILES['escritor']['tmp_name']['imagen3']) {
                $image3->save(CARPETA_IMAGENES . $nombreImagen3);
            }

            $resultado = $escritor->guardar();

            header('Location: /perfil?resultado=2');

    
        }

    }

        $router->render('escritores/actualizar', [
            'escritor' => $escritor,
            'servicios' => $servicios,
            'idiomas' => $idiomas,
            'alertas' => $alertas

        ]);
    }

    public static function eliminar(){
        session_start();
        $usuario = Usuario::find($_SESSION['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = $_POST['tipo'];

            if(validarTipo($tipo)){
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                // encontrar y eliminar el escritor
                $escritor = escritor::find($id);
                $resultado = $escritor->eliminar();

                header('Location: /perfil?resultado=3');

            } 
             
        }
    }
}