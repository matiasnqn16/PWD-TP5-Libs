<?php
include_once("../estructura/headerBT.php");
include_once("../../config.php");
$datos = data_submitted();
$genero = new CtrlGenero();
$restric = new CtrlRestric();
$pelicula = new ABMpeliculas();

$generos = $genero->listar();
$restrics = $restric->listar();


/* modificar esta seccion */
$obj = NULL;
if (isset($datos['id']) && $datos['id'] <> -1) {
    $listaTabla = (array) $pelicula->buscar($datos);
    $obj = $pelicula->buscar($datos);
}
?>

<div class="container mt-2 pb-1 bg-light rounded">

    <h3 class="gradient-casero rounded px-2 "><?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose" ?> Film</h3>
    <a href="index.php" class="btn btn-secondary mb-3">Volver</a>

    <form id="cinema" name="cinema" method="post" action="accion.php" class="row gx-3 align-items-center needs-validation" enctype="multipart/form-data" novalidate>

    <input id="id" name ="id" type="hidden" value="<?php echo ($obj !=null) ? $obj->id : "-1"?>" readonly required >
    <input id="accion" name ="accion" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" type="hidden">

        <div class="col-6">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" value="<?php echo ($obj !=null) ? $obj->titulo : ""?>" name="titulo" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="actores" class="form-label">Actores</label>
            <input type="text" class="form-control" id="actores" value="<?php echo ($obj !=null) ? $obj->actores : ""?>" name="actores" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control" id="director" value="<?php echo ($obj !=null) ? $obj->director : ""?>" name="director" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="guion" class="form-label">Guion</label>
            <input type="text" class="form-control" id="guion" value="<?php echo ($obj !=null) ? $obj->guion : ""?>" name="guion" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="produccion" class="form-label">Produccion</label>
            <input type="text" class="form-control" id="produccion" value="<?php echo ($obj !=null) ? $obj->produccion : ""?>" name="produccion" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="anio" class="form-label">Año</label>
            <input type="date" class="form-control" id="anio" value="<?php echo ($obj !=null) ? $obj->anio : ""?>" name="anio" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="nacionalidad" value="<?php echo ($obj !=null) ? $obj->nacionalidad : ""?>" name="nacionalidad" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-6">
            <label for="genero" class="form-label">Genero</label>
            <select class="form-select" aria-label=".form-select-sm example" name="genero" id="genero" required>
                <?php
                foreach ($generos as $gen) {
                    if($gen["id_genero"] == $obj->id_genero){
                        $val = "selected";
                    }
                    echo '<option value="' . $gen["id_genero"] . '" '.$val.' >' . $gen["genero_Detalle"] . '</option>';
                }
                ?>
            </select>
            <div class="invalid-feedback">Debe ingresar genero</div>
        </div>

        <div class="col-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="number" class="form-control" id="duracion" max=999 value="<?php echo ($obj !=null) ? $obj->duracion : ""?>" name="duracion" placeholder="minutos" required>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-9 mt-1">
            <label for="restric" class="form-label">Restricciones de edad</label>
            
            <select class="form-select" aria-label=".form-select-sm example" name="restric" id="restric" required>
                <?php
                foreach ($restrics as $res) {
                    $val = "";
                    if($res["id_restric"] == $obj->id_restric){
                        $val = "selected";
                    }
                    echo '<option value="' . $res["id_restric"] . '" '.$val.' >' . $res["restric_detalle"] . '</option>';
                }
                ?>
            </select>
            <div class="invalid-feedback">debe ingresar una opcion</div>
        </div>

        <div class="col-12 mb-2">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control " id="sinopsis" name="sinopsis" required><?php echo ($obj !=null) ? $obj->sinopsis : ""?></textarea>
        </div>

        <div class="col-6">
            <label for="formFile" class="form-label">Cargar imagen</label>
            <input class="form-control" type="file" name="miFile" id="miFile">
        </div>
        
        <div class="row m-2">
        </div>
        <div class="col-3 align-content-md-end">
            <button class="btn btn-primary" type="submit"><?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose" ?></button>
            <button class="btn btn-secondary" type="reset">Limpiar</button>
        </div>


    </form>

</div>
<!-- cierra container -->
<script src="../js/fnt-pag.js"></script>

<?php
include_once("../estructura/footerBT.php")
?>