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
    $id = $_GET['id'];
    $resultado = $conn->prepare("SELECT * FROM Presentacion WHERE IdCategoria = ?");
    $resultado->execute([$id]);
    $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Categoria</h1>
    <form action="javascript:editarCategoria()" method="POST" id="formEditarCategoria">
        <?php foreach ($categorias as $categoria) { ?>
            <div class="row mb-3">
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                <label for="descripcion" class="col-sm-1 col-form-label">Descripcion:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $categoria['DescripcionCat'] ?>">
                </div>
                <button type="submit" class="col-sm-2 btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Guardar</button>
            </div>
        <?php } ?>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="mensaje">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('categorias.php')">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>