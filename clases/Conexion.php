<?php

   class conectar{

    private $servidor ="localhost";
    private $usuario ="root";
    private $password ="";
    private $bd ="ventas";

    
          public function conexion()
            {
                $conexion = mysqli_connect($this->servidor,
                                           $this->usuario,
                                           $this->password,
                                           $this->bd);
         
                 return $conexion;
       
            }

   }

   /* verifica la conexion
   $obj = new conectar();
   var_dump($obj -> conexion());
   */


   /*verifica la conexion y da como resultado la palabra conectado
   $obj = new conectar();
   if($obj -> conexion())
   {
       echo "conectado";
   }*/
   


?>