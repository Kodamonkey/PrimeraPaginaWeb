<br>
<div class="tile is-child box">
    <center><h1 class="title">Registro de usuario</h1></center>
    <br> 
    <center><h2 class="subtitle">Nuevo usuario</h2></center>
</div>

<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="" method="POST" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre(s)</label>
				  	<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder = "ejemplo: Juanito Pedrito" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellido(s)</label>
				  	<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder = "ejemplo: Perez Diaz" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" placeholder = "ejemplo: Messi2012" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Email (opcional) </label>
				  	<input class="input" type="email" name="usuario_email" maxlength="70" placeholder = "ejemplo: juanito.perez@hotmail.com">
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Clave</label>
				  	<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Repetir clave</label>
				  	<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Descripcion</label>
				  	<input class="input" type="text" name="usuario_descripcion" pattern="[a-zA-Z0-9$@.- ]{7,100}" maxlength="100"  placeholder = "Descríbase">
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Crear Cuenta</button>
		</p>
		<?php
			if(isset($_POST['usuario_nombre']) && isset($_POST['usuario_apellido']) && isset($_POST['usuario_usuario']) && isset($_POST['usuario_clave_1']) && isset($_POST['usuario_clave_2'])){
				require_once "./php/main.php";
				require_once "./php/usuario_guardar.php";
			}
		?>
	</form>
	<p class="has-text-centered mb-4 mt-3">
		<a type="button"  class="button is-info is-rounded" href="index.php?vista=login">Volver</a>
	</p>
</div>

