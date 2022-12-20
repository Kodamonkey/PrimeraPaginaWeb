<br>
<div class="tile is-child box">
    <center><h1 class="title">Agregue sus peliculas favoritas</h1></center>
    <br> 
</div>


<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=fav_list" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
    </p>
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
        $url = "index.php?vista=fav_list_insert&page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/fav_list_insert_lista.php";
    ?>
</div>