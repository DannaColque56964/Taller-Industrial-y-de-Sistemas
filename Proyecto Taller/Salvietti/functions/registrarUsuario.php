<?php
    include("conexion.php");

    $documento = $_POST['documento'];
    $nombres = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $rol = $_POST['rol'];

    $conn = Conexion::conectar();
    $sql="INSERT INTO USUARIO(Documento,NombreCompleto,Correo,Contraseña,IdRol) 
    values(?,?,?,?,?)";
        
    $sql = $conn->prepare($sql);
    $result = $sql->execute([strval($documento), $nombres, $correo, $pass, intval($rol)]);

    $lastInsertId = $conn->lastInsertId();
    if($result) {
        echo "Usuario registrado";
    } else {
        echo "Error al registrar usuario";
    }  
?>