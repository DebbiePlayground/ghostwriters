<?php 

namespace Model;

class entradablog extends activeRecord {

    protected static $tabla = 'entradasblog';
    protected static $columnasDB = ['id', 'titulo', 'entradilla', 'cuerpo', 'imagen', 'createDate'];


    public $id;
    public $titulo;
    public $entradilla;
    public $cuerpo;
    public $imagen;
    public $createDate;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->entradilla = $args['entradilla'] ?? '';
        $this->cuerpo = $args['cuerpo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->createDate =  date('Y-m-d');


    }
}