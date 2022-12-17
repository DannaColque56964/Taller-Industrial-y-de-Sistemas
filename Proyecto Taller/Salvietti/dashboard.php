<?php
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }
?>
<?php include("templates/administrador/header.php"); ?>
<?php include("templates/administrador/navbar.php"); ?>
<?php include("templates/administrador/sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div id="contenido" class="contenido">
            <?php include("listarPedidos.php"); ?>
        </div>
    </main>


<?php include("templates/administrador/footer.php"); ?>