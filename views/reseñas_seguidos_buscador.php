<br>
<div class="tile is-child box">
    <center><h1 class="title">Reseñas de mis seguidos</h1></center>
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
        $url = "index.php?vista=reseñas_seguidos_buscador&page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/reseñas_seguidos_buscador_lista.php";
    ?>
</div>