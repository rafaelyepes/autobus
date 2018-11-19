<?php 
$d1 = "";
include ("./conectar4.php"); 

/***********/
$nomusu="";   
if(!isset($_SESSION)) 
{ 
 session_start(); 
 $nomusu=$_SESSION['nomusu']; 
}
/***********/


//if(!isset($_SESSION)) { session_start(); }
//$nomusu=$_SESSION['nomusu']; 

$d1 = $nomusu; 
//include ("../plantilla/conectar.php"); 
$fechahoy=date("Y-m-d");

//$fechahoy=date("2018-06-26");


//$informe="Controle de l injection";
//$plantilla="plantill013a.php";

$menu="S";
if(isset($_GET['menu'])) {
$menu=$_GET['menu'];
}  

//$informe="Controle de l'injection";
//$plantilla="plantill013a
?>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <link href="../proyecto1/estilos/tabla1.css" rel="stylesheet" media="screen" type="text/css">
    <link href="../plantilla/estilos/botonboots.css" rel="stylesheet" media="screen" type="text/css">
    <script>
        
          function abrir()
          {

           var plantilla="index.php"; 
           location.href=plantilla;
          }
        
        
          function cancelar()
          {
            var menu = <?php echo json_encode($menu)?>;
           
            if (menu == "S"){
             location.href="../proyecto1/busqueda.php";    
            }else{
             location.href="../proyecto1/logo2.php";    
            }

          }


        

   function pon_prefijo(pref) 
            {

            var plantilla="index.php"; 
           
         //   alert (menu);

            var d2 = pref;
            window.location=(plantilla+"?documento="+d2),'_self';
}


    </script>
<style>
   .round-button {
  width: 1.5%;
}
.round-button-circle {
  width: 100%;
  height:0;
  padding-bottom: 100%;
  border-radius: 50%;
  border: 3px solid #cfdcec;
  overflow:hidden;
        
  background: #4679BD; 
  box-shadow: 0 0 3px gray;
}
.round-button-circle:hover {
  background:#30588e;
}
.round-button a {
  display:block;
  float:left;
  width:100%;
  padding-top:50%;
  padding-bottom:50%;
  line-height:1em;
  margin-top:-0.5em;
        
  text-align:center;
  color:#e2eaf3;
  font-family:Verdana;
  font-size:1.2em;
  font-weight:bold;
  text-decoration:none;
}

.form-control {
   text-align: center;
   background: F5ECEC;
   box-sizing: border-box;
   border: 1px solid #393939;
   border-radius: 5px 5px 5px 5px;
   color: #393939;
   font-size: 22px;
   width: 70%;  
  

   padding: 8px 1px;
   margin: 2px 0;    /* espacio entre dos lineas
   /*Centrar el input    */
   display:block;
   margin-left: auto;   
.   margin-right: auto;
   /*     */
}



</style>
</head>
<body lang=FR-CA onload="inicio()">


<section class="formulario1">    
      <form name="formulario" id="formulario" method="post" action="./plantill013b.php"> 
        <table border=3 cellpadding=0 class="tablat" cellspacing=0>
        <tr>
        <td rowspan="10" WIDTH="32" HEIGHT="50" ><img  src="../plantilla/img/logolacroix.png" width="30" ></td>
        </tr>

        
        <tr>
        <td align="center" width="30%">Numéro Document</td>
        <td  align="center" width="20%">Date</td>
        <td align="center" width="30%">Chofer</td>
        <td align="center" width="20%">Autobus</td>
        <td align="center" width="20%">Depart</td>
        </tr>

        <?php
        $d23="";
        /*****************/
      //  $d1="";
      //  $fechahoy="2018-10-26";
        /*****************/
        /*****************/
        $sql = "SELECT * from autobusmae where datmae='$fechahoy'and usuario='$d1'";
        $query = $conn->query($sql);

        if ($query->num_rows <= 0) {
        ?> 
         <script type="text/javascript">
           abrir();
         </script>
         <?php
        }  

        while($row = $query->fetch_array()){
         $d4= $row['busmae'];
         $d2 = $row['datmae'];
         $d3 = $row['chomae'];
         $d1 = $row['docmae'];
         $d5 = $row['hr1mae'];

         $nomchofer = '';
         $nombus = '';


         $sql1 = "SELECT * from autobusemp where numemp='$d3'";
         $query1 = $conn->query($sql1);
         while($row1 = $query1->fetch_array()){
           $nomchofer = $row1['nomemp'];
         } 

         $sql1 = "SELECT * from autobusemp where numemp='$d4'";
         $query1 = $conn->query($sql1);
         while($row1 = $query1->fetch_array()){
           $nombus = $row1['nomemp'];
         } 


         ?>
         <tr>
         <td align="Center" ><a onClick="this.disabled=true" href="javascript:pon_prefijo('<?php echo $d1?>')"> <?php echo ($d1) ?></a></td>
         <td align="Center" ><a onClick="this.disabled=true" href="javascript:pon_prefijo('<?php echo $d1?>')"> <?php echo ($d2) ?></a></td>
         <td align="Center" ><a onClick="this.disabled=true" href="javascript:pon_prefijo('<?php echo $d1?>')"> <?php echo ($nomchofer ) ?></a></td>
         <td align="Center" ><a onClick="this.disabled=true" href="javascript:pon_prefijo('<?php echo $d1?>')"> <?php echo ($nombus) ?></a></td>
         <td align="Center" ><a onClick="this.disabled=true" href="javascript:pon_prefijo('<?php echo $d1?>')"> <?php echo ($d5) ?></a></td>
     
     
        </tr>
        <?php
        } // fin del While 
        ?>
        <tr>
        <td colspan="4" align="center">  <a  id="buttonId" onClick="this.disabled=true" href="javascript:abrir()"><img id="editar" src="./img/newdocumento1.png"  width="135px" height="55px" alt="Editer"></a>
        <a  id="buttonId" onClick="this.disabled=true" href="javascript:cancelar()"><img id="editar" src="./img/canceler.png"   width="55px" height="55px" alt="Editer"></a></td>
        </tr>
        </table>
        </form>
    </section>
   </body>
</html>
