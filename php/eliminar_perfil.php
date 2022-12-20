<?php
	require_once "./php/main.php";
?>


<div class="container is-fluid mb-6">
	<h1 class="title">Eliminar cuenta.</h1>
</div>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=login" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
	<?php
        $id_user_actual = $_SESSION['id'];

        $check_usuario=conexion();
    	$connection=$check_usuario->query("SELECT * FROM usuario WHERE (id_usuario = $id_user_actual)");

        /*== Verificando que el usuario se haya eliminado ==*/

        if($connection->rowCount() == 1){

            $connection_2 = $check_usuario->query("SELECT * FROM sigue_a WHERE (id_usuario = $id_user_actual)");
            $connection_2_array = $connection_2->fetchAll();

            foreach($connection_2_array as $rows){
                $count_seguidores = $check_usuario->query("SELECT COUNT(id_sigue_a) FROM sigue_a WHERE id_sigue_a = $rows[id_sigue_a]");
                $count_seguidores_value = (int) $count_seguidores->fetchColumn();
                $count_seguidores_value = $count_seguidores_value - 1;

                if($count_seguidores_value < 0){
                    $count_seguidores_value = 0;
                }
                #Actualizar el numero de seguidores del usuario al que se siguio

                $update_seguidores = $check_usuario->query("UPDATE usuario SET num_seguidores_usuario = $count_seguidores_value WHERE id_usuario = $rows[id_sigue_a]"); 

            }

            $connection_1_1 = $check_usuario->query("DELETE FROM sigue_a WHERE (id_usuario = $id_user_actual)");
            $connection_1 = $check_usuario->query("DELETE FROM usuario WHERE (id_usuario = $id_user_actual)");

            echo '
                <div class="notification is-info is-light">
                    <strong>Operación exitosa</strong><br>
                    Su cuenta se ha eliminada 
                </div>';
        }
        else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    Por favor vuelva a intentar.
                </div>';
        }
		$check_usuario = null;
	?>
</div>