<br>
<div class="tile is-child box">
  <?php
    require_once "./php/main.php";
    $conn = conexion();
    
    $conn_1 = $conn->query("SET @p0='$_SESSION[nombre]'; SELECT BienvenidaPagina (@p0) AS BienvenidaPagina;");
    $conn_1 =  $conn_1->fetchAll();

    foreach($conn_1 as $row){
      echo "
        <h1 class='title'>".$row['BienvenidaPagina']."</h1>";
    }
  ?>

  <center><h1 class="title">Hola <?php echo $_SESSION['nombre'] ?></h1></center>
  <br> 
  <center><h2 class = "subtitle">Bienvenido al sitio número 1 de arriendo de películas</h2></center>
</div>

<br>
<div class="tile is-ancestor">
  <div class="tile is-4 is-vertical is-parent">
    <div class="tile is-child box">
      <p class="title">BLOCKBUSM</p>
      <figure>
        <img src="./img/logo3.jpg">
      </figure>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title">Acerca de nosotros</p>
      <p> Blockbusm es una plataforma de arriendos de las mejores pelÍculas de la historia, como la increÍble filmografía "No estoy loca".</p>
      <br>
      <p> Nosotros como Blockbusm ofrecemos una amplia varieadad de opciones para tus películas, como por ejemplo la seccion de Mis listas, en donde se encuentra la Wishlist o películas favoritas, en la cual puedes
          guardar las peliculas que algun dia deseas arrendar, o que simplemente te encantan.</p>
      <br>
      <p>Tambien ofrecemos la increíble, maravillosa y única parte social en la cual puedes seguir y dejar de seguir a gente que tiene los mismos gustos dudosos, ver su perfil completo y sus reseñas.</p>
      <br>
      <p>Contamos con un amplio catalogo de peliculas para arrendar (no olvide cargar saldo), devolver e inspeccionar una pelicula, para asi luego de ver la película que arrendaste, puedas dejar una reseña que nadie te pidió y una calificación que probablemente nadie tampoco pidió, pero está bonito.</p>
      <br>
      <p>Con esta informacion podremos crear los distintos top 5 que disponemos para que disfrutes o generar una seccion de peliculas que le quedan pocas unidades, apurate antes que se agoten!!.</p>
      <br>
      <p> No olvides que posees un perfil, en el cual podras ver a tus seguidores con sus reseñas o a quienes sigues con sus reseñas, puedes dar una descripcion sobre ti o ver y actualizar tus reseñas.
      <br>
      <p>Ante cualquier duda, puedes contactarte con nosotros, y sin más que agregar nos vemos Cinefilo</p>
    </div>
  </div>
</div>

<div class="tile is-ancestor">
  <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title">Nuestros tops 5</p>
      <center><a href="index.php?vista=top5" class="button is-link is-rounded is-large btn-back">Top 5</a></center>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title">Películas que se arriendan como pan caliente...</p>
      <center><a href="index.php?vista=pocas_unidades" class="button is-link is-rounded is-large btn-back">Pocas unidades</a></center>
    </div>
  </div>
</div>