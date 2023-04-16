<?php 

namespace Model;

class escritor extends activeRecord {

    protected static $tabla = 'escritores';
    protected static $columnasDB = ['id', 'nombre', 'preciohora', 'imagen1', 'imagen2', 'imagen3', 'descripcion', 'idiomaId', 'servicioId', 'usuarioId', 'intro'];

    //declaración variables de los campos
    public $id;
    public $nombre;
    public $preciohora;
    public $imagen1;
    public $imagen2;
    public $imagen3;
    public $descripcion;
    public $idiomaId;
    public $servicioId;
    public $usuarioId;
    public $intro;

    //constructor

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->preciohora = $args['preciohora'] ?? '';
        $this->imagen1 = $args['imagen1'] ?? '';
        $this->imagen2 = $args['imagen2'] ?? '';
        $this->imagen3 = $args['imagen3'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->idiomaId = $args['idiomaId'] ?? '';
        $this->servicioId = $args['servicioId'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->intro = $args['intro'] ?? '';

    }
    
    public function validar(){

        if(!$this->nombre){
            self::$alertas['error'][] = "Debes añadir un nombre";
        }

        if(!$this->preciohora){
            self::$alertas['error'][] = "Debes añadir un nombre";
        }

        if(strlen($this->intro) > 200){
            self::$alertas['error'][] = "Debes añadir una introducción y no puede tener mas de 200 caracteres";
        }

        if(strlen($this->descripcion) < 200){
            self::$alertas['error'][] = "Debes añadir una descripcion y debe tener al menos 200 caracteres";
        }
        if(!$this->servicioId){
            self::$alertas['error'][] = "Debes seleccionar un servicio";
        }

        if(!$this->imagen1){
            self::$alertas['error'][] = "Debes seleccionar una imagen";
        }

        if(!$this->imagen2){
            self::$alertas['error'][] = "Debes seleccionar una imagen";
        }

        if(!$this->imagen3){
            self::$alertas['error'][] = "Debes seleccionar una imagen";
        }

        return self::$alertas;

    }

}