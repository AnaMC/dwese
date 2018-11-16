<?php

use izv\data\Producto;
use izv\database\Database;
use izv\managedata\ManageProducto;
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


$db = new Database();
$manager = new ManageProducto($db);
$producto = Reader::readObject('izv\data\Producto');
$resultado = $manager->edit($producto);
$db->close();
$url = Util::url() . 'index.php?op=editproducto&resultado=' . $resultado;
header('Location: ' . $url);