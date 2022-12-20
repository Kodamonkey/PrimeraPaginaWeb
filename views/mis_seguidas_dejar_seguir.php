<?php
	require_once "./php/main.php";

    $id = (isset($_GET['user_id_delete'])) ? $_GET['user_id_delete'] : 0;
    $id=limpiar_cadena($id);
?>

<br>
<div class="title is-child box">
    <center><h1 class="title">Dejar de seguir a un usuario</h1></center>
    <br> 
</div>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=mis_seguidas" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>

<div class="container pb-6 pt-6">
    <!--<p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=social" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>-->
	<?php
        $id_user_actual = $_SESSION['id'];

        /*== Verificando usuario ==*/

        $check_usuario=conexion();
    	$connection=$check_usuario->query("SELECT * FROM sigue_a WHERE (id_usuario = $id_user_actual AND id_sigue_a = $id)");

        if($connection->rowCount() == 1){
            #Se elimina al usuario de la tabla sigue a 

            $connection_1 = $check_usuario->query("DELETE FROM sigue_a WHERE (id_usuario = $id_user_actual AND id_sigue_a = $id)");

            $count_seguidores = $check_usuario->query("SELECT COUNT(id_sigue_a) FROM sigue_a WHERE id_sigue_a = '$id'");
            $count_seguidores_value = (int) $count_seguidores->fetchColumn();

            $count_seguidos = $check_usuario->query("SELECT COUNT(id_usuario) FROM sigue_a WHERE id_usuario = '$id_user_actual'");
            $count_seguidos_value = (int) $count_seguidos->fetchColumn();

            #Actualizar el numero de seguidores del usuario al que se siguio
            
            $update_seguidores = $check_usuario->query("UPDATE usuario SET num_seguidores_usuario = $count_seguidores_value WHERE id_usuario = $id"); 
            
            #Actualizar el numero de seguidos del usuario
            
            $update_seguidos = $check_usuario->query("UPDATE usuario SET num_seguidas_usuario = $count_seguidos_value WHERE id_usuario = $id_user_actual"); 
            --$_SESSION['seguidas'];

            echo '
                <div class="notification is-info is-light">
                    <strong>Operación exitosa</strong><br>
                    El usuario se dejó de seguir. 
                </div>';
        }
        else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    Ya no sigue a este usuario.
                </div>';
        }
		$check_usuario = null;
	?>
</div>
