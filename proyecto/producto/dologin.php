<?php

use izv\app\App;
use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Util;

require '../classes/autoload.php';


//Al inicio de cada pagina de producto se pone un acomprobación de sesión, de modo que si está
//logeado se le muestra la página y si no, se le devuelve al index.

$sesion = new Session(App::SESSION_NAME);
if(!$sesion->isLogged()) {
    header('Location: ..');
    exit();
}

$correo = Reader::read('correo');
$clave = Reader::read('clave');

$db = new Database();
$manager = new ManageUsuario($db);
$result = $manager->login($correo, $clave);
$resultado = 0;
if($result) {
    $sesion = new Session(App::SESSION_NAME);
    $sesion->login($result);
    $resultado = 1;
}

$url = Util::url() . '../index.php?op=login&resultado=' . $resultado;
header('Location: ' . $url);