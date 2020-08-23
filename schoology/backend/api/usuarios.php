<?php
    // session_start();
    header("Content-Type: application/json"); 
    include_once("../class/class-usuario.php");
    
    // if (!isset($_SESSION["token"]))    //Si inicio sesion no existe me redirecciona a la página no autorizada
    //     echo '{"mensaje": "Acceso no autorizado"}';
    //     exit;


    // if (!isset($_COOKIE["TOKEN"])) 
    //     echo '{"mensaje": "Acceso no autorizado"}';
    //     exit;


    // if ($_SESSION["token"] != $_COOKIE["token"])
    //     echo '{"mensaje": "Acceso no autorizado"}';
    //     exit;
    $_POST = json_decode(file_get_contents('php://input'), true);
    switch($_SERVER['REQUEST_METHOD']) { 
        case 'POST':   //GUARDAR
            $usuario = new Usuario(
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['email'],
                $_POST['password'],
                $_POST['gender'],
                $_POST['birthdate'],
                $_POST['cursos']
            );

            $usuario->guardarUsuario();
        break;
        
        case 'GET':
            if (isset($_GET['firstName'])){  //OBTENER UN USUARIO
                Usuario::obtenerUsuario($_GET['firstName']);
            }else{   //OBTENER TODOS USUARIOS
                Usuario::obtenerUsuarios();
            }
        break;
        
        case 'PUT':  //Actualizar
 
        break;
        
        case 'DELETE': //Eliminar

        break;
    }
?>