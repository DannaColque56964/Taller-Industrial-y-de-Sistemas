<?php include("templates/cliente/header.php"); ?>
<?php include("functions/conexion.php"); ?>
<?php include("functions/pedidoCompra.php"); ?>
<?php include("templates/cliente/navbar.php"); ?>

<div class="container" style="position: relative; top: 125px;">
    <h1>Productos Disponibles a Pedido</h1>
    <br>

    <?php if ($mensaje != "") { ?>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="mostrarPedido.php" class="badge badge-success">Ver Carrito(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);  ?>)</a>
        </div>
    <?php } ?>

    <div class="row d-flex flex-wrap justify-content-between align-items-center p-3">
        <!-- nombre, precio_unitario,imagen,descripcion,cantidad -->
        <!-- insetar stock desde la -->
        <?php
        //$sql = "SELECT * FROM `producto`";
        //$resultado=$conn->query($sql);

        $conn = Conexion::conectar();
        $resultado = $conn->prepare("SELECT * FROM producto");
        $resultado->execute();
        $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $fila) { ?>
            <div class="col-xs-9 col-sm-6 col-md-4 ">
                <div class="card my-3">
                    <img title="<?php echo $fila['Nombre']; ?>" alt="<?php echo $fila['Nombre']; ?>" class="card-img-top img-fluid" src="images/productos/<?php echo $fila['Imagen']?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $fila['Nombre']; ?>" height="100px">

                    <div class="card-body">
                        <h5><?php echo $fila['Nombre']; ?></h5>
                        <h3 class="card-title">Bs. <?php echo $fila['PrecioVenta']; ?></h3>
                        <!-- DESCRIPCION DE RELLENO -->
                        <p class="card-text"><?php echo $fila['Descripcion']; ?></p>

                        <!-- DESCRIPCION QUE DEBERIA APARECER -->
                        <!-- <p class="card-text">
                        <?php //echo $fila['descripcion']; 
                        ?>
                        </p> -->
                        
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo $fila['IdProducto']; ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $fila['Nombre']; ?>">
                            <input type="hidden" name="precioVenta" id="precioVenta" value="<?php echo $fila['PrecioVenta']; ?>">
                            <div class="row mb-3">
                                <span class="input-group-text col-md-6 text-center">Paquetes</span>
                                <div class="col-md-6">
                                    <input class="form-control" name="cantidad" id="cantidad" type="number" min="1" value="1">
                                </div>
                            </div>

                            <button class="btn btn-primary" name="btAccion" value="Agregar" type="submit">Agregar al carrito</button>
                        </form>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<?php include("templates/cliente/footer.php"); ?>