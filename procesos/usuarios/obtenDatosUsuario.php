<?php 

   require_once "../../clases/Conexion.php";
   require_once "../../clases/Usuarios.php";

   $obj = new usuarios;

   echo json_encode($obj-> obteneDatosUsuario($_POST['idusuario']));

 ?>