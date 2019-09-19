 <?php
 session_start();
 require_once 'autoload.php';
 require_once 'config/db.php';
require_once 'config/parameters.php'; #llamado de la base url desde parametros.php
require_once'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php'; //llamado o requerimeinto a la vistar y a barra lateral sidebar
#require_once 'views/usuario/registro.php'; // llamar en la secion deinicio el usuario.

//conexion a la base de datos
//$db = Database::connect();

function Show_error( ){ // funcion de error 
     $error =new errorController( );  // creacion del error en una nueva instancia de errosController
        $error ->index( );
}

if(isset($_GET["controller"] ) ) { //metodo o llamado par pedir controladores
       $nombre_controlador = $_GET["controller"]."controller";
}elseif( !isset($_GET["controller"]) &&  !isset($_GET["action"])){
    $nombre_controlador = controller_default;

}else{
         Show_error( ); //funcion para mostrar error 404 de index.php
         exit( );
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador( );
    
    if(isset($_GET["action"]) && method_exists($controlador, $_GET["action"] ) ) {
        $action = $_GET["action"];
        $controlador->$action( );
        
          }elseif( !isset($_GET["controller"]) &&  !isset($_GET["action"])){
    $nombre_controlador = controller_default;
    $action_default = action_default;
        $controlador->$action_default( );
    }
          else{
              Show_error( );
    }
        }else{
            Show_error( );
    }
require_once 'views/layout/footer.php'; 
