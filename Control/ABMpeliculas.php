<?php 

class ABMpeliculas{

    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $resp = true;
            }
        }
        if($datos['accion']=='borrar'){
            if($this->baja($datos)){
                $resp =true;
            }
        }
        if($datos['accion']=='nuevo'){
            if($this->alta($datos)){
                $resp =true;
            }
            
        }
        return $resp;

    }

    public function alta($param){
        $resp = false;
        $elObjtTabla = ORM::for_table("peliculas")->create();
        
        $GLOBALS['id'] = null;
        $elObjtTabla->titulo = $param["titulo"];
        $elObjtTabla->actores = $param["actores"];
        $elObjtTabla->director = $param["director"];
        $elObjtTabla->guion = $param["guion"];
        $elObjtTabla->produccion = $param["produccion"];
        $elObjtTabla->anio = $param["anio"];
        $elObjtTabla->nacionalidad = $param["nacionalidad"];
        $elObjtTabla->id_genero = $param["genero"];
        $elObjtTabla->duracion = $param["duracion"];
        $elObjtTabla->id_restric = $param["restric"];
        $elObjtTabla->sinopsis = $param ["sinopsis"];

        if ($elObjtTabla!=null and $elObjtTabla->save()){
            $resp = true;
            $GLOBALS['id'] = $elObjtTabla->id();
            
        }
        return $resp;
        
    }

    public function baja($param){
        $resp = false;
        $elObjtTabla = ORM::for_table("peliculas")->find_one($param["id"]);
        if($elObjtTabla->delete()){
            $resp = true;
        }
        return $resp;
    }

    public function modificacion($param){
        $resp = false;
        $obj = ORM::for_table("peliculas")->find_one($param["id"]);

        $obj->titulo = $param["titulo"];
        $obj->actores = $param["actores"];
        $obj->director = $param["director"];
        $obj->guion = $param["guion"];
        $obj->produccion = $param["produccion"];
        $obj->anio = $param["anio"];
        $obj->nacionalidad = $param["nacionalidad"];
        $obj->id_genero = $param["genero"];
        $obj->duracion = $param["duracion"];
        $obj->id_restric = $param["restric"];
        $obj->sinopsis = $param ["sinopsis"];

        if($obj!=null and $obj->save()){
                $resp = true;
        }
        return $resp;
    }
    
    public function buscar($param){
        $obj = null;
        $obj = ORM::for_table("peliculas")->find_one($param["id"]);
        return $obj;
    }
    
    public function listar(){
        $obj = null;
        $obj = ORM::for_table('peliculas')->find_array();
        return $obj;
    }

}




?>
