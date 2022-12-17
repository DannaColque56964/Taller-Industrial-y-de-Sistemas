<?php
  if(isset($_SESSION['rol'])){
      switch($_SESSION['rol']){
          case 1:
              header('location: dashboard.php');
          break;

          case 4:
              header('location: index.html');
          break;

          default:
      }
  }

  if(isset($_POST['correo']) && isset($_POST['pass'])){
      $correo = $_POST['correo'];
      $pass = $_POST['pass'];

      $conn = Conexion::conectar();
      $query = $conn->prepare('SELECT * FROM USUARIO WHERE Correo = ? AND Contraseña = ?');
      $query->execute([$correo, $pass]);

      $row = $query->fetch(PDO::FETCH_NUM);
      var_dump($row);
      if($row == true){

          echo $row[5];
          $rol = $row[5];
          echo $row[3];
          $correo = $row[3];

          $_SESSION['rol'] = $rol;
          $_SESSION['correo'] = $correo;

          switch($_SESSION['rol']){
              case 1:
                  header('location: ../dashboard.php');
              break;

              case 4:
                  header('location: ../index.php');
              break;

              default:
          }            
      }else{
          // No existe el usuario
          echo "No existe el usuario";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <script src="js/functions.js"></script>
    <title>Document</title>
</head>
<body>
    <?php session_start(); ?>
    <section class="vh-100" style="background: rgb(2,0,36);
    background: linear-gradient(135deg, rgba(2,0,36,1) 0%, rgba(4,81,39,1) 35%, rgba(231,178,75,1) 100%);">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="images/salvietti-login.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="functions/autenticar.php" method="post" id="formAutenticar">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Inicia Sesion</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesion con tu cuenta</h5>
      
                        <div class="form-outline mb-4">
                          <input type="email" id="correo" name="correo" class="form-control form-control-lg" />
                          <label class="form-label" for="correo">Correo Electronico</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                          <label class="form-label" for="pass">Contraseña</label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Iniciar Sesion</button>
                        </div>
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center" id="mensaje">
                Usuario Autenticado
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a href="<?php if(isset($_SESSION['rol'])){
                    switch($_SESSION['rol']){
                      case 1:
                          echo 'dashboard.php';
                      break;

                      case 4:
                          echo 'index.html';
                      break;

                      default:
                    }
                  } ?>"
                  style="color:white; text-decoration:none"> Aceptar</a></button>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>