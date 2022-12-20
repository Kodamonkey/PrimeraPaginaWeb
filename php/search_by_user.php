<?php

    $busqueda = $_POST['txt_buscador'];

    $conexion_search_user = conexion();
    $conexion_search_user = $conexion_search_user -> query("SELECT * FROM usuario WHERE (usuario.nombre_usuario LIKE '%$busqueda%' AND id_usuario != ".$_SESSION['id'].")");

    if(isset($busqueda) && $busqueda != "" && $conexion_search_user->rowCount()>0){
        echo '<br>
        <div class="notification is-info is-light">
            <strong>Usted busco:'." ".$busqueda. '</strong><br>
            Estos usuarios coinciden con su busqueda:
        </div>';
        while ($row = $conexion_search_user->fetch()){
            echo '
            <div class="box">
                <center><p class = "subtitle"><b>'.$row['nombre_usuario'].'</b></p></center><br>      
                <center><a href="index.php?vista=perfil_de&user_id_perfil='.$row['id_usuario'].'" class="button is-info is-rounded">Ir al perfil</a></center>
            </div>
            <br>
            '; 
        }
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Lo sentimos!</strong><br>
            Ningun usuario coincide con su busqueda.
        </div>';
    }
    
    $conexion_search_user = null;
?>

