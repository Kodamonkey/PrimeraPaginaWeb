<div class="main-container">
	<!--Si no defino una direccion en el action, el formulario se manda al mismo codigo que escribi el formulario-->
    <form class="box login" action="" method="POST" autocomplete="off">
		<h4 class="title is-5 has-text-centered is-uppercase">BlockBusm</h4>
		<div class="tile is-ancestor">
			<div class="tile is-parent">
				<div class="tile is-child box">
					<figure>
						<img src="./img/logo3.jpg" width = 200> 
					</figure>
				</div>
			</div>
		</div>
		<div class="field">
			<label class="label">Usuario</label>
			<div class="control">
			    <input class="input" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
			</div>
		</div>

		<div class="field">
		  	<label class="label">Clave</label>
		  	<div class="control">
		    	<input class="input" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
		  	</div>
		</div>

		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-info is-rounded">Iniciar sesion</button>
		</p>

		<p class="has-text-centered mb-4 mt-3">
			<a type="button"  class="button is-info is-rounded" href="index.php?vista=signup">Registrarse</a>
		</p>

		<?php
			if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
				require_once "./php/main.php";
				require_once "./php/inicio_sesion.php";
			}
		?>
	</form>
</div>

