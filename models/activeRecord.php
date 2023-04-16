<?php

namespace Model;

class activeRecord {

    //base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Alertas y Mensajes
    protected static $alertas = [];

    //conexión a la base de datos
    public static function setDB($database){
        self::$db = $database;
    }

    //mensaje de alerta 
    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }
    
    //validaciones por objeto
    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";
        
        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
           'resultado' =>  $resultado,
           'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }
    
    public function eliminar(){
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
            //redireccionar usuario
            $this->borrarImagen1();
            $this->borrarImagen2();
            $this->borrarImagen3();

        }

        return $resultado;


    }

    //Identificar atributos
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;

    }

    // Subida de archivos
    public function setImagen($imagen) {
        // Elimina la imagen previa
        if( !is_null($this->id) ) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Elimina el archivo
    public function borrarImagen() {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }



    public function setImagen1($imagen1){
        // Elimina la imagen previa
        if( !is_null($this->id)) {
            $this->borrarImagen1();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen1){
            $this->imagen1 = $imagen1;
        }
    }

    public function borrarImagen1(){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen1);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen1);
        }
    }

    
    public function setImagen2($imagen2){
        // Elimina la imagen previa
        if( !is_null($this->id)) {
            $this->borrarImagen2();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen2){
            $this->imagen2 = $imagen2;
        }
    }

    public function borrarImagen2(){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen2);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen2);
        }
    }

    
    public function setImagen3($imagen3){
        // Elimina la imagen previa
        if( !is_null($this->id)) {
            $this->borrarImagen3();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen3){
            $this->imagen3 = $imagen3;
        }
    }

    public function borrarImagen3(){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen3);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen3);
        }
    }



    public static function all($orden = 'DESC') {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id ${orden}";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function getN($amount, $orden = 'DESC'){
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id ${orden}" . " LIMIT " . $amount;

       // $query = "SELECT * FROM " . static::$tabla. " LIMIT " . $amount;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Paginar los registros
    public static function paginar($por_pagina, $offset) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT ${por_pagina} OFFSET ${offset} " ;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = ${id}";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function where($columna, $valor){
        $query = "SELECT * FROM " . static::$tabla  ." WHERE ${columna} = '${valor}'";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function total($columna = '', $valor = '') {
        $query = "SELECT COUNT(*) FROM " . static::$tabla;
        if($columna) {
            $query .= " WHERE ${columna} = ${valor}";
        }
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);
    }

    
    public static function consultarSQL($query){
        
        $resultado = self::$db->query($query);

        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();

        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }  

        return $objeto;

    }

    public function sincronizar($args = []){
        foreach($args as  $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}