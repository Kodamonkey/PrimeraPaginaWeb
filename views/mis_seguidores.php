<br>
<div class="tile is-child box">
    <center><h1 class="title">¿Quien me sigue?</h1></center>
    <br> 
    <center><h2 class="subtitle">Aqui una lista de los usuarios que lo siguen: </h2></center>
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
        $url = "index.php?vista=mis_seguidores&page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/mis_seguidores_lista.php";
    ?>
</div>