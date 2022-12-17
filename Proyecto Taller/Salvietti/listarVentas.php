<?php
include("functions/conexion.php");
$conn = Conexion::conectar();
$consulta = $conn->prepare("SELECT * FROM VENTA INNER JOIN Usuario ON VENTA.IdCliente = Usuario.IdUsuario");
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
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo de Documento</th>
                    <th scope="col">N° Documento</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Monto Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $pedido) : ?>
                    <tr>
                        <th scope="row"><?php echo $pedido['IdVenta'] ?></th>
                        <td><?php echo $pedido['NombreCompleto'] ?></td>
                        <td><?php echo $pedido['TipoDocumento'] ?></td>
                        <td><?php echo $pedido['NumeroDocumento'] ?></td>
                        <td><?php echo $pedido['DireccionCliente'] ?></td>
                        <td><?php echo $pedido['MontoTotal'] ?></td>
                        <td>
                            <a href="javascript:cargarPagina('formEditarCategoria.php?id=<?php echo $pedido['IdVenta'] ?>')" class="btn btn-warning">Editar</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmacion<?php echo $pedido['IdVenta'] ?>">Eliminar</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalConfirmacion<?php echo $pedido['IdVenta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center" id="mensaje">
                                    <p>¿Está seguro que desea eliminar el pedido N° <?php echo $pedido['IdVenta'] ?> de <?php echo $pedido['NombreCompleto']; ?>?</p>
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