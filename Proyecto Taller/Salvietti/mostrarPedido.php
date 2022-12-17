<?php

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 4){
        header('location: login.php');
    }
}

include('functions/conexion.php');
include('functions/pedidoCompra.php');
include('templates/cliente/header.php');
include('templates/cliente/navbar.php');

$total = 0;
    /*session_destroy()*/;
?>

<div class="container" style="position: relative; top: 115px;">
    <br>
    <h3>Lista de carrito</h3>
    <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <table class="table table-light table-bordered">
            <tbody>
                <tr>
                    <th width="40%">Descripcion</th>
                    <th width="15%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%">Total</th>
                    <th width="5%">--</th>
                </tr>


                <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                    <tr>
                        <td width="40%"><?php echo $producto['nombre'] ?></td>
                        <td width="15%" class="text-center"> <?php echo $producto['cantidad'] ?> </td>
                        <td width="20%" class="text-center"> <?php echo $producto['precio_unitario'] ?> </td>
                        <td width="20%" class="text-center"> <?php echo number_format($producto['precio_unitario'] * $producto['cantidad'], 2)   ?> </td>
                        <td width="5%">
                            <form action="" method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $producto['id'] ?>">
                                <button class="btn btn-danger" type="submit" name="btAccion" value="Eliminar">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                    <?php $total = $total + ($producto['precio_unitario'] * $producto['cantidad']);/* $producto['cantidad']); */ ?>

                <?php }; ?>


                <tr>
                    <td colspan="3" align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="right">
                        <h3>Bs. <?php echo number_format($total, 2); ?></h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="container-fluid">
                            <form action="javascript:registrarPedido()" method="POST" id="formRegistrarPedido">
                                <div class="row mb-3">
                                    <label for="tipoDocumento" class="form-label">Tipo de Documento: </label>
                                    <select name="tipoDocumento" class="form-select" id="tipoDocumento">
                                        <option value="NIT">NIT</option>
                                        <option value="CI">CI</option>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <label for="numeroDocumento" class="form-label">Numero de Documento: </label>
                                    <input type="text" name="numeroDocumento" class="form-control" id="numeroDocumento">
                                </div>
                                <div class="row mb-3">
                                    <label for="direccion" class="form-label">Direccion: </label>
                                    <input type="text" name="direccion" id="direccion" class="form-control">
                                </div>
                                <?php
                                foreach ($_SESSION['CARRITO'] as $i => $producto) { ?>
                                    <input type="hidden" name="nombre<?php echo $i; ?>" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                    <input type="hidden" name="precio_unitario<?php echo $i; ?>" id="precio_unitario" value="<?php echo $producto['precio_unitario']; ?>">
                                    <input type="hidden" name="cantidad<?php echo $i; ?>" id="cantidad" value="<?php echo $producto['cantidad']; ?>">

                                    <input type="hidden" name="idProducto<?php echo $i; ?>" id="idProducto" value="<?php echo $producto['id']; ?>">
                                <?php }; ?>
                                <input type="hidden" name="total" id="total" value="<?php echo $total; ?>">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Proceder a pagar >>
                                </button>
                            </form>


                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-success"> No hay productos en el carrito</div>
    <?php }; ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="modal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cargarPagina('index.php')">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include('templates/cliente/footer.php') ?>