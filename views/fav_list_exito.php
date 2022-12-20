<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_fav_list'])) ? $_GET['pelicula_id_fav_list'] : 0;
    $id=limpiar_cadena($id);
?>

<br>
<div class="title is-child box">
    <center><h1 class="title">Agregar películas a la Favlist</h1></center>
</div>


<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=fav_list_insert" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
	<?php
    
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_usuario=conexion();
    	$connection = $check_usuario->query("SELECT * FROM fav_list WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");

        if($connection->rowCount() == 0){
            $connection_1 = $check_usuario->query("INSERT INTO fav_list(id_usuario, id_pelicula) VALUES ('$id_user_actual', '$id')");

            if ($connection_1->rowCount() == 1) {
                echo '
                <div class="notification is-info is-light">
                    <strong>Operación exitosa</strong><br>
                    Pelicula agregada con exito. 
                </div>';    
            }
            else{
                echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Su pelicula no pudo ser agregada a favoritos, intente de nuevo.
                </div>';    
            }
            
        }
        else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Su pelicula ya está en favoritos.
                </div>';
        }

		$check_usuario=null;
	?>
</div>