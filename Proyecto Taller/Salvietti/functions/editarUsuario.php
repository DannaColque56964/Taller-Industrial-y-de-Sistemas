<?php
    include("conexion.php");

    $id = $_POST['Id'];
    $documento = $_POST['documento'];
    $nombres = $_POST['nombreCompleto'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $rol = $_POST['rol'];

    $conn = Conexion::conectar();
    $sql = $connect->prepare("UPDATE USUARIO
        SET Documento = ?
            ,NombreCompleto = ?
            ,Correo = ?
            ,Contraseña = ?
            ,IdRol = ?
        WHERE IdUsuario = ?");

    $result = $sql->execute([$documento, $nombres, $correo, $pass, $rol, $id]);

    $lastInsertId = $connect->lastInsertId();
    if($result){
        echo "Usuario actualizado";
    } else {
        echo "Error al actualizar usuario";
    }
?>