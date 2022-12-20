<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand" >
    <a class="navbar-item" href="index.php?vista=home">
      BlockBusm <img src="./img/logo3.jpg" width = "50" height="50">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu" >
    <div class="navbar-start">
      <a class="navbar-item" href = "index.php?vista=home">
        Página Principal
      </a>
      
      <a class="navbar-item" href = "index.php?vista=buscador">
        <i class="fa-solid fa-magnifying-glass"></i>
      </a>

      <a class="navbar-item" href = "index.php?vista=social">
        Social
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href = "">
          Películas
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href = "index.php?vista=peliculas">
            Catálogo
          </a>
          <a class="navbar-item" href = "index.php?vista=top5">
            Top 5 
          </a>
          <a class="navbar-item" href = "index.php?vista=pocas_unidades">
            Quedan pocas unidades!!!!! 
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href = "">
          Mis listas
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href = "index.php?vista=wishlist">
            Wishlist
          </a>
          <a class="navbar-item" href = "index.php?vista=fav_list">
            Peliculas favoritas
          </a>
        </div>
      </div>

    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href = "index.php?vista=mi_cuenta">
            <strong>Mi cuenta</strong>
          </a>
          <a class="button is-light" href = "index.php?vista=cargar_saldo">
            Saldo Actual: <?php echo $_SESSION['saldo']?>
          </a>
          <a class="button is-danger" href = "index.php?vista=logout">
            Cerrar Sesión
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href = "">
              More
            </a>
            <div class="navbar-dropdown">
              <a class="navbar-item" href = "index.php?vista=contacto">
                Contacto
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

