<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_rentar'])) ? $_GET['pelicula_id_rentar'] : 0;
    $id=limpiar_cadena($id);
?>

<br>
<div class="title is-child box">
    <center><h1 class="title">Rentar una película</h1></center>
    <br> 
</div>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=peliculas" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
	<?php
    
        $id_user_actual = $_SESSION['id'];
        $saldo_user_actual = $_SESSION['saldo'];

        /*== Verificando usuario ==*/

        $check_arriendo=conexion();
    	$connection = $check_arriendo->query("SELECT * FROM arriendo WHERE (id_usuario = $id_user_actual AND id_pelicula = $id)");

        if($connection->rowCount() == 0){
            $conn_movie_actual = $check_arriendo->query("SELECT * FROM pelicula WHERE (id = $id)");
            $conn_user_actual = $check_arriendo->query("SELECT * FROM usuario WHERE (id_usuario = $id_user_actual)");

            $conn = $conn_movie_actual->fetchAll();

            $conn_user = $conn_user_actual->fetchAll();
            foreach($conn_user as $rows){
                foreach($conn as $row){
                    if($rows['saldo_usuario'] >= $row['precio']){
                        $connection_1 = $check_arriendo->query("INSERT INTO arriendo(id_usuario, id_pelicula) VALUES ('$id_user_actual', '$id')");
                        $saldo_actual = $rows['saldo_usuario'] - $row['precio'];
        
                        $update_saldo = $check_arriendo->query("UPDATE usuario SET saldo_usuario = $saldo_actual WHERE id_usuario = $id_user_actual");
                        $_SESSION['saldo'] = $saldo_actual; 
        
                        #Actualizar los atributos de las peliculas que se ven afectados por el arriendo de una pelicula
        
                        foreach($conn as $rows){
                            $cont = $rows['veces_rentada'];
                            $cont_1 = $rows['ejemplares_disponibles'];
                            if($conn_movie_actual->rowCount() == 1){
                                $cont = $cont + 1;
                                $cont_1 = $cont_1 - 1;
                                $update_veces_rentada_movie = $check_arriendo->query("UPDATE pelicula SET veces_rentada = $cont WHERE id = $id"); 
                                $update_ejemplares_disponibles = $check_arriendo->query("UPDATE pelicula SET ejemplares_disponibles = $cont_1 WHERE id = $id"); 
                            }
                        }
        
                        #Actualizar los atributos de las peliculas que se ven afectados por el arriendo de una pelicula
        
                        foreach($conn_user as $rows){
                            $cont = $rows['rentadas_actualmente'];
                            $cont_1 = $rows['rentadas_historicamente'];
                            if($conn_user_actual->rowCount() == 1){
                                $cont = $cont + 1;
                                $cont_1 = $cont_1 + 1;
                                $update_rentadas_actualmente = $check_arriendo->query("UPDATE usuario SET rentadas_actualmente = $cont WHERE id_usuario = $id_user_actual"); 
                                $update_rentadas_historicamente = $check_arriendo->query("UPDATE usuario SET rentadas_historicamente = $cont_1 WHERE id_usuario = $id_user_actual"); 
                                ++$_SESSION['rentadas_actualmente'];
                                ++$_SESSION['rentadas_historicamente'];
                            }
                        }
                        
                        echo '
                            <div class="notification is-info is-light">
                                <strong>¡Pelicula Rentada!</strong><br>
                                Usted a rentado la pelicula exitosamente. ¡Que la disfrute!.
                            </div>';    
                    }else{
                        echo '
                        <div class="notification is-danger is-light">
                            <strong>¡Ocurrio un error inesperado!</strong><br>
                            No posee el saldo sufieciente para arrendar esta pelicula.
                        </div>';
                    }
                }
            }

        }
        else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Usted ya rento esta pelicula.
                </div>';
        }

		$check_arriendo=null;
	?>
</div>