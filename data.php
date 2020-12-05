<?php
@ob_start();
session_start();
use Illuminate\Database\Capsule\Manager as Capsule;
require_once 'funciones.php';
require "vendor/autoload.php";
require "config/database.php";  
if (isset($_SESSION['user'])) {
    $users    = $_SESSION['user'];
    $user = Capsule::table('usuarios')->where('nombre', '=', $users)->first();
    $loggedin = TRUE;

    $name = $user->usuario;
    $apellido= $user->apellido;
    $tipo = $user->tipo;

} else $loggedin = FALSE;
if (isset($_SESSION['tiempo'])) {
    $innactive = 1200; 
    $lifeTime = time() - $_SESSION['tiempo'];
    if ($lifeTime > $innactive) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['tiempo'] = time();
}
 
?>
