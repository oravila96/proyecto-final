<?php
    session_start();  
    header("Content-Type: application/json"); 
    include_once("../class/class-usuario.php");
    $_POST = json_decode(file_get_contents('php://input'), true);  
    switch($_SERVER['REQUEST_METHOD']) { 
        case 'POST':   
            
            $usuario = Usuario::verificarUsuario($_POST['email'], $_POST['password']); 
            if ($usuario){
                 
                
                      $resultado= array(  
                      "codigoResultado"=>1,
                      "mensaje"=>"Usuarios Autenticado",
                      "token"=>sha1(uniqid(rand(),true))
                      );
                      $_SESSION["token"] = $resultado["token"];
                      setcookie("token",$resultado["token"],time()+(60*60*24*31),"/");
                      setcookie("firstName",$usuario["firstName"], time() + (60*60*24*31), "/"); 
                      setcookie("lastName",$usuario["lastName"], time() + (60*60*24*31), "/");
                      setcookie("email",$usuario["email"], time() + (60*60*24*31), "/");
                      echo json_encode($resultado);  
            }else {
                setcookie("token","",time()-1,"/"); 
                setcookie("firstName","", time()-1, "/");  
               setcookie("lastName","", time()-1, "/");
               setcookie("email","", time()-1, "/");
                echo '{"codigoResultado":0, "mensaje": "Usuario/Password incorrecto"}';
            }     
            
               
        break;
    }
?>