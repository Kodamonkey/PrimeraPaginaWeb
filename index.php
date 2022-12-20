<?php require "./include/session_start.php"; #Nos permite utilizar las variables de sesion en cualquier vista ?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./include/head.php"; ?>
</head>

<style>
    body{
        background-image: url(https://static.vecteezy.com/system/resources/previews/006/849/610/original/abstract-background-with-soft-gradient-color-and-dynamic-shadow-on-background-background-for-wallpaper-eps-10-free-vector.jpg);
        background-size: cover;
        }
</style>

<body>
    <?php 
        #Pantalla principal, cuando se abre el sitio web

        if(!isset($_GET['vista']) || $_GET['vista'] == ""){
            $_GET['vista']="login";
        }

        /*Se comprueba si seguimos en el view del login en caso de no 
        ser asi, se muestra la view correspondiente al click del usuario*/

        if(is_file("./views/".$_GET['vista'].".php") && $_GET['vista'] != "login" && $_GET['vista'] != "404" && $_GET['vista'] != "signup" && $_GET['vista'] != "eliminar_perfil"){
    ?>
            <main>
                <style>
                body{
                    background-image: url(https://static.vecteezy.com/system/resources/previews/006/849/610/original/abstract-background-with-soft-gradient-color-and-dynamic-shadow-on-background-background-for-wallpaper-eps-10-free-vector.jpg);
                    background-size: cover;
                    /* Rellenamos el fondo */
                    min-height: 100%;
                    min-width: 800px;
                    /* Escalamiento proporcional */
                    width: 100%;
                    height: auto;
                    }
                </style>
    <?php

                #Cerrar sesion forzada, a manera de filtro, para que usuarios que no hayan iniciado sesion no puedan manipular el URL.

                if((!isset($_SESSION['id'])) || ($_SESSION['id']) == "" || (!isset($_SESSION['user'])) || ($_SESSION['user']) == ""){
                    
                    session_destroy(); #Cerrar sesion pues no se han definido al menos uno de las variables de sesion

                    if(headers_sent()){ #Redireccion hacia login
                        echo "<script>window.location.href='index.php?vista=login;</script>";
                    }else{
                        header("Location: index.php?vista=login");
                    }
                    exit(); 
                }

                #Se incluyen todas las vistas de la pagina web

                include "./include/navbar.php";

                include "./views/".$_GET['vista'].".php"; 

                include "./include/script.php";
    ?>
            </main>
    <?php
        }
        else{
            if($_GET['vista'] == "login"){  /*Si no se cumplio lo anterior, significa que estamos aun en el login, o el usuario aun no tiene una cuenta en el sitio web*/ 
                include "./views/login.php";
            }
            elseif($_GET['vista'] == "signup"){
                include "./views/signup.php";
            }
            elseif($_GET['vista'] == "eliminar_perfil"){
                include "./php/eliminar_perfil.php";
            }
            else{
                include "./views/404.php"; #En caso de no existir la vista
            }
        }
    ?>
    <script src="https://kit.fontawesome.com/86566d29b7.js" crossorigin="anonymous"></script>
</body>
</html>