<?php
	require_once "./php/main.php";
    $id = (isset($_GET['user_id_perfil'])) ? $_GET['user_id_perfil'] : 0;
    $id=limpiar_cadena($id);
?>

<br>
<div class="title is-child box">
    <center><h1 class="title">Usuarios</h1></center>
	<center><h2 class="subtitle">Conozca a este usuario: </h2></center>
</div>

<div class="container pb-6 pt-6">
    <?php

        /*== Verificando usuario ==*/
    	$check_usuario=conexion();
    	$check_usuario=$check_usuario->query("SELECT * FROM usuario WHERE id_usuario='$id'");

        if($check_usuario->rowCount()>0){
        	$datos=$check_usuario->fetch();
	?>
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=social" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
    <div class="tile is-child box">
        <center><h1 class="title">¡BIENVENIDO AL PERFIL DE <?php echo $datos['nombre_usuario']; ?>! </h1></center>
    </div>
    <br>
    <div class="box">
        <form action="" method="POST" autocomplete="off">
            <h5 class="title is-5 has-text-centered is-uppercase">Su perfil</h5>
            <div class = "field">
                <center><img src = "https://img.a.transfermarkt.technology/portrait/header/68290-1669394812.jpg?lm=1"/><center>
            </div>
            <div class="field-data">
                <center><label class="label">Nombre(s): <?php echo " ".$datos['nombre_usuario'];?></label></center>
                <br>
                <center><label class="label">Apellido(s): <?php echo " ".$datos['apellido_usuario'];?></label></center>
                <br>
                <center><label class="label">Usuario: <?php echo " ".$datos['user_usuario'];?></label></center>
                <br>
                <center><label class="label">Email: <?php echo " ".$datos['email_usuario'];?></label></div></center>
                <br>
                <br>
                <center><label class="label">Seguidores: <?php echo " ".$datos['num_seguidores_usuario'];?></label></center>
                <center><label class="label">Seguiendo: <?php echo " ".$datos['num_seguidas_usuario'];?></label></center>
                <br>
                <br>
                <center><label class="label">Rentadas Historicamente:<?php echo " ".$datos['rentadas_historicamente'];?> </label></center>
                <center><label class="label">Rentadas Actualmente:<?php echo " ".$datos['rentadas_actualmente'];?> </label></center>
                <div class="field-data">
                    <label class="label">Descripcion: </label>
                    <div class="notification">
                        <p>
                            <?php echo " ".$datos['descripcion_usuario'];?> 
                        </p>
                    </div>
                </div>
                <p class="has-text-center pt-4 pb-4">
                    <center><a href="index.php?vista=reseñas_seguidos&id_seguidos_reseñas=<?php echo $datos['id_usuario'];?>" class= "button is-info">Ver sus reseñas</a></center>
                </p>
            </div>
        </form>
    </div>
	
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_usuario=null;
	?>
</div>
