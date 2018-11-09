<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Util;

require '../classes/autoload.php';

$db = new Database();
$manager = new ManageUsuario($db);
$usuario = Reader::readObject('izv\data\Usuario');
if($usuario->getAlias() === '') {  // Hay que comprobar si la cadena esta vacía para ponerlo a null, esto hay que hacerlo con todos los usuarios que cumplen esta codición 
    $usuario->setAlias(null);
}

$usuario->setClave(Util::encriptar($usuario->getClave())); //Le ponemos el valor de la clave que tenemos encriptada  encriptar() -> está en izv/tools/Util.php

$resultado = $manager->add($usuario);

echo Util::varDump($db->getConnection()->errorInfo());
echo Util::varDump($db->getSentence()->errorInfo());

$db->close();
$url = Util::url() . 'index.php?op=insert&resultado=' . $resultado;
header('Location: ' . $url);