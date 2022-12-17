<?php
    include("conexion.php");

    $descripcion = $_POST['descripcionRol'];
    $conn = Conexion::conectar();
        
    $sql = $conn->prepare("INSERT INTO ROL(DescripcionRol) VALUES(?)");
    $result = $sql->execute([$descripcion]);

    $lastInsertId = $conn->lastInsertId();
    if($result) {
        echo "Rol registrado";
    } else {
        echo "Error al registrar rol";
    }
?>