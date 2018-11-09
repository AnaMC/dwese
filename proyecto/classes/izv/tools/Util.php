<?php

namespace izv\tools;

class Util {

    static function encriptar($cadena, $coste = 10) {
        $opciones = array(
            'cost' => $coste // Las vueltas que daremos para encriptar una clave, cuanto más alta más segura ¡No mas de 12 que tarda la vida!
        );
        return password_hash($cadena, PASSWORD_DEFAULT, $opciones); //Cuando encriptamos en ddistintos momentos encripta de distintas formas
    }
    
    static function url() {
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $parts = pathinfo($url);
        return $parts['dirname'] . '/';
    }

    static function varDump($value) {
        return '<pre>' . var_export($value, true) . '</pre>';
    }

    static function verificarClave($claveSinEncriptar, $claveEncriptada) {
        return password_verify($claveSinEncriptar, $claveEncriptada); //NOs dice si el origen de las claves coincide
    }
}