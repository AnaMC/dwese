<?php

require_once("classes/vendor/autoload.php");

$loader = new \Twig_Loader_Filesystem(__DIR__ . '/twig');
$twig = new \Twig_Environment($loader);

echo $twig->render('hereda.twig', ['body' => 'reemplazado 1', 'otrocontenido' => 'reemplazado 2']);

//echo $twig->render('hereda.twig');