<?php
   
   session_start();
   if(isset($_SESSION['usuario'])){
    /*echo  $_SESSION['usuario'];*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
    <?php require_once "menu.php";?>
</head>
<body>
     <div class="container">
         <h1>Venta de Productos</h1>
         <div class="row">
             <div class="col-sm-12">
                 <span class="btn btn-default" id="VentaProductosBtn">Vender Producto</span>
                 <span class="btn btn-default" id="VentasHechasBtn">Ventas Hechas</span>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                  <div id="VentaProductos"></div>
                  <div id="VentasHechas"></div>
             </div>
         </div>
     </div>
    
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#VentaProductosBtn').click(function(){
         esconderSeccionVenta();
         $('#VentaProductos').load('ventas/ventasDeProductos.php');
         $('#VentaProductos').show(); 
    });

        $('#VentasHechasBtn').click(function(){
         esconderSeccionVenta();
         $('#VentasHechas').load('ventas/ventasyReportes.php');
         $('#VentasHechas').show(); 
    });

    function esconderSeccionVenta(){
      $('#VentaProductos').hide();
      $('#VentasHechas').hide();

    }

    });
</script>


<?php
   
   } 
   else{
      header("location:../index.php");

   }

?>