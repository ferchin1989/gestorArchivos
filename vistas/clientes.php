<?php
   
   session_start();
   if(isset($_SESSION['usuario'])){
    /*echo  $_SESSION['usuario'];*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <?php require_once "menu.php";?>
</head>
<body>

    <div class="container">
        <h1>Clientes</h1>
        <div class="row">
            <div class="col-sm-4">

                <form id="frmClientes" enctype="multipart/form-data" >
                       <label>Nombre</label>
                       <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                       <label>Apellido</label>
                       <input type="text" class="form-control input-sm" id="apellido" name="apellido">
                       <label>Direccion</label>
                       <input type="text" class="form-control input-sm" id="direccion" name="direccion">
                       <label>Email</label>
                       <input type="text" class="form-control input-sm" id="email" name="email">
                       <label>Telefono</label>
                       <input type="text" class="form-control input-sm" id="telefono" name="telefono">
                       <label>RFC</label>
                       <input type="text" class="form-control input-sm" id="rfc" name="rfc">
                       <p></p>
                       <span id="btnAgregaCliente" class="btn btn-primary">Agregar</span>
                </form>

            </div>

            <div class="col-sm-8">
                <div id="tablaClientesLoad">
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="abremodalClientesUpadate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title" id="myModalLabel">Actualizar Cliente</h4>
           </div>
           <div class="modal-body">
               
                <form id="frmClientesU" enctype="multipart/form-data" >

                       <input type="text" hidden="" id="idclienteU" name="idclienteU">
                       <label>Nombre</label>
                       <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                       <label>Apellido</label>
                       <input type="text" class="form-control input-sm" id="apellidoU" name="apellidoU">
                       <label>Direccion</label>
                       <input type="text" class="form-control input-sm" id="direccionU" name="direccionU">
                       <label>Email</label>
                       <input type="text" class="form-control input-sm" id="emailU" name="emailU">
                       <label>Telefono</label>
                       <input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
                       <label>RFC</label>
                       <input type="text" class="form-control input-sm" id="rfcU" name="rfcU">

                </form>

           </div>
           <div class="modal-footer">
             <button id="btnAgregaClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
           </div>
        </div>
      </div>
    </div>
    
</body>
</html>

<script type="text/javascript">
  
  function agregaDatosCliente(idcliente){
      $.ajax({
           type:"POST",
           data:"idcliente="+idcliente,
           url:"../procesos/clientes/obtenDatosCliente.php",
           success:function(r){
               
               dato=jQuery.parseJSON(r);

               $('#idclienteU').val(dato['id_cliente']);
               $('#nombreU').val(dato['nombre']);
               $('#apellidoU').val(dato['apellido']);
               $('#direccionU').val(dato['direccion']);
               $('#emailU').val(dato['email']);
               $('#telefonoU').val(dato['telefono']);
               $('#rfcU').val(dato['rfc']);
           }
      });
  }
  

</script>

<script type="text/javascript">
   $(document).ready(function(){
      $('#tablaClientesLoad').load("clientes/tablaClientes.php");

      $('#btnAgregaCliente').click(function(){

            vacios = validarFormVacio('frmClientes');

            if(vacios > 0){

                alertify.alert("Debes llenar los campos vacios!!");
                return false;

            }


                 datos=$('#frmClientes').serialize();
                 /*console.log(datos); //muestra en consola los datos*/
                 $.ajax({
                     type:"POST",
                     data:datos,
                     url:"../procesos/clientes/agregaCliente.php",
                     success:function(r){
                        /*alert(r); //muestra errores del sistema*/
                        if(r == 1){
                            $('#frmClientes')[0].reset();
                            $('#tablaClientesLoad').load("clientes/tablaClientes.php");
                            alertify.success("Agregado cliente con Exito");
                        }
                        else{
                            alertify.error("No se Pudo Agregar cliente");
                        }

                     }
                 });
           });
   });

</script>

<script type="text/javascript">
  
  $(document).ready(function(){
    $('#btnAgregaClienteU').click(function(){

                 datos=$('#frmClientesU').serialize();
                 /*console.log(datos); //muestra en consola los datos*/
                 $.ajax({
                     type:"POST",
                     data:datos,
                     url:"../procesos/clientes/actualizaCliente.php",
                     success:function(r){
                        /*alert(r); //muestra errores del sistema*/
                        if(r == 1){
                            $('#frmClientes')[0].reset();
                            $('#tablaClientesLoad').load("clientes/tablaClientes.php");
                            alertify.success("Actualizado Cliente con Exito");
                        }
                        else{
                            alertify.error("No se Pudo Actualizar Cliente");
                        }

                     }
                 });

    })
  })
  

</script>

<?php
   
   } 
   else{
       header("location:../index.php");

   }

?>