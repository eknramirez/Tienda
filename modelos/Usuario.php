<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    ## creacion de funcion para la base de datos  y su conexion.
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

#constructor metodos getter and setter

    function getId() {
        return $this->id;
    }

# datos suceptibles, limpiados y escqapados.

    function getNombre() {
        return ($this->nombre);
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
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
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
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

    public function save() {
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','user',null)";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function login() {
        $result = false;
        $email =$this->email;
        $password = $this->password;
        // coprobar si existe el usuario.
        $sql = "SELECT id, password FROM usuarios WHERE email ='$email' ";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows== 1) {
            $usuario = $login->fetch_object();

            //erificar la contraseña ingresada.
            $verify = password_verify($password, $usuario->password);
            
            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}