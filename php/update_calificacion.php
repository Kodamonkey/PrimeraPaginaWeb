<?php

    $puntuacion = limpiar_cadena($_POST['puntuacion']);
    $reseña = limpiar_cadena($_POST['reseña']);
    $id_user_actual = $_SESSION['id'];

    # Verificando campos obligatorios y alerta en caso de no rellenar campos obligatorios

    if($puntuacion == ""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>';
        exit();
    }

    $chek_review = conexion();

    $update_reviews = $chek_review->query("UPDATE calificaciones SET puntuacion = '$puntuacion', reseña = '$reseña' WHERE (id_pelicula = $id AND id_usuario = $id_user_actual)");
    
    $calificacion_movie = $chek_review->query("SELECT * FROM calificaciones WHERE (id_pelicula = $id)");
    $calificacion_movie_array = $calificacion_movie->fetchAll();

    $total_calificaciones = $chek_review->query("SELECT COUNT(id_pelicula) FROM calificaciones WHERE (id_pelicula = $id)");
    $total_calificaciones = (int) $total_calificaciones->fetchColumn();

    $cont = 0;

    foreach($calificacion_movie_array as $rows){
        $cont = $cont + $rows['puntuacion'];
    }

    $new_calificacion = $cont/$total_calificaciones;

    $update_calificacion_users = $chek_review->query("UPDATE pelicula SET calificacion_media_blockbusm = '$new_calificacion' WHERE (id = $id) ");
        
    if($update_calificacion_users->rowCount() <= 1){
        echo '<br>
        <div class="notification is-info is-light">
            <strong>Operacion exitosa</strong><br>
            Su calificacion ha sido guardada. 
        </div>';
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo califcar la pelicula.
        </div>';
    }

?>