<?php

    # A traves del boton de iniciar sesion:
    #back end -> inicio_sesion.php
    #front end -> login.php (html)

    #Almacenando datos

    $usuario = limpiar_cadena($_POST['login_usuario']);
    $clave = limpiar_cadena($_POST['login_clave']);

    # Verificando campos obligatorios y alerta en caso de no rellenar campos obligatorios

    if($usuario == "" || $clave == ""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios.
        </div>';
        exit();
    }

    # Verificando integridad de los datos a traves del pattern del html

    if(verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El usuario no coincide con el formato solicitado.
        </div>';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            La clave no coincide con el formato solicitado.
        </div>';
        exit();
    }

    #Deteccion de usuario, en caso de existir toma todos los datos de ese registro en la sesion actual

    $check_user = conexion();
    $check_user = $check_user->query("SELECT * FROM usuario WHERE user_usuario = '$usuario'");

    if($check_user->rowCount()==1){ #Encontro al usuario
        $check_user = $check_user->fetch(); #Esto nos permite crear un array de un solo registro, en caso de querer mas registros se usa fetchall.
    
        if($check_user['user_usuario'] == $usuario && password_verify($clave, $check_user['clave_usuario'])){ #Se crean las variables de sesion, que existiran solo mientras dure la sesion
                
            $_SESSION['id'] = $check_user['id_usuario']; 
            $_SESSION['nombre'] = $check_user['nombre_usuario'];
            $_SESSION['apellido'] = $check_user['apellido_usuario'];
            $_SESSION['user'] = $check_user['user_usuario'];
            $_SESSION['clave'] =  $check_user['clave_usuario'];
            $_SESSION['email'] = $check_user['email_usuario'];
            $_SESSION['saldo'] = $check_user['saldo_usuario'];
            $_SESSION['seguidores'] = $check_user['num_seguidores_usuario'];
            $_SESSION['seguidas'] = $check_user['num_seguidas_usuario'];
            $_SESSION['descripcion'] = $check_user['descripcion_usuario'];
            $_SESSION['rentadas_actualmente'] = $check_user['rentadas_actualmente'];
            $_SESSION['rentadas_historicamente'] = $check_user['rentadas_historicamente'];

            if(headers_sent()){ #Redireccion cuando se hayan enviado encabezados
                echo "<script>window.location.href='index.php?vista=home;</script>";
            }else{
                header("Location: index.php?vista=home");
            }
            
        }else{
            echo'
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Usuario o Clave incorrectos
                </div>';
        }
    
    } 
    else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Usuario o Clave incorrectos
        </div>;';
    }

    $check_user = null; #Cerrar conexion a la base de datos

?>