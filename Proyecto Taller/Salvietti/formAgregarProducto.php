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
    <form action="javascript:agregarProducto()" method="post" id="formAgregarProducto">
        <div class="row mb-3">
            <label for="codigo" class="col-sm-1 col-form-label">Codigo:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="codigo" name="codigo">
            </div>
            <label for="nombre" class="col-sm-1 col-form-label">Nombre:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
        </div>
        <div class="row mb-3">
            <label for="descripcion" class="col-sm-1 col-form-label">Descripcion:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
            <label for="categoria" class="col-sm-1 col-form-label">Categoria:</label>
            <div class="col-sm-5">
                <select name="categoria" id="categoria" class="form-select">
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?php echo $categoria['IdCategoria'] ?>"><?php echo $categoria['DescripcionCat'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="stock" class="col-sm-1 col-form-label">Stock:</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
            <label for="precio" class="col-sm-1 col-form-label">Precio Compra:</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="precioCompra" name="precioCompra">
            </div>
            <label for="precio" class="col-md-1 col-form-label">Precio Venta:</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="precioVenta" name="precioVenta">
            </div>
        </div>
        <div class="row mb-3">
            <label for="imagen" class="col-sm-1 col-form-label">Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
        <button type="submit" id="btnAgregarProducto" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
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
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('listarProductos.php')">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
</body>

</html>