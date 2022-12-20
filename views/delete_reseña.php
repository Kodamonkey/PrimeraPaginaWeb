<?php
	require_once "./php/main.php";

    $id = (isset($_GET['review_id_pelicula_delete'])) ? $_GET['review_id_pelicula_delete'] : 0;
    $id=limpiar_cadena($id);
?>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=mis_reseñas" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
	<?php
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_delete=conexion();
    	#$connection=$check_usuario->query("SELECT * FROM arriendo WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");
        $connection_review = $check_delete->query("SELECT * FROM calificaciones WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");


        if($connection_review->rowCount() == 1){
            $delete_review = $check_delete->query("DELETE FROM calificaciones WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");

            $calificacion_movie = $check_delete->query("SELECT * FROM calificaciones WHERE (id_pelicula = $id)");
            $calificacion_movie_array = $calificacion_movie->fetchAll();
        
            $total_calificaciones = $check_delete->query("SELECT COUNT(id_pelicula) FROM calificaciones WHERE (id_pelicula = $id)");
            $total_calificaciones = (int) $total_calificaciones->fetchColumn();
        
            $cont = 0;
        
            foreach($calificacion_movie_array as $rows){
                $cont = $cont + $rows['puntuacion'];
            }
            
            if($total_calificaciones == 0){
                $new_calificacion = 0;
            }else{
                $new_calificacion = $cont/$total_calificaciones;
            }
            
            $update_calificacion_users = $check_delete->query("UPDATE pelicula SET calificacion_media_blockbusm = $new_calificacion WHERE id = $id ");

            echo '
            <div class="notification is-success is-light">
                <strong>¡Operacion Exitosa!</strong><br>
                Su reseña ha sido eliminada.
            </div>
            ';
            
        }else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    No se ha podido eliminar su reseña.
                </div>
                ';
        }
		$check_delete = null;
	?>
</div>