<?php
include_once('../config.php');


echo "<br>--------------------------------------<br>";

$consulta = ORM::for_table('peliculas')->where('produccion','Neil Canton, Bob Gale')->find_one();
echo "El id es: ". $consulta->id;

echo "<br>--------------------------------------<br>";

$consultas = ORM::for_table('genero')->find_many();
foreach($consultas as $consulta){
    echo $consulta->genero_Detalle . "<br>" ;
}

echo "<br>--------------------------------------<br>";

/* $nuevo = ORM::for_table('persona')->create();
$nuevo->nombre = "hola";
$nuevo->edad = 23;
$nuevo->save();
$id = $nuevo->id();
echo "se genero la id:  ". $id . "<br>"; */

echo "<br>--------------------------------------<br>";
/* 
if($borrar = ORM::for_table('persona')->where('nombre','hola')->find_many()){
    
    echo  "vamos a borrar la persona de edad de : ";

    
    if($borrar->delete_many()){
        echo "se borro la personas";
    }else{
        echo "No se encuentra la persona";
    }

}else{

}
 */
$es = $person = ORM::for_table('persona')
->where_equal('nombre', "hola")
->delete_many();
echo $es;




?>