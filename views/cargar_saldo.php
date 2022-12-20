<br>
<div class="title is-child box">
    <center><h1 class="title">Cargar saldo a su cuenta</h1></center>
    <br> 
</div>

<div class="container pb-6 pt-6">
    <form action="" method="POST" autocomplete="off" >
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Saldo</label>
                    <input class="input" type="number" name="saldo_usuario" pattern="[0-9]{4,40}" required>
                </div>
            </div>
        </div>
        <p class="has-text-centered mt-4">
            <button type="submit" class="button is-info is-rounded">Cargar Saldo</button>
        </p>
        <?php
            if(isset($_POST['saldo_usuario'])){
                require_once "./php/main.php";
                require_once "./php/saldo_update.php";
            }
        ?>
    </form>
    <p class="has-text-centered mb-4 mt-3">
		<a type="button"  class="button is-info is-rounded" href="index.php?vista=home">Volver</a>
	</p>
</div>
