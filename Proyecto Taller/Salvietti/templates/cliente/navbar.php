<nav class="navbar navbar-expand-lg fixed-top navbar-dark p-3" style="background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(4,81,39,1) 35%, rgba(231,178,75,1) 100%);">
    <div class="container-lg">
      <a class="navbar-brand" href="#"><img src="images/logo-salvietti-removebg-preview.png" width="75"
          class="image-fluid" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quienessomos.php">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pedidos.php">Productos</a>
          </li>
          <?php if(!empty($_SESSION['correo'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="mostrarPedido.php">Carrito(<?php echo (empty( $_SESSION['CARRITO'] )) ? 0 : count($_SESSION['CARRITO']);  ?>)</a>
            </li>
          <?php endif; ?>
          <? echo $_SESSION['correo']; ?>
        </ul>
          <div class="navbar-item">
            <a class="btn btn-primary" href="login.php">Iniciar Sesion</a>
          </div>
      </div>
    </div>
  </nav>