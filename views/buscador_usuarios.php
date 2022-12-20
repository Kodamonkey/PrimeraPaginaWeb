<div class="container pb-6 pt-6">
    <div class="columns">
        <div class="column">
            <form action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="usuario">   
                <div class="field is-grouped">
                    <p class="control is-expanded">
                        <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué usuario estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                    </p>
                    <p class="control">
                        <button class="button is-info" type="submit" name="button_search">Buscar</button>
                    </p>
                </div>
            </form>
            <?php
                if(isset($_POST['button_search']) && isset($_POST['txt_buscador']) && isset($_POST['modulo_buscador'])){
                    require_once "./php/main.php";
                    require_once "./php/search_by_user.php";
                }
            ?>
        </div>
    </div> 
</div>
<p class="has-text-centered mb-3 mt-3">
	<a type="button"  class="button is-info is-rounded" href="index.php?vista=buscador_usuarios">Volver a buscar un usuario</a>
</p>
<p class="has-text-centered mb-3 mt-3">
	<a type="button"  class="button is-info is-rounded" href="index.php?vista=buscador">Volver</a>
</p>
