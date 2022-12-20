<?php

    #Almacenando datos

    $saldo = limpiar_cadena($_POST['saldo_usuario']);
    $id_user_actual = $_SESSION['id'];

    if($saldo == ""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios.
        </div>';
        exit();
    }

    # Verificando integridad de los datos a traves del pattern del html

    if(verificar_datos("[0-9]{4,40}", $saldo)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El saldo no coincide con el formato solicitado.
        </div>';
        exit();
    }

    /* guardando datos */

    $conn = conexion();

    $connection_user_actual = $conn->query("SELECT * FROM usuario WHERE (id_usuario = $id_user_actual)");

    if($connection_user_actual->rowCount() == 1){

        $array_user = $connection_user_actual->fetchAll();

        foreach($array_user as $rows){
            $saldo_update = $rows['saldo_usuario'] + $saldo;
            $_SESSION['saldo'] = $saldo_update;
            $update_saldo = $conn->query("UPDATE usuario SET saldo_usuario = $saldo_update WHERE (id_usuario = $id_user_actual)");
        }
        
        echo '
        <div class="notification is-info is-light">
            <strong>¡Saldo Cargado!</strong><br>
            El nuevo saldo ha sido actualizado exitosamente. 
        </div>';

    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo cargar el saldo, intente nuevamente.
        </div>';
    }

    $conn = null; 
?>