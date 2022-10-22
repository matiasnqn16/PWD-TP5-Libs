<?php
class Genero{
    private $id_genero, $genero_Detalle;

    public function __construct(){
        $this->id_genero =  0;
        $this->genero_Detalle = "";
    }

    public function setear($id_genero,$genero_Detalle){
        $this->set_id_genero($id_genero);
        $this->set_genero_Detalle($genero_Detalle);
    }

    public function get_id_genero(){
        return $this->id_genero ;
    }
    public function set_id_genero($nIdgenero){
        $this->id_genero = $nIdgenero;
    }
    public function get_genero_Detalle(){
        return $this->genero_Detalle ;
    }
    public function set_genero_Detalle($nResDet){
        $this->genero_Detalle = $nResDet;
    }
    
    public function cargar(){
        $resp = false;
        if($res = ORM::for_table('genero')->find_one($this->get_id_genero())){
            $resp = true;
            $this->setear($res["id_genero"],$res["genero_Detalle"]);
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $res = ORM::for_table('genero')->create();
        $res->genero_Detalle = '"'.$this->get_genero_Detalle().'"';
        if($res->save()){
            $resp = true;
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $res = ORM::for_table('genero')->find_one($this->get_id_genero());
        $res->set('genero_Detalle',$this->get_genero_Detalle());
        if($res->save()){
            $resp = true;
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $res = ORM::for_table('genero')->find_one($this->get_id_genero());
        if($res->delete()){
            $resp = true;
        }
        return $resp;
    }
}
?>