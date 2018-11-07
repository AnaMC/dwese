<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Util;
require 'classes/autoload.php';
$dateTimeVariable = date("F j, Y \a\t g:ia");

$bd = new Database();
$mdb = new ManageUsuario($bd); //Pasar BD!!!


$s = new Usuario('a@a.es','ewe', 'ana', '123456', '1', $dateTimeVariable);
$mdb->add($s); //Agregar usuario creado ^


echo Util::varDump($bd);


