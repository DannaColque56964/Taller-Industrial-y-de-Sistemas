<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        include("functions/conexion.php");
        $conn = Conexion::conectar();
        $resultado = $conn->prepare("SELECT * FROM rol");
        $resultado->execute();
        $roles = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form action="functions/registrarUsuario.php" method="post" id="formRegistrarUsuario">
        <div class="row mb-3">
            <label for="documento" class="col-sm-1 col-form-label">Documento:</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="documento" name="documento">
            </div>
            <label for="nombre" class="col-sm-1 col-form-label">Nombre Completo:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
        </div>
        <div class="row mb-3">
            <label for="correo" class="col-sm-1 col-form-label">Correo Electronico:</label>
            <div class="col-sm-11">
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pass" class="col-sm-1 col-form-label">Contraseña:</label>
            <div class="col-sm-11">
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
        </div>
        <div class="row mb-3">
            <label for="rol" class="col-sm-1 col-form-label">Rol:</label>
            <div class="col-sm-11">
                <select name="rol" id="rol" class="form-select">
                    <?php foreach($roles as $rol): ?>
                        <option value="<?php echo $rol['IdRol'] ?>"><?php echo $rol['DescripcionRol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="mensaje">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('templates/listarEmpleados.php')">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>