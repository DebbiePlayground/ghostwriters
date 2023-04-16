<?php

namespace Model;

class usuario extends activeRecord {
   
    // Base DE DATOS
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido','email', 'password', 'token', 'confirmado', 'rolId'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $token;
    public $admin;
    public $confirmado;
    public $rol;

    //constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->apellido = $args['apellido'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->rolId = $args['rolId'] ?? '0';

    }

    //validaciones
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }

        return self::$alertas;
    }

    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }

        return $resultado;
    }


    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = "El Nombre es obligatorio";
        }

        if(!$this->apellido) {
            self::$alertas['error'][] = "El Apellido es obligatorio";
        }

        if(!$this->email) {
            self::$alertas['error'][] = "El Email del usuario es obligatorio";
        }
        if(!$this->password) {
            self::$alertas['error'][] = "El Password del usuario es obligatorio";
        }

        if(!preg_match( '/[^A-Za-z0-9]+/', $this->password) || strlen($this->password) < 8) {
            self::$alertas['error'][] = "La contraseña ha de tener al menos 8 caracteres alfanuméricos y por lo menos un carácter especial.";
        }
        

        return self::$alertas;
    }

    public function existeUsuarioNuevo() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'Ya existe un usuario con ese correo electronico';
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }


    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password) {
        $resultado = password_verify($password, $this->password);
        
        if(!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

    public function validarPassword() {

        if(!preg_match( '/[^A-Za-z0-9]+/', $this->password) || strlen($this->password) < 8) {
            self::$alertas['error'][] = "La contraseña ha de tener al menos 8 caracteres alfanuméricos y por lo menos un carácter especial.";
        }
        return self::$alertas;


    }

    public function validar_perfil() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        return self::$alertas;
    }



}