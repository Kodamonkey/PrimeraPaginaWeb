<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_devolver'])) ? $_GET['pelicula_id_devolver'] : 0;
    $id=limpiar_cadena($id);
?>

<br>
<div class="title is-child box">
    <center><h1 class="title">Devolver película</h1></center>
    <br> 
</div>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=peliculas" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
	<?php
    
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_arriendo=conexion();
    	$connection = $check_arriendo->query("SELECT * FROM arriendo WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");

        if($connection->rowCount() == 1){
            $connection_1 = $check_arriendo->query("DELETE FROM arriendo WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");
            
            $conn_movie_actual = $check_arriendo->query("SELECT * FROM pelicula WHERE (id = $id)");
            $conn_user_actual = $check_arriendo->query("SELECT * FROM usuario WHERE (id_usuario = $id_user_actual)");

            $conn = $conn_movie_actual->fetchAll();

            $conn_user = $conn_user_actual->fetchAll();

            #Actualizar los atributos de las peliculas que se ven afectados por devolver una pelicula

            foreach($conn as $rows){
                $cont_1 = $rows['ejemplares_disponibles'];
                if($conn_movie_actual->rowCount() == 1){
                    if($cont_1 == 0){
                        $cont_1 = 0;
                    }else{
                        $cont_1 = $cont_1 + 1;
                    }
                    $update_ejemplares_disponibles = $check_arriendo->query("UPDATE pelicula SET ejemplares_disponibles = $cont_1 WHERE id = $id"); 
                }
            }

            #Actualizar los atributos de las peliculas que se ven afectados por el arriendo de una pelicula

            foreach($conn_user as $rows){
                $cont = $rows['rentadas_actualmente'];
                if($conn_user_actual->rowCount() == 1){
                    if($cont == 0 and $_SESSION['rentadas_actualmente'] == 0){
                        $cont = 0;
                        $_SESSION['rentadas_actualmente'] = 0;
                    }else{
                        $cont = $cont - 1;
                        --$_SESSION['rentadas_actualmente'];
                    }
                    $update_rentadas_actualmente = $check_arriendo->query("UPDATE usuario SET rentadas_actualmente = $cont WHERE id_usuario = $id_user_actual");  
                }
            }
            
            echo '
                <div class="notification is-info is-light">
                    <strong>¡Pelicula Devuelta!</strong><br>
                    Usted a devuelto la pelicula exitosamente. Esperamos que la haya disfrutado.
                </div>';
            
        }
        else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Usted no ha rentado esta pelicula.
                </div>';
        }

		$check_arriendo=null;
	?>
</div>