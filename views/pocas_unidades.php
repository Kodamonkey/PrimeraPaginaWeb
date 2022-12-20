<br>
<div class="tile is-child box">
    <center><h1 class="title">¡¡Quedan pocas Unidades!!</h1></center>
    <br> 
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
        $url = "index.php?vista=pocas_unidades &page=";
        $registros = 15;
        $busqueda = "";

        require_once "./php/pocas_unidades_lista.php";
    ?>
</div>