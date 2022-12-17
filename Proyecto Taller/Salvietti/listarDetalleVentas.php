<?php
include("functions/conexion.php");
$conn = Conexion::conectar();
$consulta = $conn->prepare("SELECT * FROM DETALLE_VENTA INNER JOIN Producto ON DETALLE_VENTA.IdProducto = Producto.IdProducto");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de Ventas
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">N° Pedido</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Monto Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $pedido) : ?>
                    <tr>
                        <th scope="row"><?php echo $pedido['IdDetalleVenta'] ?></th>
                        <td><?php echo $pedido['IdVenta'] ?></td>
                        <td><?php echo $pedido['Nombre'] ?></td>
                        <td><?php echo $pedido['PrecioVenta'] ?></td>
                        <td><?php echo $pedido['Cantidad'] ?></td>
                        <td><?php echo $pedido['SubTotal'] ?></td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmacion<?php echo $pedido['IdDetalleVenta'] ?>">Eliminar</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalConfirmacion<?php echo $pedido['IdDetalleVenta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center" id="mensaje">
                                    <p>¿Está seguro que desea eliminar el pedido N° <?php echo $pedido['IdDetalleVenta'] ?> de <?php echo $pedido['NombreCompleto']; ?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cargarPagina('functions/eliminarCategoria.php?id=<?php echo $producto['IdCategoria'] ?>')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>            
            </tbody>
        </table>
    </div>
</div>