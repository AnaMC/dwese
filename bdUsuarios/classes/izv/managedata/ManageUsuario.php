<?php

namespace izv\managedata;

use \izv\data\Usuario;
use \izv\database\Database;
use izv\tools\Util;

class ManageUsuario {

    private $db;

    function __construct(Database $db) { //Pasar Bd de tipo base de datos
        $this->db = $db;
    }

    function add(Usuario $usuario) {
        $resultado = 0;
        // echo Util::varDump($usuario);
        if($this->db->connect()) {

            $sql = 'insert into usuario values(null, :correo, :alias, :nombre, :clave, :activo, :fechaAlta)';
            $array = array(
                'correo' => $usuario->getCorreo(), 
                'alias' => $usuario->getAlias(),
                'nombre' => $usuario->getNombre(),
                'clave' => $usuario->getClave(),
                'activo' => $usuario->getActivo(),
                'fechaAlta' => $usuario->getFechaAlta()
            );
            if($this->db->execute($sql, $array)) {

                $resultado = $this->db->getConnection()->lastInsertId();
            }
        }
        return $resultado;
    }
    
// Editar Usuarios

    function edit(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set nombre = :nombre';
            if($this->db->execute($sql, $producto->get())) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }

    function get($id) {
        $producto = null;
        if($this->db->connect()) {
            $sql = 'select * from producto where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                if($fila = $this->db->getSentence()->fetch()) {
                    $producto = new Producto();
                    $producto->set($fila);
                }
            }
        }
        return $producto;
    }

    function getAll() {
        $array = array();
        if($this->db->connect()) {
            $sql = 'select * from producto order by nombre';
            if($this->db->execute($sql)) {
                while($fila = $this->db->getSentence()->fetch()) {
                    $producto = new Producto();
                    $producto->set($fila);
                    $array[] = $producto;
                }
            }
        }
        return $array;
    }

    function remove($id) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'delete from producto where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
}