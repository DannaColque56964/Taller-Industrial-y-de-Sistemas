<?php
    include("conexion.php");
    $id = $_POST['Id'];
    $descripcion = $_POST['descripcion'];

    $conn = Conexion::conectar();
    $sql = $conn->prepare("UPDATE ROL
    SET DescripcionRol = ?
    WHERE IdRol = ?"); 
    $result = $sql->execute([$descripcion, $id]);

    $lastInsertId = $conn->lastInsertId();
    if($result){
        echo "Rol actualizado";
    } else {
        echo "Error al actualizar rol";
    }
?>