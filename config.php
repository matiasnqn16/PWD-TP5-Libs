<?php
$GLOBALS['ROOT'] =$_SERVER['DOCUMENT_ROOT'] ."/PWD_TPMVC/";
include_once("utiles/funciones.php");
include_once("Control/ABMpeliculas.php");
include_once("Control/CtrlGenero.php");
include_once("Control/CtrlRestric.php");
include_once("Control/CtrlImagen.php");
include_once("vendor/j4mie/idiorm/idiorm.php");
ORM::configure('mysql:host=localhost;dbname=cinema_db');
ORM::configure('username', 'root');
ORM::configure('password', '');

/* require "vendor/autoload.php";
 */
?>