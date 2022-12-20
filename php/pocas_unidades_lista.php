<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

    $tabla = "";


    $datos_query = "SELECT * FROM pelicula WHERE ejemplares_disponibles < 3 ORDER BY nombre ASC LIMIT $inicio,$registros";

    $datos_query_total = "SELECT COUNT(id) FROM pelicula";
    

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
                    <th>Portada</th>
                    <th>Descripción</th>
                    <th>Unidades disponibles</th>
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
                        <figure class="crop" style="width:50%">
                            <img src="'.$rows['nombre_imagen'].'">
                        </figure>
                    </td>
                    <td>
                        '.$rows['descripcion'].'
                    </td>
                    <td>
                    '.$rows['ejemplares_disponibles'].'
                    </td>
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
                    No hay registros en el sistema
                </td>
            </tr>
            
            ';
        }
    }

    $tabla.='</tbody></table></div>';

    $connection = null;

    echo $tabla;

    if($total >= 1 && $pagina <= $N_pages){
        echo paginador_tablas($pagina, $N_pages,$url, 3);
    }
?>