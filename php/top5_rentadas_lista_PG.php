<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

    $tabla = "";

    $connection = conexion();

    $contador_rentadas = $connection->query("SET @p0='PG'");
    $contador_rentadas = $connection->query("CALL top5(@p0);");
    $contador_rentadas = $contador_rentadas->fetchAll();

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
                    <th>Veces que ha sido rentada</th>
                </tr>
            </thead>
            <tbody>
    ';

    $cont = 1;

    if($total >= 1 && $pagina <= $N_pages){
        $paginador_inicio =  $inicio + 1;
        foreach($contador_rentadas as $rows){
            $datos = $connection->query("SELECT * FROM pelicula WHERE id = $rows[id]");
            $datos = $datos->fetchAll();

            foreach($datos as $row){
                $tabla.='
                <tr class="has-text-centered" >
                    <td>'.$cont.'</td>
                    <td> 
                        <figure class="crop" style="width:50%">
                            <img src="'.$row['nombre_imagen'].'">
                        </figure>
                    </td>
                    <td>'.$row['nombre'].'</td>
                    <td>'. $rows[1].'</td>
                </tr>
                ';
                $cont++;
            }
            
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