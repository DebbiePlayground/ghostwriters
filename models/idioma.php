<?php 

namespace Model;

class idioma extends activeRecord {

    protected static $tabla = 'idiomas';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }


}