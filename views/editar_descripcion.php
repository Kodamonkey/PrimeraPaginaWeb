<br>
<div class="tile is-child box">
    <center><h1 class="title">Editar mi descripcion</h1></center>
    <br> 
</div>

<div class="container pb-6 pt-6">
	<form action="" method="POST" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nueva descripcion</label>
				  	<input value = '<?php echo $_SESSION['descripcion']?>' class="input" type="text" name="usuario_descripcion" pattern="[a-zA-Z0-9$@.- ]{7,100}" maxlength="100"  placeholder = "Descríbase">
				</div>
		  	</div>
		</div>
		<p>
			<Center><a href="index.php?vista=mi_cuenta" class="button is-link is-rounded btn-back">Volver</a>
		</p>
		<br>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Validar Cambios</button>
		</p>
		<?php
			if(isset($_POST['usuario_descripcion'])){
				require_once "./php/main.php";
				require_once "./php/usuario_guardar_descripcion.php";
			}
		?>
	</form>
</div>