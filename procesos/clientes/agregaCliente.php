<?php 

     session_start();

     require_once "../../clases/Conexion.php";
     require_once "../../clases/Clientes.php";

     /*print_r($_POST);*/

     $obj =new clientes();

     $datos=array(
     	          $_POST['nombre'],
                    $_POST['apellido'],
                    $_POST['direccion'],
                    $_POST['email'],
                    $_POST['telefono'],
                    $_POST['rfc']
                 );

     echo $obj->agregaClientes($datos);



 ?>