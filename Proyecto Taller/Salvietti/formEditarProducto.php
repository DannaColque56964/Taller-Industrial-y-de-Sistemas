<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("functions/conexion.php");
    $conn = Conexion::conectar();
    $id = $_GET['id'];
    $resultado = $conn->prepare("SELECT * FROM Presentacion");
    $resultado->execute();
    $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $resultado = $conn->prepare("SELECT * FROM Producto Where IdProducto = ?");
    $resultado->execute([$id]);
    $productos = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form action="javascript:editarProducto()" method="post" id="formEditarProducto">
        <input type="hidden" id="Id" name="Id" value="<?php echo $id; ?>">
        <?php foreach ($productos as $producto) { ?>
            <div class="row mb-3">
                <label for="codigo" class="col-sm-1 col-form-label">Codigo:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $producto["Codigo"]; ?>">
                </div>
                <label for="nombre" class="col-sm-1 col-form-label">Nombre:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto["Nombre"]; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="descripcion" class="col-sm-1 col-form-label">Descripcion:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $producto["Descripcion"]; ?>">
                </div>
                <label for="categoria" class="col-sm-1 col-form-label">Categoria:</label>
                <div class="col-sm-5">
                    <select name="categoria" id="categoria" class="form-select" value="<?php echo $producto["IdPresentacion"]; ?>">
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?php echo $categoria['IdCategoria'] ?>"><?php echo $categoria['DescripcionCat'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="stock" class="col-sm-1 col-form-label">Stock:</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto['Stock']; ?>">
                </div>
                <label for="precio" class="col-sm-1 col-form-label">Precio Compra:</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="precioCompra" name="precioCompra" value="<?php echo $producto['PrecioCompra']; ?>">
                </div>
                <label for="precio" class="col-md-1 col-form-label">Precio Venta:</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="precioVenta" name="precioVenta" value="<?php echo $producto['Stock']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="imagen" class="col-sm-1 col-form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
        <?php } ?>
        <button type="submit" id="btnAgregarProducto" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Guardar</button>
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('listarProductos.php')">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>