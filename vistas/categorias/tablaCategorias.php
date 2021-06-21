<?php

      require_once "../../clases/Conexion.php";
      $c= new conectar();
      $conexion=$c->conexion();

      $sql ="SELECT id_categoria,nombreCategoria
               FROM categorias";
      $result=mysqli_query($conexion,$sql);

?>




<div class="table-resposive">
    <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
        <caption><label>Categorias</label></caption>
        <tr>
           <td>Categoria</td>
           <td>Editar</td>
           <td>Eliminar</td>
        </tr>

        <?php

          while($mostrar=mysqli_fetch_row($result)):

        ?>

        <tr>
           <td><?php  echo $mostrar[1]?></td>
           <td>
              <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria"
                   onclick="agregaDato('<?php echo $mostrar[0] ?>','<?php echo $mostrar[1] ?>')">
              <span class="glyphicon glyphicon-pencil"></span>
              </span>
           </td>
           <td>
              <span class="btn btn-danger btn-xs" onclick="eliminaCategoria('<?php echo $mostrar[0] ?>')">
              <span class="glyphicon glyphicon-remove"></span>
              </span>
           </td>
        </tr>

        <?php

          endwhile;

        ?>

    </table>

</div>
