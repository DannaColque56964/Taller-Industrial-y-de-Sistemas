<?php
    include("conexion.php");

    $descripcion = $_POST['descripcion'];
    $conn = Conexion::conectar();
        
    $sql = $conn->prepare("INSERT INTO PRESENTACION(DescripcionCat) VALUES(?)");
    $result = $sql->execute([$descripcion]);

    $lastInsertId = $conn->lastInsertId();
    if($result){
        echo "Categoria registrada";
    } else {
        echo "Error al registrar categoria";
    }
?>