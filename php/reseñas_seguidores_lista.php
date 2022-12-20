<?php
	require_once "./php/main.php";

    $id = (isset($_GET['id_seguidores_reseñas'])) ? $_GET['id_seguidores_reseñas'] : 0;
    $id=limpiar_cadena($id);

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

    $tabla = "";

    $id_user_actual = $_SESSION['id'];

    $check_seguidas = conexion();

    $query_review = $check_seguidas->query("SELECT * FROM calificaciones WHERE id_usuario = $id ORDER BY id_calificaciones DESC");
    $datos_query_total = $check_seguidas->query("SELECT COUNT(id_usuario) FROM calificaciones WHERE id_usuario = $id");

    $total = (int) $datos_query_total->fetchColumn();
    $query_review_array = $query_review->fetchAll();

    $tabla.='
        <div class="table-container">
        <p class="has-text-right pt-4 pb-4">
            <a href="index.php?vista=vista_perfil_seguidores&user_id_perfil='.$id.'" class="button is-link is-rounded btn-back">Volver</a>
        </p>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>#</th>
                    <th>Pelicula</th>
                    <th>Puntuacion</th>
                    <th>Reseña</th>
                </tr>
            </thead>
            <tbody>
    ';

    if($query_review->rowCount() > 0){     
        foreach($query_review_array as $rows){
            $query_review_movie = $check_seguidas->query("SELECT * FROM pelicula WHERE id = '".$rows['id_pelicula']."'");

            $query_review_array_movie = $query_review_movie->fetchAll();
            
            $N_pages = ceil($total/$registros);

            if($total >= 1 && $pagina <= $N_pages){
                $paginador_inicio =  $inicio + 1;
                $cont = 1;
                foreach($query_review_array_movie as $row){
                    $tabla.='
                        <tr class="has-text-centered" >
                            <td>'.$cont.'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$rows['puntuacion'].'</td>
                            <td>'.$rows['reseña'].'</td>
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
        }

        $tabla.='</tbody></table></div>';

        if($total >= 1 && $pagina <= $N_pages){
            $tabla.='
                <p class="has-text-right">Mostrando usuarios <strong>'.$paginador_inicio.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>
            ';
        }
    
        $heck_seguidas = null;
    
        echo $tabla;
    
        if($total >= 1 && $pagina <= $N_pages){
            echo paginador_tablas($pagina, $N_pages,$url, 3);
        }

    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>Este usuario no realizado una critica aun.</strong><br>
            <p class="has-text-right pt-4 pb-4">
                <a href="index.php?vista=vista_perfil_seguidores&user_id_perfil='.$id.'" class="button is-link is-rounded btn-back">Volver</a>
            </p>
        </div>';
    }

?>