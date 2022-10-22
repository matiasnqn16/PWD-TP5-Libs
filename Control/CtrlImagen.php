<?php


class CtrlImagen{

    public function subirImagen()
    {

        $nombreArchivoImagen = $_FILES['miFile']['name'];

        $dir = "../../src/img/";

        $error = "";
        $todoOK = true;

        /*Primero subamos la imagen*/
        /*Veamos si se pudo subir a la carpeta temporal*/
        if ($_FILES["miFile"]["error"] <= 0) {
            $todoOK = true;
            $error = "";
        } else {
            $todoOK = false;
            $error = "ERROR: no se pudo cargar el archivo de imagen. No se pudo acceder al archivo Temporal";
        }

        //El control del tipo ya lo tengo en el formulario, asi que no lo voy a controlar acá.
        //Si, voy a controlar el tema del tamaño

        if ($todoOK && $_FILES['miFile']["size"] / 1024 > 2048) {
            $error = "ERROR: El archivo " . $nombreArchivoImagen . " supera los 2 Mb.";
            $todoOK = false;

/*             $nombreArchivoImagen=substr($nombreArchivoImagen,0, strlen($nombreArchivoImagen)-4);
 */            $nombreArchivoImagen = $GLOBALS['id'].".jpg";
        }

        // Intentamos copiar el archivo al servidor.
/*         if ($todoOK && !copy($_FILES['miFile']['tmp_name'], $dir . $nombreArchivoImagen)) { */
            if ($todoOK && !copy($_FILES['miFile']['tmp_name'], $dir . $GLOBALS['id'].".jpg")) {
                $texto = "ERROR: no se pudo cargar el archivo de imagen.";
            $todoOK = false;
        }

        if ($todoOK)
            $texto = "La nueva especie se ha ingresado correctamente!";
        else
            $texto = $error;

        return $texto;

    }



}
            
            ?>