<?php
include_once("../../config.php");
$datos = data_submitted();
$peliculas = new ABMpeliculas();
$listar = $peliculas->listar();
$genero = new CtrlGenero();
$restric = new CtrlRestric();

?>

<?php include_once "../estructura/headerBT.php" ?>

<div class="container bg-dark rounded">
    <div class="row float-right m-3">    
        <div class="col-md-12 float-right">
            <a class="btn btn-success mt-2" role="button" href="editar.php?accion=nuevo">Agregar Nueva Pelicula</a>
        </div>
    </div>
    <div class="row float-left">
        <div class="col-md-12 float-left">
        <?php 
        if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
            echo $datos['msg'];
        }   ?>
        </div>
    </div>

    <?php    
    foreach ($listar as $pelicula ){
        echo '<div class="card p-2 mb-2">
            <div class="row">

                <div class="col-2">
                    <img class="card-img rounded" src="../../src/img/'.$pelicula["id"].'.jpg" alt="Title">
                </div>
                <div class="card-body col-6 pb-2">
                    <h4 class="card-title">'.$pelicula["titulo"].'</h4>
                    <p class="card-text">'.$pelicula["sinopsis"].'</p>
                    <p class="card-text"><i>Actores: </i>'.$pelicula["actores"].'</p>
                    <p class="card-text"><i>Genero: </i>'.$genero->queGeneroEs($pelicula["id_genero"]).'</p>
                    <p class="card-text"><i>Restriccion: </i>'.$restric->queRestricEs($pelicula["id_restric"]).'</p>
                    <p class="card-text"><i>Duración: </i>'.$pelicula["duracion"].' min</p>
                    
                    <div class="float-right">
                    <a class="btn btn-dark" role="button" href="editar.php?accion=editar&id='.$pelicula["id"].'">editar</a>
                    <a class="btn btn-danger" role="button" href="editar.php?accion=borrar&id='.$pelicula["id"].'">borrar</a>
                    </div>

                </div>

            </div>
        </div>';

    }

    ?>
        <div class="row m-3"></div>
    <div class="col-2 bg-primary">
        
    </div>
    
    </div>


</div>


<?php include_once "../estructura/footerBT.php" ?>
