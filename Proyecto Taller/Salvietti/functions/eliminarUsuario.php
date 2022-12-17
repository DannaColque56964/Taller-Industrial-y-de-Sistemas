<?php
    include("conexion.php");

    $id = $_GET['id'];

    /* $sql = "INSERT INTO clientes (nombres, apellidos, correo, pass) VALUES ('$nombres', '$apellidos', '$correo', '$pass')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Usuario registrado";
    }else{
        echo "Error al registrar usuario";
    } */

    $conn = Conexion::conectar();
        
    $sql = $conn->prepare("DELETE FROM Usuario WHERE IdUsuario = ?");
    $result = $sql->execute([$id]);
    if($result){
        Header('Location: ../listarUsuarios.php');
    } else {
        echo "Error al eliminar usuario";
    }
    
?>