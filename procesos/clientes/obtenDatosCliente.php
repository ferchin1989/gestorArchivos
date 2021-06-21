<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Clientes.php";

    $obj= new clientes();

    $_POST['idcliente'];

    echo json_encode($obj->obtenDatosCliente($_POST['idcliente']));

 ?>