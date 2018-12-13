<?php

namespace izv\data;

class Usuario {

    use \izv\common\Common;

    private $id, $correo, $alias, $nombre , $clave, $activo, $fechaalta;

    function __construct($id = null, $correo = null, $alias = null, $nombre = null, $clave = null, $activo = 0, $admin = 0, $fechaalta = null) {
        $this->id = $id;
        $this->correo = $correo;
        $this->alias = $alias;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->activo = $activo;
        $this->admin = $admin;
        $this->fechaalta = $fechaalta;
    }

    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getAlias() {
        return $this->alias;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function getActivo() {
        return $this->activo;
    }

    function getAdmin() {
        return $this->admin;
    }

    function getFechaalta() {
        return $this->fechaalta;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setAdmin($admin) {
        $this->$admin = $admin;
    }
    
    function setFechaalta($fechaalta) {
        $this->fechaalta = $fechaalta;
    }

}