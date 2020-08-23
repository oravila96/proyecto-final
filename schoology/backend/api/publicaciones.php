<?php

header("Content-Type: application/json");   //le envio al cliente un json
include_once("../class/class-publicacion.php");
$_POST = json_decode(file_get_contents('php://input'),true);

switch($_SERVER['REQUEST_METHOD']){
    case 'POST': 
       $publicacion= new Publicacion(
           $_POST['usuario'],
           $_POST['publicacion'],
       
       );

       $publicacion->guardarPublicacion();
    break;
    case 'GET': 
        if (isset($_GET['idUsuario'])){ 
           
        }
        if (isset($_GET['idPost'])){ 

        }
        else{
            //Usuario::obtenerUsuarios();
           // $resultado["mensaje"]="Retornar todos los usuarios";  
           // echo json_encode($resultado); 
        }
           
    break;
    case 'PUT': 
       //Actualizar
    break;
    case 'DELETE': 
        //Eliminar
    break;

}






?>