<br>
<div class="tile is-child box">
    <center><h1 class="title">Mi Cuenta</h1></center>
    <br> 
    <center><h2 class="subtitle">¡BIENVENIDO <?php echo $_SESSION['nombre']; ?>! </h2></center>
</div>
<br>
<div class="container pb-6 pt-6">
    <div class="box">
        <br>
        <br>
        <form action="" method="POST" autocomplete="off">
            <div class = "field">
                    <center><img class="is-rounded" src="https://cdn.resfu.com/img_data/players/medium/23569.jpg?size=120x&lossy=1"></center>
            </div>
            <div class="field-data">
                <center><label class="label">Nombre(s): <?php echo " ".$_SESSION['nombre'];?></label></center>
                <br>
                <center><label class="label">Apellido(s): <?php echo " ".$_SESSION['apellido'];?></label></center>
                <br>
                <center><label class="label">Usuario: <?php echo " ".$_SESSION['user'];?></label></center>
                <br>
                <center><label class="label">Email: <?php echo " ".$_SESSION['email'];?></label></center>
                <br>
                <br>
                <center><label class="label">Seguidores: <?php echo " ".$_SESSION['seguidores'];?></label></center>
                <center><label class="label">Seguiendo: <?php echo " ".$_SESSION['seguidas'];?></label></center>
                <br>
                <br>
                <center><label class="label">Rentadas Historicamente: <?php echo " ".$_SESSION['rentadas_historicamente'];?> </label></center>
                <center><label class="label">Rentadas Actualmente: <?php echo " ".$_SESSION['rentadas_actualmente'];?></label></center>
                <div class="field-data">
                    <br>
                    <label class="label">Descripcion: </label>
                    <div class="notification">
                        <p>
                            <?php echo " ".$_SESSION['descripcion'];?>
                        </p>
                        <p class="has-text-right pt-4 pb-4">
                            <a href="index.php?vista=editar_descripcion" class="button is-info">Cambiar descripción</a>
                        </p>
                    </div>
                </div>
            </div>
            <p class="has-text-center pt-4 pb-4">
                <center><a href="index.php?vista=mis_seguidas" class="button is-rounded is-link">Ver mis seguidas</a></center>
            </p>
            <p class="has-text-center pt-4 pb-4">
                <center><a href="index.php?vista=mis_seguidores" class="button is-rounded is-link">Ver mis seguidores</a></center>
            </p>
            <p class="has-text-center pt-4 pb-4">
                <center><a href="index.php?vista=mis_reseñas" class="button is-rounded is-link">Ver mis reseñas</a></center>
            </p>
            <p class="has-text-right pt-4 pb-4">
                <center><a href="index.php?vista=editar_perfil" class="button is-rounded is-link">Editar perfil</a></center>
            </p>
            <br>
            <p class="has-text-right pt-13 pb-12">
                <center><a href="index.php?vista=vista_eliminar_perfil" class="button is-danger">Eliminar cuenta</a></center>
            </p>
        </form>
        <br>
        <br>
    </div>
</div>







