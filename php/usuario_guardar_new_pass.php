<?php

    # A traves del boton de registrarse, se esta creando un nuevo usuario/ 
    #back end -> usuario_guardar.php
    #front end -> signup.php (html)

    #Almacenando datos

    $clave_1 = limpiar_cadena($_POST['usuario_clave_1']);
    $clave_2 = limpiar_cadena($_POST['usuario_clave_2']);

    # Verificando campos obligatorios y alerta en caso de no rellenar campos obligatorios

    if($clave_1 == "" || $clave_2 == ""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>';
        exit();
    }

    # Verificando integridad de los datos a traves del pattern del html

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_1) || verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_2)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            La claves no coinciden con el formato solicitado.
        </div>';
        exit();
    }

    #Verificacion que las contraseñas coincidan

    if($clave_1 != $clave_2){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Las claves ingresadas no coinciden.
        </div>';
        exit(); 
    }else{ #Si llega aqui significa que coinciden, y por ende es necesario encriptar las claves
        $clave = password_hash($clave_1, PASSWORD_BCRYPT,["cost" => 10]); #encripatar (procesado por hash) la clave
    }

    /* guardando la nueva clave */

    $id_user_actual = $_SESSION['id'];

    $save_user = conexion();

    $save_user = $save_user -> query("UPDATE usuario SET clave_usuario = '$clave' WHERE (id_usuario = $id_user_actual)");

    if($save_user->rowCount() == 1){
        $_SESSION['clave'] = $clave;
        echo '
        <div class="notification is-info is-light">
            <strong>Contraseña actualizada</strong><br>
            Su contraseña ha sido cambiada. 
        </div>';
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo ca,biar su contraseña, intente nuevamente.
        </div>';
    }

    $save_user = null; 
?>


