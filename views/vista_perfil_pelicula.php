<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_perfil'])) ? $_GET['pelicula_id_perfil'] : 0;
    $id=limpiar_cadena($id);
?>
<div class="container is-fluid mb-6">
    <h1 class="title">Pelicula</h1>
	<h2 class="subtitle">Conozca todo sobre esta pelicula: </h2>
</div>

<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=peliculas" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
    <?php
        /*== Verificando usuario ==*/
    	$check_movie=conexion();
    	$check_movie=$check_movie->query("SELECT * FROM pelicula WHERE id='$id'");

        if($check_movie->rowCount()>0){
        	$datos=$check_movie->fetch();
	?>
            <div class="tile is-child box">
                <center><h2 class="subtitle">Informacion de pelicula seleccionada: </h2></center>
            </div>
            <div class="box">
                <form action="" method="POST" autocomplete="off">
                    <h5 class="title is-5 has-text-centered is-uppercase"><?php echo $datos['nombre']; ?></h5>
                    <div class = "field">
                        <center><img src = "/img/peliculas/Elpadrino.jpg"/><center>  <!-- Imagen de la pelicula -->
                    </div>
                    <div class="field-data">
                        <center><label class="label">Puntuacion Blockbusm: <?php echo " ".$datos['calificacion_media_blockbusm'];?></label></center>
                        <br>
                        <center><label class="label">Puntuacion usmtomatoes: <?php echo " ".$datos['calificacion_media_usmtomatoes'];?></label></center>
                        <br>
                        <center><label class="label">Duracion: <?php echo " ".$datos['duracion'];?></label></center>
                        <br>
                        <center><label class="label">Genero: <?php echo " ".$datos['genero'];?></label></div></center>
                        <br>
                        <center><label class="label">Target: <?php echo " ".$datos['target'];?></label></center>
                        <br>
                        <center><label class="label">Reparto: <?php echo " ".$datos['reparto'];?></label></center>
                        <br>
                        <center><label class="label">Precio de renta: <?php echo " ".$datos['precio'];?></label></center>
                        <br>
                        <center><label class="label">Cantidad disponible: <?php echo " ".$datos['ejemplares_disponibles'];?></label></center>
                        <br>
                        <center><label class="label">Cantidad total: <?php echo " ".$datos['ejemplares_totales'];?></label></center>
                        <br>
                        <center><label class="label">Cantidad historica de veces rentada: <?php echo " ".$datos['veces_rentada'];?></label></center>
                    </div>
                </form>
            </div>
	<?php 
		}else{
            echo '
            <div class="notification is-danger is-light mb-6 mt-6">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No podemos obtener la información solicitada
            </div>';
		}
		$check_movie=null;
	?>
</div>
