<?php

namespace izv\data;

class Usuario {
    
    use \izv\common\Common;

    private $id,
            $correo,
            $alias,
            $nombre,
            $clave,
            $activo,
            $fechaAlta;
    
        function __construct($correo = null, $alias = null, $nombre = null, $clave = null, $activo = null, $fechaAlta = null) {
        
        $this->correo = $correo;
        $this->alias = $alias;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->activo = $activo;
        $this->fechaAlta = $fechaAlta;
    }

    //GET

    function getId() {
        return $this->id;
    }

    function getCorreo(){
        return $this->correo;
    }
    
    function getAlias(){
        return $this->alias;
    }

    function getNombre() {
        return $this->nombre;
    }
    
    function getClave(){
        return $this->clave;
    }

    function getActivo(){
        return $this->activo;
    }

    function getFechaAlta(){
        return $this->fechaAlta;
    }
    
    //SET
    
    function setId($id) {
        $this->id = $id;
    }
    
     function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setAlias($alias){
        $this->alias=$alias;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setFechaAlta($fechaAlta){
        $this->fechaAlta = $fechaAlta;
    }
}