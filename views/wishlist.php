<br>
<div class="tile is-child box">
    <center><h1 class="title">Whishlist</h1></center>    
</div>

<div class="container pb-6 pt-6">

    <?php 
        require_once "./php/main.php";

        if(!isset($_GET['page'])){
            $pagina = 1;
        }else{
            $pagina = (int) $_GET['page'];
            if($pagina<=1){
                $pagina = 1;
            }
        }

        $pagina = limpiar_cadena($pagina);
        $url = "index.php?vista=wishlist&page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/wishlist_lista.php";
    ?>
</div>
<p class="has-text-centered mb-4 mt-3">
			<a type="button"  class="button is-info is-rounded" href="index.php?vista=wishlist_insert">Agregar peliculas</a>
</p>
<p class="has-text-centered mb-4 mt-3">
			<a type="button"  class="button is-danger is-rounded" href="index.php?vista=wishlist_quitar_todo">Eliminar todas las peliculas</a>
</p>