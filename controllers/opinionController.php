<?php

namespace Controllers;
use MVC\Router;
use Model\opinion;
use Model\usuario;
use Model\escritor;



class opinionController{


    public static function crear(Router $router){
        $opinion = new opinion;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //crear una nueva instancia
            $opinion = new opinion($_POST['opinion']);


                $resultado = $opinion -> guardar();

                header('Location: /');

        }

        $router->render('opiniones/crear', [
            'opinion' => $opinion
        ]);
    
    }
}