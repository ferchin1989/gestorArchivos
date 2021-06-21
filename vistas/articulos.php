<?php

   session_start();
   if(isset($_SESSION['usuario'])){
    /*echo  $_SESSION['usuario'];*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Articulos y Productos</title>
    <?php require_once "menu.php";?>
    <?php require_once "../clases/Conexion.php";
         $c= new conectar();
         $conexion=$c->conexion();
         $sql="SELECT id_categoria,nombreCategoria
                 from categorias";
         $result=mysqli_query($conexion,$sql);
    ?>
</head>
<body>
    <div class="container">
        <h1>Articulos y Productos</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmArticulos" enctype="multipart/form-data" >

                       <label>Categoria</label>
                       <select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
                         <option value="A">Selecciona Categoria</option>

                         <?php while($ver=mysqli_fetch_row($result)): ?>
                           <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?>
                           </option>
                         <?php endwhile; ?>

                       </select>
                       <label>Nombre</label>
                       <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                       <label>Descripcion</label>
                       <input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
                       <label>Cantidad</label>
                       <input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
                       <label>Precio</label>
                       <input type="text" class="form-control input-sm" id="precio" name="precio">
                       <label>Imagen de Articulo</label>
                       <input type="file" id="imagen" name="imagen">
                       <p></p>
                       <span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>

                </form>

            </div>

            <div class="col-sm-8" >
                <div id="tablaArticulosLoad"  style="width:800px; height:600px; overflow: scroll;">
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="abreModalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualizar Articulo</h4>
          </div>
          <div class="modal-body">
              
                <form id="frmArticulosU" enctype="multipart/form-data" >

                       <input type="text" hidden="" name="idArticulo" id="idArticulo">
                       <label>Categoria</label>
                       <select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
                         <option value="A">Selecciona Categoria</option>

                         <?php 

                                          $sql="SELECT id_categoria,nombreCategoria
                                                  from categorias";
                                          $result=mysqli_query($conexion,$sql);

                          ?>

                         <?php while($ver=mysqli_fetch_row($result)): ?>
                           <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?>
                           </option>
                         <?php endwhile; ?>

                       </select>
                       <label>Nombre</label>
                       <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                       <label>Descripcion</label>
                       <input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
                       <label>Cantidad</label>
                       <input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
                       <label>Precio</label>
                       <input type="text" class="form-control input-sm" id="precioU" name="precioU">

                </form>

          </div>
          <div class="modal-footer">
            <button id="btnActualizaArticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
          </div>
        </div>
      </div>
    </div>

</body>
</html>

<script type="text/javascript">
   $(document).ready(function(){
      $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

      $('#btnAgregaArticulo').click(function(){

             vacios = validarFormVacio('frmArticulos');

            if(vacios > 0){

                alertify.alert("Debes llenar los campos vacios!!");
                return false;

            }

             var formData = new FormData(document.getElementById("frmArticulos"));

             $.ajax({
                      url:"../procesos/articulos/insertarArticulos.php",
                      type:"post",
                      dataType:"html",
                      data:formData,
                      cache: false,
                      contentType:false,
                      processData:false,

                      success:function(r)
                      {

                        if(r==1)
                        {
                          $('#frmArticulos')[0].reset();
                          $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                          alertify.success("Agregado con exito");
                        }

                        else
                        {
                          alertify.error("Error al subir el archivo o imagen ya existe");
                        }
                      }
                   });

           });
   });

</script>


<script type="text/javascript">
  
       function agregaDatosArticulo(idarticulo)
       {

          $.ajax
          ({

              type:"POST",
              data:"idart=" + idarticulo,
              url:"../procesos/articulos/obtenerDatosArticulo.php",
              success:function(r)
              {
                dato=jQuery.parseJSON(r);
                $('#idArticulo').val(dato['id_producto']);
                $('#categoriaSelectU').val(dato['id_categoria']);
                $('#nombreU').val(dato['nombre']);
                $('#descripcionU').val(dato['descripcion']);
                $('#cantidadU').val(dato['cantidad']);
                $('#precioU').val(dato['precio']);
              }

          });

       }

       function eliminarArticulo(idArticulo)
       {

           alertify.confirm('¿ Desea eliminar el Articulo?',


              function()
              {
                $.ajax({
                         type:"POST",
                         data:"idarticulo=" + idArticulo,
                         url:"../procesos/articulos/eliminarArticulo.php",
                         success:function(r)
                         {
                           if(r==1)
                           {
                             $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                             alertify.success("Articulo eliminado");
                           }
                           else
                           {
                             alertify.error("Error eliminando Articulo");
                           }
                         }
                       })
              },

              function()
              {
                alertify.error('Cancelada eliminacion de categoria!')
              });

        }

</script>

<script type="text/javascript">
  
   $(document).ready(function()
   {

    $('#btnActualizaArticulo').click(function()
      {
         datos=$('#frmArticulosU').serialize();
         $.ajax(
         {

            type:"POST",
            data:datos,
            url:"../procesos/articulos/actualizaArticulos.php",
            success:function(r)
            {
               if(r==1)
               {
                 $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                 alertify.success("Actualizado con exito");
               }
               else
               {
                 alertify.error("error al actualizar");
               }
            }

         })
      });

   });

</script>

<?php

   }
   else{
      header("location:../index.php");

   }

?>
