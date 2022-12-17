<?php 
session_start();


$mensaje="";

if(isset($_POST['btAccion'])){
    switch($_POST['btAccion']){
        case 'Agregar':
            if(is_numeric( $_POST['id'] )){
                $id=$_POST['id'];
            }else{
                $mensaje.="incorrecto".$id;
                break;
            }
            if(is_string( $_POST['nombre'])){
                $nombre=$_POST['nombre'];
            }else{
                $mensaje.="el nombre esta mal:".$nombre;
                break;
            }
            if(is_numeric( $_POST['precioVenta'])){
                $precio_unitario=$_POST['precioVenta'];
            }else{
                $mensaje.="el precio esta mal:".$precio_unitario;
                break;
            }
            if(is_numeric( $_POST['cantidad'] ) ){
                $cantidad=$_POST['cantidad'];
            }else{
                $mensaje.="el cantidad esta mal:".$cantidad;
                break;
            }

          

            /** SI NO ES EXISTE LO TOMA LA SESSION */
            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'id'=>$id,
                    'nombre'=>$nombre,
                    'precio_unitario'=>$precio_unitario,
                    'cantidad'=>$cantidad,
                   
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje = "Producto agregado al carrito"; 
            }else{
                $idProductos=array_column($_SESSION['CARRITO'],'id');
                if(in_array($id,$idProductos)){
                    echo " <script> alert('El producto ya fue seleccionado') </script> ";
                }else{
                     /** CONTADOR DE CARRITO DE COMPRAS */
                    $numeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'id'=>$id,
                        'nombre'=>$nombre,
                        'precio_unitario'=>$precio_unitario,
                        'cantidad'=>$cantidad,
                        
                    );
                    $_SESSION['CARRITO'][$numeroProductos]=$producto;
                    $mensaje = "Producto agregado al carrito"; 
                }
            }
            //mensaje para ver el array
          /*   $mensaje = print_r($_SESSION, true); */
           
            break;
        
        case 'Eliminar':
            
            if(is_numeric( $_POST['id'] )){
                $id=$_POST['id'];

                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['id'] == $id){
                            unset($_SESSION['CARRITO'][$indice]);
                        }
                }



            }else{
                $mensaje.="incorrecto".$id;
               
            }




            break;

    }
}



?>















