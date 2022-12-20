<?php

    # A traves del boton de registrarse, se esta creando un nuevo usuario/ 
    #back end -> usuario_guardar.php
    #front end -> signup.php (html)

    #Almacenando datos

    $nombre = limpiar_cadena($_POST['usuario_nombre']);
    $apellido = limpiar_cadena($_POST['usuario_apellido']);
    $usuario = limpiar_cadena($_POST['usuario_usuario']);
    $email = limpiar_cadena($_POST['usuario_email']);
    $id_user_actual = $_SESSION['id'];
    $usuario_user_actual = $_SESSION['user'];

    # Verificando campos obligatorios y alerta en caso de no rellenar campos obligatorios

    if($nombre == "" || $apellido == "" || $usuario == ""){
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
    $check_usuario = $check_user->query("SELECT * FROM usuario WHERE (user_usuario = '$usuario' AND id_usuario != '$id_user_actual')"); 
    
    if($check_usuario->rowCount() == 1){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El usuario ingresado ya esta registrado, por favor digite uno distinto.
        </div>';
        exit(); 
    }   

    $check_user = null; #Se cierra la conexion.

    /* guardando datos */

    $save_user = conexion();

    $save_user_1 = $save_user -> query("UPDATE usuario SET nombre_usuario = '$nombre', apellido_usuario = '$apellido', user_usuario = '$usuario', email_usuario = '$email' WHERE (id_usuario = $id_user_actual)");

    if($save_user_1->rowCount() == 1){
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['user'] = $usuario;
        $_SESSION['email'] = $email;

        echo '<br>
        <div class="notification is-info is-light">
            <strong>Datos actualizados!</strong><br>
            Se ha actualizado la nueva informacion que nos proporciono. 
        </div>';
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo actulizar su informacion, intente nuevamente.
        </div>';
    }

    $save_user = null; 
?>


