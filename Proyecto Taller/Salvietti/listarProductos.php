<?php
include("functions/conexion.php");
$conn = Conexion::conectar();

$consulta = $conn->prepare("SELECT * FROM Producto inner join PRESENTACION on PRODUCTO.IdPresentacion = PRESENTACION.IdCategoria");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Precio Compra</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $producto) : ?>
                    <tr>
                        <th scope="row"><?php echo $producto['IdProducto'] ?></th>
                        <td><?php echo $producto['Codigo'] ?></td>
                        <td><?php echo $producto['Nombre'] ?></td>
                        <td><?php echo $producto['Descripcion'] ?></td>
                        <td><?php echo $producto['DescripcionCat'] ?></td>
                        <td><?php echo $producto['Stock'] ?></td>
                        <td><?php echo $producto['PrecioCompra'] ?></td>
                        <td><?php echo $producto['PrecioVenta'] ?></td>
                        <td><img src="<?php echo $producto['Imagen']; ?>" alt="img-producto"></td>
                        <td>
                            <a href="javascript:cargarPagina('formEditarProducto.php?id=<?php echo $producto['IdProducto'] ?>')" class="btn btn-warning">Editar</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmacion<?php echo $producto['IdProducto'] ?>">Eliminar</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalConfirmacion<?php echo $producto['IdProducto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center" id="mensaje">
                                    <p>¿Está seguro que desea eliminar el producto <?php echo $producto['Nombre']; ?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cargarPagina('functions/eliminarProducto.php?id=<?php echo $producto['IdProducto'] ?>')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>