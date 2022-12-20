<?php

    $busqueda = $_POST['txt_buscador'];

    $conexion_search_movie= conexion();
    $conexion_search_movie = $conexion_search_movie -> query("SELECT * FROM pelicula WHERE pelicula.nombre LIKE '%$busqueda%'");

    if(isset($busqueda) && $busqueda != "" && $conexion_search_movie->rowCount()>0){
        echo '
        <div class="notification is-info is-light">
            <strong>Usted busco:'." ".$busqueda. '</strong><br>
            Estas peliculas coinciden con su busqueda:
        </div>';
        while ($row = $conexion_search_movie->fetch()){
            echo '
            <div class="box">
                <center><p class = "subtitle"><b>'.$row['nombre'].'</b></p></center><br> 
                <center><a href="index.php?vista=catalogo_buscador&pelicula_id_perfil='.$row['id'].'" class="button is-info is-rounded">Ir a la pelicula</a></center>
            </div>
            '; 
        }
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Lo sentimos!</strong><br>
            Ninguna pelicula coincide con su busqueda.
        </div>';
    }
    $conexion_search_movie = null;
?>