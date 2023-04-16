<?php 

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;


class email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

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

            $content = "<html>"; 
            $content .= "<p>Hola " . $this->nombre . ",</p>";
            $content .= "<p>Has creado una nueva cuenta, solo debes confirmarla, presionando en el 
            siguiente enlace: </p>";
            $content .= "<p><a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar mi cuenta</a></p>";
            $content .= "<p>Si tu no creaste esta cuenta, puedes ignorar este email.</p>";            
            $content .= "</html>";  

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confirma tu cuenta';
            $mail->Body    =  $content;

            //enviar el mensaje

            $mail->send();

    }

    public function enviarInstrucciones(){

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

        $content = "<html>"; 
        $content .= "<p>Hola " . $this->nombre . ",</p>";
        $content .= "<p>Has pedido un cambio de contraseña. Puedes resetearla, presionando en el 
        siguiente enlace: </p>";
        $content .= "<p><a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer mi contraseña</a></p>";
        $content .= "<p>Si tu no creaste esta cuenta, puedes ignorar este email.</p>";            
        $content .= "</html>";  

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Restablece tu contraseña';
        $mail->Body    =  $content;

        //enviar el mensaje

        $mail->send();

}
}