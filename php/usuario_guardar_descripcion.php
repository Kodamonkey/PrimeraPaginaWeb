<?php

    $descripcion = limpiar_cadena($_POST['usuario_descripcion']);

    /* guardando datos */

    $save_user = conexion();

    $save_user_1 = $save_user -> query("UPDATE usuario SET descripcion_usuario = '$descripcion' WHERE (id_usuario = '$_SESSION[id]')");

    if($save_user_1->rowCount() == 1){
        $_SESSION['descripcion'] = $descripcion;

        echo '<br>
        <div class="notification is-info is-light">
            <strong>Descripcion actualizada</strong><br>
        </div>';
        
    }else{
        echo '<br>
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo actulizar su descripcion.
        </div>';
    }

    $save_user = null; 
?>