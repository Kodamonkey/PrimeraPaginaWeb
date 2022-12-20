<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

    $tabla = "";


    $datos_query = "SELECT * FROM pelicula ORDER BY calificacion_media_usmtomatoes DESC LIMIT 5";

    $connection = conexion();

    $datos = $connection->query($datos_query);
    $datos = $datos->fetchAll();

    $total = 5;

    $N_pages = ceil($total/$registros);


    $tabla.='
        <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>Posicion</th>
                    <th>Portada</th>
                    <th>Pelicula</th>
                    <th>Calificacion</th>
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
                    <td> 
                        <figure class="crop" style="width:50%">
                            <img src="'.$rows['nombre_imagen'].'">
                        </figure>
                    </td>
                    <td>'.$rows['nombre'].'</td>
                    <td>'.$rows['calificacion_media_usmtomatoes'].'</td>
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
                    No hay registros en el sistema
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