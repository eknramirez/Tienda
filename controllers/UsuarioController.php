<?php

class usuarioController {

    public function index() {
        echo "controlador usuarios accion index";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }
// esta funcion lo que hace es que recolecta lo que se carga en el formulario.
    // puesto que con el metodo post se recibe la informacion mandada desde el formulario.
    public function save() {
         if(isset($_POST)){
            var_dump($_POST);
        }
        
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

