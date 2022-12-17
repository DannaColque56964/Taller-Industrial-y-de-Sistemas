<?php
    include("conexion.php");

    $id = $_GET['id'];
    $conn = Conexion::conectar();
    $sql = $conn->prepare("DELETE FROM Producto WHERE IdProducto = ?");
    $result = $sql->execute([$id]);

    if($result) {
        Header('Location: ../listarProductos.php');
    } else {
        echo "Error al eliminar producto";
    }
    
?>