<?php
	require_once "./php/main.php";

    $id = (isset($_GET['pelicula_id_perfil'])) ? $_GET['pelicula_id_perfil'] : 0;
    $id=limpiar_cadena($id);
?>

<?php
  /*== Verificando usuario ==*/
  $check_movie=conexion();
  $check_movie=$check_movie->query("SELECT * FROM pelicula WHERE id = $id");

  if ($check_movie->rowCount() == 1) {
    $datos=$check_movie->fetch();
  ?>
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=buscador_peliculas" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
    <div class="tile is-ancestor">
    <div class="tile is-vertical is-4">
        <div class="tile is-parent">
          <article class="tile is-child box">
            <p class="title"><?php echo $datos['nombre'];?></p>
            <figure class="image is-1by1">
              <img src="<?php echo $datos['nombre_imagen'];?>">
            </figure>
          </article>
        </div>
    </div>
    <div class="tile is-parent is-vertical">
      <article class="tile is-child box">
        <div class="content">
          <p class="title">Descripción</p>
          <div class="content">
            <?php echo $datos['descripcion'];?>
          </div>
        </div>
      </article>
      <article class="tile is-child box">
        <div class="content">
          <p class="title">Reparto</p>
          <div class="content">
            <?php echo $datos['reparto'];?>
          </div>
        </div>
      </article>
      <article class="tile is-child box">
        <div class="content">
          <p class="title">Duracion</p>
          <div class="content">
            <?php echo $datos['duracion']?>
          </div>
        </div>
      </article>
    </div>
    </div>
  </div>

  <nav class="level">
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Precio</p>
        <p class="title"><?php echo $datos['precio']?></p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Puntuación de los usuarios</p>
        <p class="title"><?php echo $datos['calificacion_media_blockbusm']?></p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Puntuación del sitio</p>
        <p class="title"><?php echo $datos['calificacion_media_usmtomatoes']?></p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Público</p>
        <p class="title"><?php echo $datos['target']?></p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Rentadas historicas</p>
        <p class="title"><?php echo $datos['veces_rentada']?></p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Cantidad disponible</p>
        <p class="title"><?php echo $datos['ejemplares_disponibles']?></p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Cantidad total</p>
        <p class="title"><?php echo $datos['ejemplares_totales']?></p>
      </div>
    </div>
  </nav>
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