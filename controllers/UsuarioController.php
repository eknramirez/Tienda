<?php

require_once 'modelos/usuario.php';

class usuarioController {

    public function index() {
        echo "Controlador Usuarios, Accion index";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

// esta funcion lo que hace es que recolecta lo que se carga en el formulario.
    // puesto que con el metodo post se recibe la informacion mandada desde el formulario.
    public function save() {
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            if($nombre &&$apellidos && $email && $password) {

                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellido($_apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);

                    $save = $usuario->save(); //guarda los registros en la base de datos
                    if ($save) {
                        #echo "Registro completado con exito. ";
                        $_SESSION['register'] = "complete";
                    } else {
                        #echo"Registro fallido";
                        $_SESSION['register'] = "failed";
                    }
                } else {
                    $_SESSION['register'] = "failed";
                }
          } else {
                $_SESSION['register'] = "failed";
            }
          
                header("Location:" . base_url . 'usuario/registro');
                # var_dump($usuario);
            }
        
        
    public function login() {
        
        if(isset($_POST)){
            //identificar el usuario.
            // realizar consulta a la base de datos para comprbar credenciales
            $usuario = new Usuario();
            $usuario->setEmail($_POST['Email']);
            $usuario->setPassword($_POST['password']);
            
            $identify=$usuario->login();
            #var_dump($identify);
            #die();
             if($identify && is_object($identify)){
                 $_SESSION['identity'] = $identify;
                 
                 if($identify->role =='admin'){
                     $_SESSION['admin']= true;
                 }
             }else{
                 $_SESSION['error_login'] = 'Identificacion Fallida';
                 }
        
         
            // crear una secion
        }
        header ("Location:".base_url);
    }
}