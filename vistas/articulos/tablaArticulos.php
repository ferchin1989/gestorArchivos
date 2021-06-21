<?php

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Articulos.php";

    $c=new conectar();
    $conexion =$c->conexion();

    $sql="SELECT art.nombre,
                 art.descripcion,
                 art.cantidad,
                 art.precio,
                 img.ruta,
                 cat.nombreCategoria,
                 art.id_producto

          from articulos as art 
          inner join imagenes as img
          on art.id_imagen = img.id_imagen
          inner join categorias as cat
          on art.id_categoria = cat.id_categoria";

    $result=mysqli_query($conexion,$sql);

?>

<div class="table-resposive">
   <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
     <caption><label>Articulos</label></caption>
       <tr>
          <td>Nombre</td>
          <td>Descripcion</td>
          <td>Cantidad</td>
          <td>Precio</td>
          <td>Imagen</td>
          <td>Categoria</td>
          <td>Editar</td>
          <td>Eliminar</td>
       </tr>

            <?php 

                   while ($ver=mysqli_fetch_row($result)):

             ?>

       <tr>
          <td><?php echo $ver[0]; ?></td>
          <td><?php echo $ver[1]; ?></td>
          <td><?php echo $ver[2]; ?></td>
          <td><?php echo $ver[3]; ?></td>
          <td>

             <?php 

                 $imgver = explode("/", $ver[4]); 
                 $imgruta = $imgver[1]."/".$imgver[2]."/".$imgver[3]."/".$imgver[4];

             ?>
             <img width="80" height="80" src="<?php  echo $imgruta ?>">
            
          </td>
          <td><?php echo $ver[5]; ?></td>
          <td>
             <span data-toggle="modal" data-target="#abreModalUpdateArticulo" 
                   class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[6] ?>')">

               <span class="glyphicon glyphicon-pencil"></span>
             </span>
          </td>
          <td>
             <span class="btn btn-danger btn-xs" onclick="eliminarArticulo('<?php echo $ver[6] ?>')">
               <span class="glyphicon glyphicon-remove"></span>
             </span>
          </td>
       </tr>

            <?php 

                   endwhile;

             ?>
   </table>
</div>