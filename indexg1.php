<!--http://www.webdisenia.com/2016/05/22/bootstrap-parte-20-barras-navegacion/
BUENOS EJEMPLOS DE MENU
https://www.bootply.com/97919
-->

<?php
date_default_timezone_set("America/Montreal");
$opc01="";    
$opc02="";    
$opc03="";    
$opc04="";    
$opc05="";    
$opc06="";    
$opc07="";    
$opc08="";    
$opc09="";   
$opcgn=""; 
$nomusu="";   


if(!isset($_SESSION)) { session_start(); }

  if (isset($_SESSION["idusu"])) {
     $idusu=$_SESSION['idusu'];
     $nomusu=$_SESSION['nomusu'];    
     $secc=$_SESSION['autentica'];
     $opc01=$_SESSION['opc01'];    
     $opc02=$_SESSION['opc02'];    
     $opc03=$_SESSION['opc03'];    
     $opc04=$_SESSION['opc04'];    
     $opc05=$_SESSION['opc05'];    
     $opc06=$_SESSION['opc06'];    
     $opc07=$_SESSION['opc07'];    
     $opc08=$_SESSION['opc08'];    
     $opc09=$_SESSION['opc09'];   
     $opcgn=$_SESSION['opcgn'];   

     $aut02=$_SESSION['aut02'];   
     $aut03=$_SESSION['aut03'];   
     $aut04=$_SESSION['aut04'];   
     $aut05=$_SESSION['aut05'];   
     $aut06=$_SESSION['aut06'];   
     $aut07=$_SESSION['aut07'];   
     $aut08=$_SESSION['aut08'];   
     $aut09=$_SESSION['aut09'];   
     $aut10=$_SESSION['aut10'];   
     $aut11=$_SESSION['aut11'];   
     $aut12=$_SESSION['aut12'];   
     $aut13=$_SESSION['aut13'];   
     $aut14=$_SESSION['aut14'];   
     $aut15=$_SESSION['aut15'];   
  } else {
    echo ("Error En Inicio de Seccion"); 
    //session_unset();
   // echo "<meta content='0;URL=../proyecto1/menunv01.php' http-equiv='REFRESH'> </meta>";
   echo "<meta content='0;URL=./menun.php' http-equiv='REFRESH'> </meta>";
  }
     

?>


<!DOCTYPE html>
<html lang="es">
<head>
<title>LacroixNet</title>
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1"/>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="./img/logo.ico"">

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<link href="./estilos/bootstrap.css" rel="stylesheet" media="screen">

<link href="./estilos/menug1.css" rel="stylesheet" media="screen" type="text/css">

<style type="text/css">
#main-header{
  z-index: 1;
}
</style>
</head>

<body>
<header id="main-header"> 
<nav class="navbar navbar-default align-middle">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="./img/lacroixtransp3.png" class="img-responsive" alt="Logo Lacroix">
      </div>
      <div class="collapse navbar-collapse collapsem1 " id="myNavbar">
      <ul class="nav navbar-nav">
               <li><a href="./accueilc.php">Accueil</a></li>
               <?php
               if ($opc02=="OUI"){
                $opcgn="002";
               ?>          
              <!--MENU DOCUMENTS-->   
              <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Autobus</a>    
              <ul class="dropdown-menu current_page_item1" role="menu">

               <?php
              // echo($nomusu);
               if ($nomusu !="acia"){
                $opcgn="002";
               ?>          

               <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Historique </a>
               <ul class="dropdown-menu">
               <li><a href="./basepaginador.php">Historique Documents</a></li>
               </ul>
               </li>

             


              <li><a href="./index.php">Nouveau Autobus</a></li>
              <li><a href="./server.php">Actualisation Santor-Autobus</a></li>

              
               <?php
               }
               ?>    

               <li><a href="./consolidado.php">Rapport consolidé</a></li>

              </ul>
              </li>   
              <?php
              }
              ?>          
              <!--MENU DOCUMENTS****FIN-->       
             
             

     
               <?php
               if ($opc06=="OUI"){
                  $opcgn="006";
               ?> 

              <!--MENU UTILISATEUR       
              <li class="dropdown current_page_item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" data-hover="dropdown">Paramètres</a>
              <ul class="dropdown-menu current_page_item1">

              <li class="dropdown-submenu"><a tabindex="-1" href="#">GDA</span></a>
              <ul class="dropdown-menu">  
              <li><a href="../proyecto1/indexut.php">Nouveau Utilisateur</a></li> 
 
              <li><a href="../proyecto1/indexuu.php">Autorisations Utilisateur</a></li>
              <li><a href="../plantilla/baseautorligne.php">Autorisations Ipads</a></li> 
              </ul>
              </li>   

               <li class="dropdown-submenu"><a tabindex="-1" href="#">GDD</span></a>
               <ul class="dropdown-menu">
               <li><a href="../plantilla/baseinfor.php">Nom/Route Document</a></li>
               <li><a href="../plantilla/baseinfor01.php">Catégorie</a></li>

             
              <li><a href="../plantilla/modeloinformeapi.php"><img src="../proyecto1/img/search1.png" width="15%" align="middle" style="margin-left: -18px; margin-top: -8px;">Personnalisation</img></a></li>
           
              <li><a href="../plantilla/modeloinformetac.php"><img src="../proyecto1/img/search1.png" width="15%" align="middle" style="margin-left: -18px; margin-top: -8px;">Tâches</img></a></li>
             
           


        
         
               <li><a href="../plantilla/basecq.php">Nom-CQ</a></li>
               </ul>
               </li>   

               <li class="dropdown-submenu"><a tabindex="-1" href="#">Barattage</span></a>
               <ul class="dropdown-menu">

              <li><a href="../proyecto1/index41int.php">Modifier LOT Interal</a></li>
              <li><a href="../proyecto1/auditinv.php">Inventaire-Epices</a></li>
              </ul>
              </li>   

              <li><a href="../proyecto1/backup.php">Backup</a></li>
              
           
              </ul>
              </li>  
               -->


              <!--MENU UTILISATEUR****FIN-->       
              <?php
              }
              ?>          






      </ul>  <!-- fin class nva navbar-nav -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><span class="usuario"><?php echo ($nomusu)?></span></a></li>
        <li><a href="./cerrar.php"><img class="imagen" width="26" heigth="22" src="./img/fermer1.ico"><span class="fermer">Fermer session</span></a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

  <!-- Librería jQuery requerida por los plugins de JavaScript -->
  
<!--JQUERY local-->
<script src="./js/jquery.js"></script>
<!--fin jquery local-->

<!--
  <script src="http://code.jquery.com/jquery.js"></script>
-->  

  <!-- Todos los plugins JavaScript de Bootstrap (también puedes
  incluir archivos JavaScript individuales de los únicos
  plugins que utilices) -->
  <script src="./js/bootstrap.js"></script>
  <!--plugins para despliegue al psar el mouse 
  data-hover="dropdown"
-->
  <script src="./estilos/menu/bootstrap-hover-dropdown.min.js"></script>


</body>

</html>