<br>
<div class="tile is-child box">
    <center><h1 class="title">¿A quién puedo seguir?</h1></center>
    <center><h2 class="subtitle">Aquí una lista de usuarios registrados en nuestra plataforma: </h2></center>
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
        $url = "index.php?vista=social&page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/social_lista.php";
    ?>
</div>