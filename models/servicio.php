<?php 

namespace Model;

class servicio extends activeRecord {

    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar(){

        if(!$this->nombre){
            self::$alertas[] = "Debes añadir un nombre";
        }

        return self::$alertas;

    }

}