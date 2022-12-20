<?php

    # A traves del boton de registrarse, se esta creando un nuevo usuario/ 
    #back end -> usuario_guardar.php
    #front end -> signup.php (html)

    #Almacenando datos

    $nombre = limpiar_cadena($_POST['usuario_nombre']);
    $apellido = limpiar_cadena($_POST['usuario_apellido']);
    $usuario = limpiar_cadena($_POST['usuario_usuario']);
    $email = limpiar_cadena($_POST['usuario_email']);
    $clave_1 = limpiar_cadena($_POST['usuario_clave_1']);
    $clave_2 = limpiar_cadena($_POST['usuario_clave_2']);
    $descripcion = limpiar_cadena($_POST['usuario_descripcion']);

    # Verificando campos obligatorios y alerta en caso de no rellenar campos obligatorios

    if($nombre == "" || $apellido == "" || $usuario == "" || $clave_1 == "" || $clave_2 == ""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>';
        exit();
    }

    # Verificando integridad de los datos a traves del pattern del html

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El nombre no coincide con el formato solicitado.
        </div>';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El apellido no coincide con el formato solicitado.
        </div>';
        exit();
    }
    
    if(verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El apellido no coincide con el formato solicitado.
        </div>';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_1) || verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_2)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            La claves no coinciden con el formato solicitado.
        </div>';
        exit();
    }

    #Verificacion de email

    if($email != ""){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $check_email = conexion();
            $check_email = $check_email->query("SELECT email_usuario FROM usuario WHERE email_usuario = '$email'"); #Esta consulta es para seleccionar datos, en este caso el campo de la tabla usuario usuario_email 
            if($check_email->rowCount()>0){
                echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    El email ingresado ya esta registrado, por favor digite otro correo.
                </div>';
                exit(); 
            }
            $check_email = null; #Se cierra la conexion.
        }else{
            echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El email ingresado no es valido.
            </div>';
            exit(); 
        }
    }

    #Verificacion de usuario 

    $check_user = conexion();
    $check_user = $check_user->query("SELECT user_usuario FROM usuario WHERE user_usuario = '$usuario'"); 
    
    if($check_user->rowCount()>0){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El usuario ingresado ya esta registrado, por favor digite uno distinto.
        </div>';
        exit(); 
    }   
    $check_user = null; #Se cierra la conexion.

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

    /*Si pasa todas las validaciones anteriores, significa que el usuario es nuevo y por ende
    podemos guardarlo en la base de datos*/

    /* guardando datos */

    $save_user = conexion();

    $save_user = $save_user -> query("INSERT INTO usuario(nombre_usuario, apellido_usuario, user_usuario, clave_usuario, email_usuario, saldo_usuario, num_seguidores_usuario, num_seguidas_usuario, descripcion_usuario) VALUES ('$nombre', '$apellido', '$usuario', '$clave', '$email',0,0,0,'$descripcion')");

    if($save_user->rowCount() == 1){
        echo '
        <div class="notification is-info is-light">
            <strong>Usuario Registrado!</strong><br>
            El usuario se registro con exito. 
        </div>';
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo registrar el usuario, intente nuevamente.
        </div>';
    }
    $save_user = null; 
?>