<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

    $tabla = "";

    $id_user_actual = $_SESSION['id'];

    $check_seguidas = conexion();

    $query_sigue = $check_seguidas->query("SELECT * FROM sigue_a WHERE id_usuario = '$id_user_actual'");
    $datos_query_total = $check_seguidas->query("SELECT COUNT(id_usuario) FROM sigue_a WHERE id_usuario = '".$_SESSION['id']."'");

    $total = (int) $datos_query_total->fetchColumn();
    $query_sigue_array = $query_sigue->fetchAll();

    $tabla.='
        <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
    ';

    if($query_sigue->rowCount() > 0){     
        foreach($query_sigue_array as $rows){
            $query_sigue_individuo = $check_seguidas->query("SELECT * FROM usuario WHERE id_usuario = '".$rows['id_sigue_a']."' ORDER BY nombre_usuario");

            $query_sigue_array_individuo = $query_sigue_individuo->fetchAll();

            $cont = 1;
            
            $N_pages = ceil($total/$registros);

            if($total >= 1 && $pagina <= $N_pages){
                $paginador_inicio =  $inicio + 1;
                foreach($query_sigue_array_individuo as $row){
                    $tabla.='
                        <tr class="has-text-centered" >
                            <td>'.$cont.'</td>
                            <td>'.$row['nombre_usuario'].'</td>
                            <td>'.$row['apellido_usuario'].'</td>
                            <td>'.$row['user_usuario'].'</td>
                            <td>'.$row['email_usuario'].'</td>
                            <td>
                                <a href="index.php?vista=vista_perfil_seguidas&user_id_perfil='.$row['id_usuario'].'" class="button is-info is-rounded is-small">Ir al perfil</a>
                            </td>
                            <td>
                                <a href="index.php?vista=mis_seguidas_dejar_seguir&user_id_delete='.$row['id_usuario'].'" class="button is-danger is-rounded is-small">Dejar de seguir</a>
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
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Usted no sigue a ninguna cuenta de nuestra plataforma.
        </div>';
    }

?>
