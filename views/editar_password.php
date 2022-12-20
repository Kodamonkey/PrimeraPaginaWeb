<br>
<div class="tile is-child box">
    <center><h1 class="title">Editar contraseña</h1></center>
    <br> 
</div>
<div class="container pb-6 pt-6">
    <form action="" method="POST" autocomplete="off" >
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Nueva Clave</label>
                    <input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>Repetir nueva clave</label>
                    <input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
                </div>
            </div>
        </div>
        <p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Validar los cambios</button>
		</p>
        <?php
			if(isset($_POST['usuario_clave_1']) && isset($_POST['usuario_clave_2'])){
				require_once "./php/main.php";
				require_once "./php/usuario_guardar_new_pass.php";
			}
		?>
        <p class="has-text-right pt-4 pb-4">
			<Center><a href="index.php?vista=editar_perfil" class="button is-link is-rounded btn-back">Volver</a>
		</p>
    </form>
</div>