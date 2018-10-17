<?php
    if(!isset($_SESSION)) { session_start(); }
     if (isset($_SESSION['autentica'])){ 
     $nomusu=$_SESSION['nomusu'];   
     $nomligne=$_SESSION['nomligne'];    
     $secc=$_SESSION['autentica'];
     $idusu=$_SESSION['idusu'];
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

     //echo("<script>alert('Revisando');</script>");

        
     if ($secc <> "SI"){
         echo("<script>alert('Vous devez saisir la clé'); window.location.href=\"menun.php\"</script>");
     }   
 }
 else
 {
      ?>
    <script type="text/javascript">
    location.href="menun.php";    
    </script>
    <?php 
 }
?>




