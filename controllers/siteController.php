<?php 

namespace Controllers;
use MVC\Router;
use Model\escritor;
use Model\entradablog;
use Model\opinion;
use Model\servicio;
use Model\idioma;
use Model\usuario;

use Classes\paginacion;


use PHPMailer\PHPMailer\PHPMailer;


class siteController {
    public static function index(Router $router){
       $escritores = escritor::getN(3);
       $entradasblog = entradablog::getN(2, 'DESC');

       $inicio = true;

        $router->render('sitePages/index', [
            'escritores' => $escritores,
            'entradasblog' => $entradasblog,
            'inicio' => true
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('sitePages/nosotros');
    }


    public static function escritores(Router $router){


        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /escritores?page=1');
        }

        $registros_por_pagina = 6;

        $total = escritor::total();

        $paginacion = new paginacion( $pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /escritores?page=1');
        }

        $escritores = escritor::paginar($registros_por_pagina, $paginacion->offset());

        $idioma = idioma::where('Id', $escritor->idiomaId);
        $servicio = servicio::where('Id', $escritor->servicioId);

        $router->render('sitePages/escritores', [
            'escritores' => $escritores,
            'idioma' => $idioma,
            'servicio' => $servicio,
            'paginacion' => $paginacion->paginacion()
        ]);
    }


    public static function escritor(Router $router){

        $id = validarORedireccionar('/escritores');


        $escritor = escritor::find($id);
        $opiniones = opinion::all();
        $idioma = idioma::where('Id', $escritor->idiomaId);
        $servicio = servicio::where('Id', $escritor->servicioId);


        $router->render('sitePages/escritor', [
            'escritor' => $escritor,
            'idioma' => $idioma,
            'servicio' => $servicio,
            'opiniones' => $opiniones

        ]);
    }

    public static function entradasBlog(Router $router){
        $entradasblog = entradablog::all('DESC');


        $router->render('sitePages/entradas-blog', [
            'entradasblog' => $entradasblog,
        ]);
    }

    public static function entradaBlog(Router $router){

        $id = validarORedireccionar('/entradas-blog');

        $entradablog = entradablog::find($id);

        $router->render('sitePages/entrada-blog', [
            'entradablog' => $entradablog
        ]);
    }

    public static function contacto(Router $router){

        $servicios = servicio::all();
        $idiomas = idioma::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $answers = $_POST['contacto'];

            $mail = new PHPMailer();

            //configure SMTP
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '3f805581006f71';
            $mail->Password = '121510df4b6b6a';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            
            $mail->setFrom('admin@ghostwriters.com');
            $mail->addAddress('admin@ghostwriters.com', 'Ghostwriters.com');
            $mail->CharSet = 'UTF-8';

            //email content

            $content = '<html>'; 
            $content .= '<p>Tienes un nuevo mensaje</p>';
            $content .= '<p>Nombre: ' . $answers['nombre'] . ' </p>';
            $content .= '<p>Email: ' . $answers['email'] . ' </p>';
            $content .= '<p>Telefono: ' . $answers['telefono'] . ' </p>';
            $content .= '<p>Mensaje: ' . $answers['mensaje'] . ' </p>';
            $content .= '<p>Genero: ' . $answers['genero'] . ' </p>';
            $content .= '<p>Idioma: ' . $answers['idioma'] . ' </p>';
            $content .= '<p>Presupuesto: € ' . $answers['presupuesto'] . ' </p>';
            $content .= '<p>Forma de Contacto: ' . $answers['contacto'] . ' </p>';
            $content .= '</html>'; 

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Tienes un nuevo mensaje';
            $mail->Body    =  $content;
            $mail->AltBody = 'Tienes un nuevo mensaje';

            //enviar email
            if($mail->send()) {
                $mensaje = 'Mensaje enviado correctamente';
            } else {
                $mensaje = "Mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
            }

        }
        
        $router->render('sitePages/contacto', [
            'mensaje' => $mensaje,
            'servicios' => $servicios,
            'idiomas' =>  $idiomas

        ]);
    }

    public static function perfil(Router $router) {
        session_start();
        $alertas = [];

        $usuario = usuario::find($_SESSION['id']);
        $escritor = escritor::where('usuarioId', $usuario->id);
        $rol = $usuario->rolId;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar_perfil();

            if(empty($alertas)) {

                $existeUsuario = usuario::where('email', $usuario->email);

                if($existeUsuario && $existeUsuario->id !== $usuario->id ) {
                    // Mensaje de error
                    usuario::setAlerta('error', 'Email no válido, ya pertenece a otra cuenta');
                    $alertas = $usuario->getAlertas();
                } else {
                    // Guardar el registro
                    $usuario->guardar();

                    usuario::setAlerta('exito', 'Guardado Correctamente');
                    $alertas = $usuario->getAlertas();

                }
            }
        }
        
        $router->render('sitePages/perfil', [
            'usuario' => $usuario,
            'alertas' => $alertas,            
            'escritor' => $escritor,
            'rol' => $rol

        ]);
    }



        
}
