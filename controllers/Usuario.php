<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
   ## creacion de funcion para la base de datos  y su conexion.
    private $db;
    
   public function  __construct(){
       $this ->db =Database::connect();
}
    

#constructor metodos getter and setter
function getId() {
    return $this->id;
}
# datos suceptibles, limpiados y escqapados.
 function getNombre() {
    return $this->db->real_escape_string($this->nombre);
}

 function getApellido() {
    return $this->db->real_escape_string($this->apellido);
}

 function getEmail() {
    return $this->db->real_escape_string($this->email);
}

 function getPassword() {
    return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT,['cost'=>4]);
    }

 function getRol() {
    return $this->rol;
}

 function getImagen() {
    return $this->imagen;
}

 function setId($id) {
    $this->id = $id;
}

 function setNombre($nombre) {
    $this->nombre = $nombre;
}

 function setApellido($apellido) {
    $this->apellido = $apellido;
}

 function setEmail($email) {
    $this->email = $email;
}

 function setPassword($password) {
    $this->password = $password;
}

 function setRol($rol) {
    $this->rol = $rol;
}

 function setImagen($imagen) {
    $this->imagen = $imagen;
}

public function save(){
    $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidopellido()}','{$this->getNombre()}','{$this->getEmail()}','{$this->getPassword()}','user',null)";
    $save = $this->db->query($sql);
    
    $result =false;
   
    if($save){
        $result = true;
    }
    return $result;
}

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

