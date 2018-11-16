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
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre, clave = :clave, activo = :activo, fechaAlta = :fechaAlta where id = :id';
            if($this->db->execute($sql, $usuario->get())) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
    
//Delete

    function remove($id) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'delete from usuario where id = :id';
            $params = array(
                'id' => $id
            );
            // echo 'entro';
            if($this->db->execute($sql, $params)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
    
}