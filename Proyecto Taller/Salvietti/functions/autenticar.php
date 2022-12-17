<?php
    include("conexion.php");

    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    /* $sql = "SELECT * FROM clientes WHERE correo = '$correo' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_array($result);
        if($row['correo'] == $correo && $row['pass'] == $pass){
            echo "Usuario autenticado";
        }else{
            echo "Usuario no autenticado";
        }
    }else{
        echo "Error al autenticar usuario";
    } */
    session_start();
    if(isset($_GET['cerrar_sesion'])){
        session_unset();
        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: dashboard.php');
            break;

            case 4:
                header('location: index.html');
            break;

            default:
        }
    }

    if(isset($_POST['correo']) && isset($_POST['pass'])){
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];

        $conn = Conexion::conectar();
        $query = $conn->prepare('SELECT * FROM USUARIO WHERE Correo = ? AND Contraseña = ?');
        $query->execute([$correo, $pass]);

        $row = $query->fetch(PDO::FETCH_NUM);
        var_dump($row);
        if($row == true){

            echo $row[5];
            $rol = $row[5];
            echo $row[3];
            $correo = $row[3];

            $_SESSION['rol'] = $rol;
            $_SESSION['correo'] = $correo;

            switch($_SESSION['rol']){
                case 1:
                    header('location: ../dashboard.php');
                break;

                case 4:
                    header('location: ../index.php');
                break;

                default:
            }            
        }else{
            // No existe el usuario
            echo "No existe el usuario";
        }
    }
?>