<?php

namespace izv\tools;

class Session {
    //constructor
    function __construct(){
        //Comprobar si existe una sesion
        // _DISABLED = 0 _NONE = 1 _ACTIVE = 2
        if( session_status() != 0 ){
            if(session_status() === 1){
              session_start(); //Iniciamos a reanudamos la sesión  ya que no hay (es 1);
            }
        }
    }
    
    //destroy
    function destruct(){
        session_destroy();
    }
    
     //set
     function set($name, $value){
         $_SESSION[$name] = $value; //Al ser un array asociativo vamos a guaardar en name el valor
         return $this;
     }
     
    //get
    function get($name = null){
        $value = null;
        if(isset($_SESSION[$name])){  //Comprobamos que existe el indice del array asociativo
            $value = $_SESSION[$name]; // Guardamos el valor del                  ^     
        }
        return $value;
    }
    
    //setLogin
    function setLogin($user){
        //Si devuelve 1 -> ok
        //Si devuelve 0 -> errores varios
        if(!isset($_SESSION['user'])){ //Comprobamos si existe la sesión del usuario en user -> donde se guardará al usuario logueado
            $_SESSION['user'] = $user;
            return 1; 
        }
        return 0;
    }
    
    //getLogin
    function getLogin(){
        return $this->get('user'); //Sacamos al usuario logueado (en get ya hemos preguntado si existe);
    }
    
    //logout
    function logout(){
        //Si devuelve 1 -> ok
        //Si devuelve 0 -> errores varios
        if(isset($_SESSION['user'])){ //Si existe la sesión de usuario
            unset ($_SESSION['user']); // con unset borramos el indice asociativo -> user con su valor
            return 1;
        }
        return 0;
    }
    
}