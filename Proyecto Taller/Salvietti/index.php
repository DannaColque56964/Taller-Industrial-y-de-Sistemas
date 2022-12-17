<?php session_start() ?>
<?php
  /* if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
      case 1:
        header('location: dashboard.php');
      break;

      case 4:
        header('location: index.php');
      break;

      default:
    }
  } */
?>
<?php include("templates/cliente/header.php"); ?>
  <?php include("templates/cliente/navbar.php"); ?>

  <div>
    <div style="background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(4,81,39,1) 35%, rgba(231,178,75,1) 100%);
    position: relative; top: 115px;">
      <img src="images/banner-salvietti2.png" class="image-fluid" style="width: 100vw;" alt="">
    </div>
  </div>

  <section class="container-lg d-flex justify-content-center align-items-center flex-wrap" style="position: relative; top: 150px;">
    <div class="row d-flex mb-3">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="images/salvietti1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="https://es-la.facebook.com/salvietti.oficial/" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="images/salvietti2.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="https://correodelsur.com/capitales/20151222_salvietti-continua-vigente-luego-de-95-anos-gracias-a-formula-secreta.html" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="images/salvietti3.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="http://censoarchivos.mcu.es/CensoGuia/archivodetail.htm?id=1165749" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include('templates/cliente/footer.php'); ?>