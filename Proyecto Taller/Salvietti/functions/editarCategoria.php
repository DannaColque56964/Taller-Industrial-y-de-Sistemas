<?php
    include("conexion.php");
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];

    $conn = Conexion::conectar();
    $sql = $conn->prepare("UPDATE PRESENTACION
    SET DescripcionCat = ?
    WHERE IdCategoria = ?");
        
   /*  $sql->bindParam(':codigo',$documento,PDO::PARAM_STR, 50);
    $sql->bindParam(':nombre',$nombres,PDO::PARAM_STR, 50);
    $sql->bindParam(':descripcion',$correo,PDO::PARAM_STR, 50);
    $sql->bindParam(':categoria',$pass,PDO::PARAM_INT);
    $sql->bindParam(':stock',$correo,PDO::PARAM_INT);
    $sql->bindParam(':precioCompra',$pass,PDO::PARAM_STR,50);
    $sql->bindParam(':precioVenta',$rol,PDO::PARAM_STR,50); */
        
    $result = $sql->execute([$descripcion, $id]);

    $lastInsertId = $conn->lastInsertId();
    if($result){
        echo "Categoria actualizada";
    } else {
        echo "Error al actualizar categoria";
    }
?>