<?php
class Restric{
    private $id_restric, $restric_detalle;

    public function __construct(){
        $this->id_restric =  0;
        $this->restric_detalle = "";
    }

    public function setear($id_restric,$restric_detalle){
        $this->set_id_restric($id_restric);
        $this->set_restric_detalle($restric_detalle);
    }

    public function get_id_restric(){
        return $this->id_restric ;
    }
    public function set_id_restric($nIdRestric){
        $this->id_restric = $nIdRestric;
    }
    public function get_restric_detalle(){
        return $this->restric_detalle ;
    }
    public function set_restric_detalle($nResDet){
        $this->restric_detalle = $nResDet;
    }
    
    public function cargar(){
        $resp = false;
        if($res = ORM::for_table('restric')->find_one($this->get_id_restric())){
            $resp = true;
            $this->setear($res["id_restric"],$res["restric_detalle"]);
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $res = ORM::for_table('restric')->create();
        $res->restric_detalle = '"'.$this->get_restric_detalle().'"';
        if($res->save()){
            $resp = true;
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $res = ORM::for_table('restric')->find_one($this->get_id_restric());
        $res->set('restric_detalle',$this->get_restric_detalle());
        if($res->save()){
            $resp = true;
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $res = ORM::for_table('restric')->find_one($this->get_id_restric());
        if($res->delete()){
            $resp = true;
        }
        return $resp;
    }
}
?>