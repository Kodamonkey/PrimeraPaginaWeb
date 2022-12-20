<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

    $tabla = "";

    $id_user_actual = $_SESSION['id'];

    $datos_query = "SELECT * FROM fav_list INNER JOIN pelicula ON fav_list.id_pelicula=pelicula.id AND id_usuario = $id_user_actual";

    $datos_query_total = "SELECT COUNT(id_usuario) FROM fav_list";
    

    $connection = conexion();

    $datos = $connection->query($datos_query);
    $datos = $datos->fetchAll();

    $total = $connection->query($datos_query_total);
    $total = (int) $total->fetchColumn(); #Devuelve una sola columna de los resultados, en este caso recibimos el valor entero del count.

    $N_pages = ceil($total/$registros);


    $tabla.='
        <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>#</th>
                    <th>Película</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
    ';

    #Corrobaracion de que estemos en una pagina valida

    $cont = 1;

    if($total >= 1 && $pagina <= $N_pages){
        $paginador_inicio =  $inicio + 1;
        foreach($datos as $rows){
            $tabla.='
                <tr class="has-text-centered" >
                    <td>'.$cont.'</td>
                    <td>'.$rows['nombre'].'</td>
                    <td>
                        <a href="index.php?vista=fav_list_quitar&pelicula_id_fav_list='.$rows['id'].'" class="button is-warning is-rounded is-small">Quitar de favoritos</a>
                    </td>
                </tr>
            ';
            $cont++;
        }
        $paginador_final =  $cont-1;
    }else{
        if($total >= 1){
            $tabla.='
            <tr class="has-text-centered" >
                <td colspan="7">
                    <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic acá para recargar el listado
                    </a>
                </td>
            </tr>
            ';
        }else{
            $tabla.='
            <tr class="has-text-centered" >
                <td colspan="7">
                    No hay peliculas en la lista de favoritos
                </td>
            </tr>
            
            ';
        }
    }

    $tabla.='</tbody></table></div>';

    if($total >= 1 && $pagina <= $N_pages){
        $tabla.='
            <p class="has-text-right">Mostrando usuarios <strong>'.$paginador_inicio.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>
        ';
    }

    $connection = null;

    echo $tabla;

    if($total >= 1 && $pagina <= $N_pages){
        echo paginador_tablas($pagina, $N_pages,$url, 3);
    }
?>