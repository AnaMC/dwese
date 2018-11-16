<?php

namespace izv\managedata;

use \izv\data\Usuario;
use \izv\database\Database;

class ManageUsuario {

    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    //id, correo, alias, nombre , clave, activo, fechaalta
    //:id, :correo, :alias, :nombre , :clave, :activo, :fechaalta
    function add(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'insert into usuario values(:id, :correo, :alias, :nombre , :clave, :activo, :fechaalta)';
            if($this->db->execute($sql, $usuario->get())) {
                $resultado = $this->db->getConnection()->lastInsertId();
            }
        }
        return $resultado;
    }

    function edit(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre , activo = :activo, fechaalta = :fechaalta where id = :id';
            $array = $usuario->get();
            unset($array['clave']);
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }

    function editWithPassword(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre , clave = :clave, activo = :activo, fechaalta = :fechaalta where id = :id';
            if($this->db->execute($sql, $usuario->get())) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
    
    function get($id) {
        $usuario = null;
        if($this->db->connect()) {
            $sql = 'select * from usuario where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                if($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                    $usuario->set($fila);
                }
            }
        }
        return $usuario;
    }

    function getAll() {
        $array = array();
        if($this->db->connect()) {
            $sql = 'select * from usuario order by nombre';
            if($this->db->execute($sql)) {
                while($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                    $usuario->set($fila);
                    $array[] = $usuario;
                }
            }
        }
        return $array;
    }

    function remove($id) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'delete from usuario where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
    
      /**
     * Metodo login al que le pasamos correo y clave, este metodo devolverá true  o false, a través del correo que le pasamos se puede decir si se hace el login o no.
     * Devuelve al usuario si hace login, false si no.
     * Ver en dologin.php
     */
     //Al inicio de cada pagina de producto se pone un acomprobación de sesión, de modo que si está logeado se le muestra la página y si no, se le devuelve al index.
    function login($correo, $clave) {
          if($this->db->connect()) {
            $sql = 'select * from usuario where correo = :correo and activo = 1';
            $array = array('correo' => $correo);
            if($this->db->execute($sql, $array)) {
                if($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                    $usuario->set($fila);
                    $resultado = \izv\tools\Util::verificarClave($clave, $usuario->getClave());
                    if($resultado) {
                        return $usuario;
                    }
                }
            }
        }
        return false;
    }
    
}