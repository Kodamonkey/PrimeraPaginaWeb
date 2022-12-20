<br>
<div class="tile is-child box">
    <center><h1 class="title">Editar mi perfil</h1></center>
    <br> 
</div>

<div class="container pb-6 pt-6">

	<form action="" method="POST" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre(s)</label>
				  	<input value = '<?php echo $_SESSION['nombre']?>' class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellido(s)</label>
				  	<input value = '<?php echo $_SESSION['apellido']?>' class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder = "ejemplo: Perez Diaz" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input value = '<?php echo $_SESSION['user']?>' class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" placeholder = "ejemplo: Messi2012" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input value = '<?php echo $_SESSION['email']?>' class="input" type="email" name="usuario_email" maxlength="70" placeholder = "ejemplo: juanito.perez@hotmail.com">
				</div>
		  	</div>
		</div>
		<p>
			<Center><a href="index.php?vista=mi_cuenta" class="button is-link is-rounded btn-back">Volver</a>
		</p>
		<br>
		<p>
			<Center><a href="index.php?vista=editar_password" class="button is-link is-rounded">Cambiar contraseña</a>
    	</p>
		<br>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Validar Cambios</button>
		</p>
		<?php
			if(isset($_POST['usuario_nombre']) || isset($_POST['usuario_apellido']) || isset($_POST['usuario_usuario']) || isset($_POST['usuario_email'])){
				require_once "./php/main.php";
				require_once "./php/usuario_guardar_edit.php";
			}
		?>
	</form>
</div>