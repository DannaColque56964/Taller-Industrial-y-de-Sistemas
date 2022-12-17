<?php
include("conexion.php");

    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $imagen = $_FILES['imagen']['name'];
    $path = "../images/productos/" . basename($_FILES['imagen']['name']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $path);

    $conn = Conexion::conectar();
    $sql = $conn->prepare("INSERT INTO Producto(Codigo, Nombre, Descripcion, IdPresentacion, Stock, PrecioCompra, PrecioVenta, Imagen) 
        values(?, ?, ?, ?, ?, ?, ?, ?)");
    $result = $sql->execute([$codigo, $nombres, $descripcion, intval($categoria), intval($stock), floatval($precioCompra), floatval($precioVenta), $imagen]);

    $lastInsertId = $conn->lastInsertId();
    /* if($lastInsertId>0){
            echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombres  </div>";
        }
        else{
            echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";
            print_r($sql->errorInfo()); 
        } */
    if ($result) {
        echo "Producto registrado";
    } else {
        echo "Error al registrar producto";
    }
