<?php

use izv\tools\Session;
use izv\tools\Reader;
use izv\tools\Util;
require 'classes/autoload.php';

$s = new Session();
$s->set('sesion','ewe');

echo Util::varDump($s->get('sesion'));


//