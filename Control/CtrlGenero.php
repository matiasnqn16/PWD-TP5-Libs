<?php

class CtrlGenero {

    public function queGeneroEs($id){
        $es = null;
        if(isset($id)){
            $id = ORM::for_table('genero')->where('id_genero',$id)->find_one();
            $es = $id['genero_Detalle'];
        }
        return $es;
    }

    public function listar(){
        $obj = null;
        if($obj = ORM::for_table('genero')->find_array()){
        }
        return $obj;
    }
}


?>