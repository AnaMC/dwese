<?php
session_start();
require_once '../classes/vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('CorreoWeb');
$cliente->setClientId('718777178058-g981n09mmc5tn06fhka6ukbo3uso4tgi.apps.googleusercontent.com');
$cliente->setClientSecret('w7NwS6ukpKA8glU0JvbrsSVv');
$cliente->setRedirectUri('https://curso1819-izvdamdaw.c9users.io/proyecto/gmail/obtenerecredenciales.php');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessType('offline');
if (isset($_GET['code'])) {
    $cliente->authenticate($_GET['code']);
    $_SESSION['token'] = $cliente->getAccessToken();
    $archivo = "token.conf";
    $fh = fopen($archivo, 'w') or die("error");
    fwrite($fh, json_encode($cliente->getAccessToken()));
    fclose($fh);
    header("Location: finalizartoken.php?code=" . $_GET['code']);
}