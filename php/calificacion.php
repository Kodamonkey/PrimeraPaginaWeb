<?php
    $calificacion = limpiar_cadena($_POST['puntuacion']);
    $reseña = limpiar_cadena($_POST['reseña']);
    $id_user_actual = $_SESSION['id'];

    # Verificando campos obligatorios y alerta en caso de no rellenar campos obligatorios

    if($calificacion == ""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>';
        exit();
    }

    $chek_review = conexion();

    $insert_reviews = $chek_review->query("INSERT INTO calificaciones(id_usuario, id_pelicula, puntuacion, reseña) VALUES ('$id_user_actual', '$id', '$calificacion', '$reseña')");
    $calificacion_movie = $chek_review->query("SELECT * FROM calificaciones WHERE (id_pelicula = $id)");

    $total_calificaciones = $chek_review->query("SELECT COUNT(id_pelicula) FROM calificaciones WHERE (id_pelicula = $id)");
    $total_calificaciones = (int) $total_calificaciones->fetchColumn();

    if($calificacion_movie->rowCount() > 0){
        $calificacion_movie = $calificacion_movie->fetchAll();
        $cont = 0;
        foreach($calificacion_movie as $rows){
            if($cont == 0){
                $cont = $rows['puntuacion'];
            }else{
                $cont = $cont + $rows['puntuacion'];
            }
        }
        $cont = $cont/$total_calificaciones;
        $update_calificacion_users = $chek_review->query("UPDATE pelicula SET calificacion_media_blockbusm = $cont WHERE id = $id");

        if($insert_reviews->rowCount() == 1){
            echo '<br>
            <div class="notification is-info is-light">
                <strong>Operación exitosa</strong><br>
                Su calificación ha sido guardada. 
            </div>';
        }else{
            echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo guardar la calificación.
            </div>';
        }
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No se pudo calificar la película.
        </div>';
    }

?>