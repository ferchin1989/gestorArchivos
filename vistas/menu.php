<?php  require_once "dependencias.php"; ?>

<!DOCTYPE HTML> 
<html>
<head>
	<title>Menu Ventas</title>
	
</head>
<body>

<!-- Barra de Navegacion -->
<div id="nav">
  <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">

      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
		   data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="#"><img class="img-responsive logo img-thumbnail" 
		  src="../img/robot.png" alt="" width="100px" height="100px"></a>

        </div>

        <div id="navbar" class="collapse navbar-collapse" >

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="inicio.php" style="color:white" ><span class="glyphicon glyphicon-home"></span> Inicio </a>
            </li>
			</li>

			<li class="dropdown" >
			<a href="#"  style="color:white" class="dropdown-toggle" data-toggle="dropdown" role="button"
			aria-haspopup="true" arias-expanded="false"><span class="glyphicon 
			glyphicon-list-alt"></span> Administrar Articulos <span class="caret"></span></a>
			<ul class="dropdown-menu">
			   <li><a href="categorias.php">Categorias</a></li>
			   <li><a href="articulos.php">Articulos</a></li>
			</ul>
			</li>

            <?php 

               if($_SESSION['usuario']=="admin"):
    

            ?>

            <li><a href="usuarios.php"  style="color:white"><span class="glyphicon glyphicon-user"></span>
			 Administrar Usuarios </a>
			</li>

			<?php 

                endif;
            ?>

			<li><a href="clientes.php" style="color:white" ><span class="glyphicon glyphicon-user"></span>
			 Clientes </a>
			</li>

			<li><a  href="ventas.php" style="color:white" ><span class="glyphicon glyphicon-usd"></span>
			 Vender Articulo </a>
			</li>

			<li class="dropdown">
			<a href="#" style="color:orange" class="dropdown-toggle" data-toggle="dropdown" role="button"
			aria-haspopup="true" arias-expanded="false"><span class="glyphicon 
			glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario'];  ?> <span class="caret"></span></a>
			<ul class="dropdown-menu">
			   <li><a style="color:red" href="../procesos/salir.php"><span class="glyphicon g
			   lyphicon-off"></span> Salir </a></li>
			</ul>
			</li>



          </ul>
		  
        </div>
        <!--/.Barra de Navegacion accion colapso  -->
      </div>
      <!--/.contenedor -->
</div>
</div>
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <!-- /contenedor-->        



</body>
</html>

<script type="text/javascript">

        $(window).scroll(function() {
			if ($(document).scrollTop() > 150) {
                alert('hi');
			$('.logo').height(200);

			}
			else {
			$('.logo').height(100);
			}
		});

</script>