<?php
class Pelicula{
    private $id, $titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $objgenero, $duracion, $objrestric, $sinopsis;

    public function __construct(){
        $this->id = 0;
        $this->titulo = "";
        $this->actores = "";
        $this->director = "";
        $this->guion = "";
        $this->produccion = "";
        $this->anio = 0;
        $this->nacionalidad = "";
        $this->objgenero = null;
        $this->duracion = 0;
        $this->objrestric = null;
        $this->sinopsis = "";
    }

    public function setear($id, $titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $objgenero, $duracion, $objrestric, $sinopsis){
        
    }

    public function get_id(){
        return $this->id ;
    }
    public function set_id($nuevoParam){
        $this->id = $nuevoParam;
    }
    public function get_titulo(){
        return $this->titulo ;
    }
    public function set_titulo($nuevoParam){
        $this->titulo = $nuevoParam;
    }
    public function get_actores(){
        return $this->actores ;
    }
    public function set_actores($nuevoParam){
        $this->actores = $nuevoParam;
    }
    public function get_director(){
        return $this->director ;
    }
    public function set_director($nuevoParam){
        $this->director = $nuevoParam;
    }
    public function get_guion(){
        return $this->guion ;
    }
    public function set_guion($nuevoParam){
        $this->guion = $nuevoParam;
    }
    public function get_produccion(){
        return $this->produccion ;
    }
    public function set_produccion($nuevoParam){
        $this->produccion = $nuevoParam;
    }
    public function get_anio(){
        return $this->anio ;
    }
    public function set_anio($nuevoParam){
        $this->anio = $nuevoParam;
    }
    public function get_nacionalidad(){
        return $this->nacionalidad ;
    }
    public function set_nacionalidad($nuevoParam){
        $this->nacionalidad = $nuevoParam;
    }
    public function get_objgenero(){
        return $this->objgenero ;
    }
    public function set_objgenero($nuevoParam){
        $this->objgenero = $nuevoParam;
    }
    public function get_duracion(){
        return $this->duracion ;
    }
    public function set_duracion($nuevoParam){
        $this->duracion = $nuevoParam;
    }
    public function get_objrestric(){
        return $this->objrestric ;
    }
    public function set_objrestric($nuevoParam){
        $this->objrestric = $nuevoParam;
    }
    public function get_sinopsis(){
        return $this->sinopsis ;
    }
    public function set_sinopsis($nuevoParam){
        $this->sinopsis = $nuevoParam;
    }
    
    public function cargar(){
        $resp = false;
        if($res = ORM::for_table('peliculas')->find_one($this->get_id())){
            $resp = true;
            $gen = new Genero();
            $gen->set_id_genero($res["id_genero"]);
            $rst = new Restric();
            $rst->set_id_restric($res["id_restric"]);
            $this->setear($res["id"],$res["titulo"],$res["actores"],$res["director"],$res["guion"] ,$res["produccion"],$res["anio"], $res["nacionalidad"],$gen,$res["duracion"], $rst, $res["sinopsis"] );
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $res = ORM::for_table('peliculas')->create();
        $res->titulo = "'".$this->get_titulo()."'";
        $res->actores = "'".$this->get_actores()."'";
        $res->director = "'".$this->get_director()."'";
        $res->guion = "'".$this->get_guion()."'";
        $res->produccion = "'".$this->get_produccion()."'";
        $res->anio = $this->get_anio() ;
        $res->nacionalidad = "'".$this->get_nacionalidad()."'";
        $res->id_genero = $this->get_objgenero()->get_id_genero();
        $res->duracion = $this->get_duracion();
        $res->id_restric = $this->get_id_restric()->get_id_restric();
        $res->sinopsis = "'".$this->get_sinopsis()."'";
        if($res->save()){
            $resp = true;
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $res = ORM::for_table('peliculas')->find_one($this->get_id());
        $res->titulo = "'".$this->get_titulo()."'";
        $res->actores = "'".$this->get_actores()."'";
        $res->director = "'".$this->get_director()."'";
        $res->guion = "'".$this->get_guion()."'";
        $res->produccion = "'".$this->get_produccion()."'";
        $res->anio = $this->get_anio() ;
        $res->nacionalidad = "'".$this->get_nacionalidad()."'";
        $res->id_genero = $this->get_objgenero()->get_id_genero();
        $res->duracion = $this->get_duracion();
        $res->id_restric = "'".$this->get_id_restric()->get_id_restric()."'";
        $res->sinopsis = "'".$this->get_sinopsis()."'";
        
        if($res->save()){
            $resp = true;
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $res = ORM::for_table('peliculas')->find_one($this->get_id());
        if($res->delete()){
            $resp = true;
        }
        return $resp;
    }
}
?>