<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include("functions/conexion.php");
    $conn = Conexion::conectar();
    $resultado = $conn->prepare("SELECT * FROM presentacion");
    $resultado->execute();
    $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Categorias</h1>
    <form action="javascript:agregarCategoria()" method="POST" id="formAgregarCategoria">
        <div class="row mb-3">
            <label for="descripcion" class="col-sm-1 col-form-label">Descripcion:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
            <button type="submit" class="col-sm-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoriaModal">Agregar</button>
        </div>
    </form>

    <div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="mensajeCategoria">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('categorias.php')">Aceptar</button>
            </div>
            </div>
        </div>
    </div>

    <div id="categorias">
        <?php include("listarCategorias.php"); ?>
    </div>

    <h1>Roles</h1>
    <form action="javascript:agregarRol()" method="post" id="formAgregarRol">
        <div class="row mb-3">
            <label for="descripcionRol" class="col-sm-1 col-form-label">Descripcion:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="descripcionRol" name="descripcionRol">
            </div>
            <button type="submit" class="col-sm-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#rolModal">Agregar</button>
        </div>
    </form>

    <div class="modal fade" id="rolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="mensajeRol">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('categorias.php')">Aceptar</button>
            </div>
            </div>
        </div>
    </div>

    <div id="roles">
        <?php include("listarRoles.php"); ?>
    </div>
</body>

</html>