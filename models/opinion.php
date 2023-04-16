<?php 

namespace Model;

class opinion extends activeRecord {

    protected static $tabla = 'opiniones';
    protected static $columnasDB = ['id', 'cuerpo', 'escritorId', 'usuarioId',  'createDate'];


    public $id;
    public $cuerpo;
    public $escritorId;
    public $usuarioId;
    public $createDate;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->cuerpo = $args['cuerpo'] ?? '';
        $this->escritorId = $args['escritorId'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->createDate =  date('Y-m-d');


    }
}