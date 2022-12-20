<br>
<div class="tile is-child box">
    <center><h1 class="title">Que piensa acerca de ciertas peliculas...</h1></center>
    <br> 
    <center><h2 class="subtitle">Aqui una lista de todas sus reseñas: </h2></center>
</div>
<div class="container pb-6 pt-6">
    <p class="has-text-right pt-4 pb-4">
        <a href="index.php?vista=mi_cuenta" class="button is-link is-rounded btn-back"><- Regresar atrás</a>
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
        $url = "index.php?vista=mis_reseñas&page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/mis_reseñas_lista.php";
    ?>
</div>