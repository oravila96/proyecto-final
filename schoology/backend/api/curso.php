<?php
    // session_start();
    header("Content-Type: application/json"); 
    include_once("../class/class-curso.php");
    
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
            // $usuario = new Usuario(
            //     $_POST['firstName'],
            //     $_POST['lastName'],
            //     $_POST['email'],
            //     $_POST['password'],
            //     $_POST['gender'],
            //     $_POST['birthdate']
            // );

            // $usuario->guardarUsuario();
        break;
        
        case 'GET':
            if (isset($_GET['firstName'])){  //OBTENER UN USUARIO
                Curso::obtenerCurso($_GET['firstName']);
            }else{   //OBTENER TODOS USUARIOS
                Curso::obtenerCursos();
            }
        break;
        
        case 'PUT':  //Actualizar
 
        break;
        
        case 'DELETE': //Eliminar

        break;
    }
?>