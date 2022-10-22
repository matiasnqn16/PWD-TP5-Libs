<?php

class CtrlRestric {

    public function queRestricEs($id){
        $es = null;
        if(isset($id)){
            $id = ORM::for_table('restric')->where('id_restric',$id)->find_array();
            $es = $id[0]['restric_detalle'];
        }
        return $es;
    }

    public function listar(){
        $obj = null;
        if($obj = ORM::for_table('restric')->find_array()){
        }
        return $obj;
    }
}



?>