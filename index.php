<?php

   require_once "clases/Conexion.php";
   $obj = new conectar();
   $conexion = $obj->conexion();

   $sql="SELECT * from usuarios where email ='admin'";
   $result=mysqli_query($conexion,$sql);
   $validar=0;

   if(mysqli_num_rows($result) >0){
      $validar = 1;
   }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
    <meta charset="UTF-8">

    <title>Login de Usuario</title>

</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row">
             <div class="col-sm-4"></div>
             <div class="col-sm-4">
                  <div class="panel panel-primary">
                       <div class="panel panel-heading">Sistema de Ventas y Almacen</div>
                       <div class="panel panel-body">
                           <p>
                               <center>
                                  <img src="img/icon.png"  width="100px" height="100px"> 
                               </center>
                              
                           </p>

                           <form id="frmLogin">
                               <label>Usuario</label>
                               <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                               <label>Password</label>
                               <input type="password" class="form-control input-sm" name="password" id="password" >
                               <p></p>
                               <span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
                               <?php if(!$validar):?>
                               <a href="registro.php" class="btn btn-warning btn-sm">Registrar</a>
                               <?php endif;?>

                           </form>
                       </div>
                  </div>
             </div>
             <div class="col-sm-4"></div>
        </div>
       
        
    
    </div>
</body>
</html>

<script type = "text/javascript">


         $(document).ready(function(){
           $('#entrarSistema').click(function(){

            vacios = validarFormVacio('frmLogin');

            if(vacios > 0){

                alert("Debes llenar los campos vacios!!");
                return false;

            }

                 datos=$('#frmLogin').serialize();
                 $.ajax({
                     type:"POST",
                     data:datos,
                     url:"procesos/reglogin/login.php",
                     success:function(r){

                        if(r==1){

                            window.location ="vistas/inicio.php";
                        }
                        else{
                            alert("usuario no encontrado");
                        }

                     }
                 });
           });

        });

</script>

