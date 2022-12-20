<?php 

    /*Vista en donde se crea el cierre de sesion */
    
    session_destroy(); #Cerrar la sesion que se inicio en index.php

    if(headers_sent()){ #Redireccion hacia login
        echo "<script>window.location.href='index.php?vista=login';</script>";
    }else{
        header("Location: index.php?vista=login");
    }
    
?>