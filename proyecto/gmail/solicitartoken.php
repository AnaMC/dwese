<?php


/**No ejecutar las pagina de almacenartoken.php más de una vez ¡¡Solo se puede una!! si nos qeuivocamos hay que borrar el id del cliente de OAuth y repetir esl proceso,
pero eso sólo se puede hacer una vez, ya que si no, nos dará millones de problemas**/

session_start();
require_once 'vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('TU_PROYECTO');
$cliente->setClientId('TU_ID');
$cliente->setClientSecret('TU_SECRET');
$cliente->setRedirectUri('TU_PAGINA_PARA_GUARDAR_LA_AUTORIZACION');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessType('offline');
if (!$cliente->getAccessToken()) {
    $auth = $cliente->createAuthUrl();
    header("Location: $auth");
}