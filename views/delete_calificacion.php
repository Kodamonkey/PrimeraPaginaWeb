<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_review_delete'])) ? $_GET['pelicula_id_review_delete'] : 0;
    $id=limpiar_cadena($id);
?>

<div class="container pb-6 pt-6">
	<?php
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_usuario=conexion();
    	$connection=$check_usuario->query("DELETE FROM calificaciones WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");

        echo '
        <div class="notification is-info is-light">
            <strong>Operacion exitosa</strong><br>
            Se ha eliminado su calificacion. 
        </div>
        <p class="has-text-centered mb-4 mt-3">
            <a type="button"  class="button is-info is-rounded" href="index.php?vista=peliculas">Volver</a>
        </p>
        ';
    ?>
</div>
<p class="has-text-centered mb-4 mt-3">
    <a type="button"  class="button is-info is-rounded" href="index.php?vista=mis_reseñas">Volver</a>
</p>