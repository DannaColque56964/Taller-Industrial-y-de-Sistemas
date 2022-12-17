<?php 
    include 'conexion.php';
    include 'pedidoCompra.php';

    $tipoDocumento = $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['numeroDocumento'];
    $direccion = $_POST['direccion'];
    $resultado = "";
    $mensaje = "";
    $total = $_POST['total'];
    $conn = Conexion::conectar();

    $sql = $conn->prepare("EXECUTE sp_RegistrarVenta @idCliente = ?, @tipoDocumento = ?, @numeroDocumento = ?, @direccion = ?, @total = ?, @Resultado = ?, @Mensaje = ?");
    $result = $sql->execute([2, $tipoDocumento, $numeroDocumento, $direccion, $total, $resultado, $mensaje]); 

    $lastInsertId = $conn->lastInsertId();

    foreach( $_SESSION['CARRITO'] as $i=>$producto )  {
        $nombre = $_POST['nombre' .$i ];
        $precio = $_POST['precio_unitario'.$i ];
        $cantidad = $_POST['cantidad'.$i];
        $idProducto = $_POST['idProducto'.$i];
        $total = $_POST['precio_unitario'.$i ] * $_POST['cantidad'.$i];
        //$sql = $conn->prepare("EXECUTE sp_Detalle(?, ?, ?, ?, ?, ?, @resultado, @mensaje)");
        $sql = $conn->prepare("EXECUTE sp_Detalle @idCompra = ?, @idVenta = ?, @idProducto = ?, @precioVenta = ?, @cantidad = ?, @montoTotal = ?, @Resultado = ?, @Mensaje = ?");
        $result = $sql->execute([$lastInsertId, $lastInsertId, $idProducto, $precio, $cantidad, $total, $resultado, $mensaje]);
    }

    if($result){
        unset($_SESSION['CARRITO']);
        echo "Registro exitoso";
    }else{
        echo "Error al registrar";
    }



?>