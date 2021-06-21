<?php

  require_once"../../clases/Conexion.php";
  require_once"../../clases/Categorias.php";

  $_POST['idcategoria'];
  $_POST['categoriaE'];

  $datos=array(
                $_POST['idcategoria'],
                $_POST['categoriaE']
              );

  $obj= new categorias();

  echo $obj-> actualizaCategoria($datos);

?>
