<?php

session_start();
if (!isset($_SESSION["token"]))    //Si inicio session no existe me redirecciona a la página de login
    header("Location: inicio-sesion.html");


if (!isset($_COOKIE["token"]))
    header("Location: inicio-sesion.html");


if ($_SESSION["token"] != $_COOKIE["token"])
    header("Location: inicio-sesion.html");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Schoology</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type=" text/css" href="css/estilos1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://www.schoology.com/sites/default/files/favicon_0.ico" type="image/vnd.microsoft.icon" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="http://localhost/schoology/frontend/home.php"><img style="height: 1.8vw;" src="img/header-logo-transparent.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" style="padding-left: 2vw;">
                <li class="nav-item active" style="height: 1.8vw;">
                    <a style="color: white;font-family: Muli,sans-serif;padding-top:1vw;" class="nav-link" href="#"><B>CURSOS</B><span class="sr-only">(current)</span></a>
                <li class="nav-item active" style="height: 1.8vw;">
                    <a style="color: white;font-family: Muli,sans-serif;padding-top:1vw;padding-right:1vw;padding-left:1vw" class="nav-link" href="#"><B>GRUPOS</B><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a style="color: white;font-family: Muli,sans-serif;padding-top:1vw;" class="nav-link" href="#"><B>RECURSOS</B></a>
                </li>
                <li class="nav-item">
                    <a style="color: white;font-family: Muli,sans-serif;padding-top:1vw;padding-left:1vw" class="nav-link" href="#"><B>CALIFICACIONES</B></a>
                </li>
                <li><button id="li" style="background-color: #0677BA; border:none;color:#C7D8E2;margin-top:1vw;margin-left:28vw;" type="search"><i class="fas fa-search"></i></button></li>
                <li><button id="li" style="background-color: #0677BA; border:none;color:#C7D8E2;margin-top:1vw;margin-left:2vw;"><i class="far fa-calendar-alt"></i></button></li>
                <li><button id="li" style="background-color: #0677BA; border:none;color:#C7D8E2;margin-top:1vw;margin-left:2vw;"><i class="far fa-envelope"></i></button></li>
                <li><button id="li" style="background-color: #0677BA; border:none;color:#C7D8E2;margin-top:1vw;margin-left:2vw;margin-right:1.5vw"><i class="far fa-bell"></i></button></li>
                <li class="nav-item dropdown pl-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style="color: white;"><i class="fas fa-user-circle" style="font-size: 25px;"></i> <?php echo $_COOKIE["firstName"] ?></span>
                    </a>
                    <div class="dropdown-menu" style="background-color: #024F7D;" aria-labelledby="navbarDropdownMenuLink">
                        <a style="color:white;" class="dropdown-item" href="#">Su perfil</a>
                        <a style="color:white;" class="dropdown-item" href="#">user school</a>
                        <a style="color:white;" class="dropdown-item" href="#">Configuración</a>
                        <a style="color:white;" class="dropdown-item" href="logout.php">Cierre de Sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid" style="background-color:#FAF9F7;margin-bottom:1vw;">
        <div class="row">
            <div id="contenido" class="col-xl-6">
                <div style="padding-top: 2vw;width:60vw;height:42.5vw;background-color:#FAF9F7;">
                    <button type="button" style="border: none;background-color:#FAF9F7;margin-left:10vw;"><span>ACTIVIDAD RECIENTE</span></button>
                    <button type="button" style="border: none;background-color:#FAF9F7;margin-left:4vw;" onclick="verCurso()"><span>PANEL DE CURSOS</span></button>
                    <div style="width: 83%;margin-top:2vw;background-color:white;margin-left:7vw;padding-top:1vw;">
                        <span>Publicar: <i class="fas fa-comments"></i></span><button style="border: none;background-color:white;" type="button">Publicación</button><br>
                        <div id="registroPublicacion"></div>
                        <div>
                            <form>
                                <input style="border:none;background-color:white;width:33vw;" type="text" placeholder="Escribe una publicación" id="publicacionGuardada">
                                <button style="border:none;background-color:white;" type="button" onclick="publicaciones()"><i class="fas fa-share"></i> Publicar</button>
                            </form>
                        </div>
                    </div>
                    <div id="curso-actual" style="width: 83%;margin-top:2vw;background-color:white;margin-left:7vw;padding-top:1vw;height:18vw;margin-bottom:1cm">
                        
                        <!-- <button type="button" style="margin-left:13vw;border:none;margin-bottom:1vw"><img style="width: 15vw;height:12vw;" src="img/PORTADA-PROGRAMACIÓN-ORIENTADA-978x652.png" alt=""></button><br>
                        <div style="padding-left:8vw;">
                            <span>IS410-Programación Orientada a Objetos: II2020</span>
                        </div> -->
                        
                    </div>

                    <div id="curso" style="height: 15vw;background-color:white;margin-left:7vw;padding-top:1vw;width:68%;">
                        <!-- <span><i class="far fa-folder"></i>Documentos</span> -->
                    </div>


                </div>
            </div>
            <div class="col-xl-6" style="padding-left: 10vw;padding-top:6vw;background-color:#FAF9F7;margin-bottom:12vw;">
                <div style="padding-top: 1vw;width:28vw;height:32vw;background-color:white;font-size:14px;">
                    <div><span style="padding-left: 2vw;"><b>Actividades Próximas</b></span></div>
                    <div style="padding-top: 1vw;"><span style="padding-left: 2vw;padding-top:2vw;">JUEVES, 20, AGOSTO, 2020 </span></div>
                    <div style="padding-top: 1vw;;">
                        <span style="padding-left: 2vw;"><i class="fas fa-file-import"></i> Subir exámen práctico, Unidad II</span><br>
                        <span style="padding-left: 2vw;">9:00 am</span>
                    </div>
                    <div style="padding-top: 1vw;">
                        <span style="padding-left: 2vw;"><i class="fas fa-file-import"></i> Tarea 3</span><br>
                        <span style="padding-left: 2vw;">9:00 am</span>
                    </div>
                    <div style="padding-top: 1vw;">
                        <span style="padding-left: 2vw;"><i class="fas fa-file-import"></i> Tarea 4</span><br>
                        <span style="padding-left: 2vw;">9:00 am</span>
                    </div>
                    <div style="padding-top: 1vw;"><span style="padding-left: 2vw;padding-top:2vw;">SÁBADO, 22, AGOSTO, 2020 </span></div>
                    <div style="padding-top: 1vw;">
                        <span style="padding-left: 2vw;"><i class="fas fa-file-import"></i> Entrega Proyecto Final</span><br>
                        <span style="padding-left: 2vw;">9:00 am</span>
                    </div>
                    <div style="padding-top: 1vw;"><span style="padding-left: 2vw;padding-top:2vw;">LUNES, 24, AGOSTO, 2020 </span></div>
                    <div style="padding-top: 1vw;">
                        <span style="padding-left: 2vw;"><i class="fas fa-file-import"></i> Subir exámen de reposición</span><br>
                        <span style="padding-left: 2vw;">9:00 am</span>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div style="height: 3.85vw;background-color:#024F7D;width:100%;padding-top:1vw;color:white;padding-left:1.5vw">


        <a href="https://app.schoology.com/home/recent-activity"><span id="li" style="margin-right: 35vw;font-family: 'Mulish', sans-serif;font-size:14px;color:white;"><b>Español</b></span></a>
        <a href="https://support.schoology.com/hc/es"><span id="li" style="font-family: 'Mulish', sans-serif;font-size:14px;color:white;"><b>Soporte</b></span></a>
        <span style="margin-left: 1vw;margin-right:1vw;">|</span>
        <a href="https://www.schoology.com/blog"><span id="li" style="font-family: 'Mulish', sans-serif;font-size:14px;color:white;"><b>Blog de schoology</b></span></a>
        <span style="margin-left: 1vw;margin-right:1vw;">|</span>
        <a href="https://www.schoology.com/privacy/es"><span id="li" style="font-family: 'Mulish', sans-serif;font-size:14px;color:white;"><b>POLÍTICA DE PRIVACIDAD</b></span></a>
        <span style="margin-left: 1vw;margin-right:1vw;">|</span>
        <a href="https://www.schoology.com/terms-of-use/es"><span id="li" style="margin-right: 6vw;font-family: 'Mulish', sans-serif;font-size:14px;color:white;"><b>Condiciones de uso</b></span></a>
        <span style="font-family: 'Mulish', sans-serif;font-size:14px;color:white;"><b>Schoology © 2020</b></span>


    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/controlador-usuarios.js"></script>
</body>

</html>