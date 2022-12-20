<?php
	require_once "./php/main.php";

    $id = (isset($_GET['review_id_pelicula_update'])) ? $_GET['review_id_pelicula_update'] : 0;
    $id=limpiar_cadena($id);
?>

<div class="container pb-6 pt-6">
	<?php
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_usuario=conexion();
    	#$connection=$check_usuario->query("SELECT * FROM arriendo WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");
        $connection_review = $check_usuario->query("SELECT * FROM calificaciones WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");
        $cont = $connection_review->fetchAll();

        if($connection_review->rowCount() == 1){
            foreach($cont as $rows){
                if($id == $rows['id_pelicula']){
    ?>
                    <div class="tile is-child box">
                        <center><h1 class="title">Modificar mi calificacion: </h1></center>
                    </div>

                    <div class="container pb-6 pt-6">
                        <form action="" method="POST" autocomplete="off" >
                            <div class="columns">
                                <div class="column">
                                    <div class="control">
                                        <label>Puntuacion</label>
                                        <input value = "<?php echo $rows['puntuacion']; ?>" class="input" type="number" name="puntuacion" pattern="[0-5]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <div class="control">
                                        <label>Reseña (opcional) </label>
                                        <input value = "<?php echo $rows['reseña']; ?>" class="input" name="reseña">
                                    </div>
                                </div>
                            </div>
                            <p class="has-text-centered">
                                <button type="submit" class="button is-info is-rounded">Hecho</button>
                            </p>
                            <?php
                                if(isset($_POST['puntuacion']) && isset($_POST['reseña'])){
                                    require_once "./php/main.php";
                                    require_once "./php/update_calificacion.php";
                                }
                            ?>
                        </form>
                        <p class="has-text-centered mb-4 mt-3">
                            <a type="button"  class="button is-info is-rounded" href="index.php?vista=mis_reseñas">Volver</a>
                        </p>
                    </div>
    <?php                
                }
            }
        }else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Usted no puede calificar una pelicula si no la tiene arrendada o ya la tiene calificada.
                </div>
                <p class="has-text-centered mb-4 mt-3">
                    <a type="button"  class="button is-info is-rounded" href="index.php?vista=peliculas">Volver</a>
                </p>
                <p class="has-text-centered mb-4 mt-3">
                    <a type="button"  class="button is-success is-rounded" href="index.php?vista=mis_reseñas">Ver mis reseñas</a>
                </p>
                ';
        }
		$check_usuario = null;
	?>
</div>