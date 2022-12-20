<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_wishlist'])) ? $_GET['pelicula_id_wishlist'] : 0;
    $id=limpiar_cadena($id);
?>

<br>
<div class="title is-child box">
    <center><h1 class="title">Quitar película de la Wishlist</h1></center>
</div>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=wishlist" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
	<?php
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_usuario=conexion();
    	$connection = $check_usuario->query("SELECT * FROM wishlist WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");

        if($connection->rowCount() == 1){
            #Se elimina al usuario de la tabla sigue a 

            $connection_1 = $check_usuario->query("DELETE FROM wishlist WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");
            
            if ($connection_1->rowCount() == 1) {
                echo '
                <div class="notification is-info is-light">
                    <strong>Operación exitosa</strong><br>
                    Pelicula quitada con exito. 
                </div>';    
            }
            else{
                echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Su pelicula no pudo ser quitada de la wishlist, intente de nuevo.
                </div>';    
            }
        }
        else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    No puede quitar una pelicula que no está en la wishlist
                </div>';
        }
		$check_usuario = null;
	?>
</div>
