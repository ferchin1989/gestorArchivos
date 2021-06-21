<?php 

   require_once "../../clases/Conexion.php";
   require_once "../../clases/Usuarios.php";

   $obj= new usuarios; 

   $_POST['idusuario'];

   echo $obj-> eliminaUsuario($_POST['idusuario']);

?>