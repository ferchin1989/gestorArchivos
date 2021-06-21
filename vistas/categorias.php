<?php

   session_start();
   if(isset($_SESSION['usuario'])){
    /*echo  $_SESSION['usuario'];*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorias</title>
    <?php require_once "menu.php";?>
</head>
<body>

      <div class="container">
        <h1>Categorias</h1>
          <div class="row">
               <div class ="col-sm-4">
                    <form id="frmCategorias">
                          <label>Categoria</label>
                          <input type="text" class="form-control input-sm" name="categoria" id="categoria">
                          <p></p>
                          <span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
                    </form>
               </div>
               <div class ="col-sm-6">
                   <div id="tablaCategoriaLoad"></div>

               </div>
          </div>
      </div>


<!--button modal-->
<div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
        <h4 class="modal-title" id="myModalLabel"> Actualiza Categorias </h4>
      </div>
      <div class="modal-body">
        <form id="frmCategoriaE">
          <input type="text" hidden="" id="idcategoria" name="idcategoria">
          <label> Categoria </label>
          <input type="text" id="categoriaE" name="categoriaE" class="form-control input-sm">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class "btn btn-warning" id="btnActualizaCategoria" data-dismiss="modal"> Guardar </button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<!--boton agregar categoria-->

<script type="text/javascript">
       $(document).ready(function()
       {

           $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");

           $('#btnAgregaCategoria').click(function()
           {

             vacios = validarFormVacio('frmCategorias');

            if(vacios > 0){

                alertify.alert("Debes llenar los campos vacios!!");
                return false;

            }


                 datos=$('#frmCategorias').serialize();
                 $.ajax({
                     type:"POST",
                     data:datos,
                     url:"../procesos/categorias/agregaCategoria.php",
                     success:function(r)
                     {

                        if(r == 1){
                            //limpia el formulario al insertar un registro
                            $('#frmCategorias')[0].reset();
                            $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
                            alertify.success("Categoria Agregada con Exito");
                        }
                        else{
                            alertify.error("No se Pudo Agregar Categoria");
                        }

                     }
                 });
           });

        });
</script>

<!--boton editar categoria-->

<script type="text/javascript">

  $(document).ready(function()
  {
    $('#btnActualizaCategoria').click(function()
    {

      datos=$('#frmCategoriaE').serialize();
      $.ajax({
        type:"POST",
        data:datos,
        url:"../procesos/categorias/actualizaCategoria.php",
        success:function(r)
        {
            if(r==1){
              $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
              alertify.success("Actualizado con Exito");
            }
            else{
              alertify.error("No se pudo actualizar");
            }
        }
      });

    });
  });

</script>

<script type="text/javascript">

  function agregaDato(idCategoria,categoria)
  {
     $('#idcategoria').val(idCategoria);
     $('#categoriaE').val(categoria);
  }

  function eliminaCategoria(idcategoria)
  {

       alertify.confirm('¿ Desea eliminar la categoria ?',

       function()
       {
         $.ajax({
                  type:"POST",
                  data:"idcategoria=" + idcategoria,
                  url:"../procesos/categorias/eliminarCategoria.php",
                  success:function(r)
                  {
                    if(r==1)
                    {
                      $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
                      alertify.success("Categoria eliminado");
                    }
                    else
                    {
                      alertify.error("Error eliminando categoria");
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

<?php

   }
   else{
     header("location:../index.php");

   }

?>
