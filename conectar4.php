<?php
  include("config.php"); 


  $conexion = @mysqli_connect($Servidor , $Usuario, '' , $BaseDeDatos);

 // $conexion = @mysql_connect($Servidor,$Usuario,$Password) or die("Error: El servidor no puede conectar con la base de datos");
//  $descriptor=mysql_select_db($BaseDeDatos,$conexion);
 // mysql_set_charset('utf8'); // si colocamos esto aqui sirve para colocar los acentos y para ver los acentos en mi base de datos
  //muy importante la linea de arriba
  //en todos los programas se puede usar por el tema de las tildes y los acentos
?>
