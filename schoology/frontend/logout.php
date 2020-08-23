<?php

    session_start();
    session_destroy();
    setcookie("token","",time()-1,"/");
    setcookie("firstName","", time()-1, "/");  
    setcookie("lastName","", time()-1, "/");
    setcookie("email","", time()-1, "/");
    echo '{"codigoResultado":0, "mensaje": "Usuario/Password incorrecto"}';

    header("Location: inicio-sesion.html");




?>