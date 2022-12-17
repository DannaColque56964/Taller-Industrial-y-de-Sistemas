<?php
    include("conexion.php");

    $id = $_GET['id'];
    $conn = Conexion::conectar();
        
    $sql = $conn->prepare("DELETE FROM Presentacion WHERE IdCategoria = ?");
    $result = $sql->execute([$id]);
    if($result){
        Header('Location: ../categorias.php');
    } else {
        echo "Error al eliminar categoria";
    }
    
?>