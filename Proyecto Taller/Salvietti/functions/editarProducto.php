<?php
    include("conexion.php");
    $id = $_POST['Id'];
    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];

    $conn = Conexion::conectar();
    $sql = $conn->prepare("UPDATE PRODUCTO
    SET Codigo = ?
        ,Nombre = ?
        ,Descripcion = ?
        ,IdPresentacion = ?
        ,Stock = ?
        ,PrecioCompra = ?
        ,PrecioVenta = ?
    WHERE IdProducto = ?");
        
   /*  $sql->bindParam(':codigo',$documento,PDO::PARAM_STR, 50);
    $sql->bindParam(':nombre',$nombres,PDO::PARAM_STR, 50);
    $sql->bindParam(':descripcion',$correo,PDO::PARAM_STR, 50);
    $sql->bindParam(':categoria',$pass,PDO::PARAM_INT);
    $sql->bindParam(':stock',$correo,PDO::PARAM_INT);
    $sql->bindParam(':precioCompra',$pass,PDO::PARAM_STR,50);
    $sql->bindParam(':precioVenta',$rol,PDO::PARAM_STR,50); */
        
    $result = $sql->execute([$codigo, $nombres, $descripcion, intval($categoria), intval($stock), floatval($precioCompra), floatval($precioVenta), $id]);

    $lastInsertId = $conn->lastInsertId();
    if($result){
        echo "Producto actualizado";
    } else {
        echo "Error al actualizar producto";
    }
?>