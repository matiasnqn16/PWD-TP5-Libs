<?php
    include_once("../estructura/headerBT.php");
    include_once("../../config.php");
    $datos = data_submitted();
    $resp = false;
$objTrans = new ABMpeliculas();
$cargaImg = new CtrlImagen();
?>

</main>
<?php

$prueba = "";

if (isset($datos['accion'])){
    $resp = $objTrans->abm($datos);
    if($resp){
        $mensaje = "<div class='alert alert-success' role='alert'>La accion ".$datos['accion']." se realizo correctamente.</div>";
        if($datos['accion']== "nuevo"){

            $prueba = $cargaImg->subirImagen();

        }


    }else {
        $mensaje = "<div class='alert alert-danger' role='alert'>La accion ".$datos['accion']." no pudo concretarse.</div>";
    }
    //echo $mensaje;
    echo '<script>location.href = "./index.php?msg='.$mensaje.'";</script>';
    echo $prueba;
    echo '<br><a href="index.php">Volver</a><br>';
}

    ?>
