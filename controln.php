<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" >
<head>
<title>Principal</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
<?php 
include ("./conectar4.php"); 
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

session_start();
$_SESSION['autentica']='NO';
$usuario=$_POST["usuario"];
$clave=$_POST["clave"];

$sql = "SELECT * FROM email02 WHERE usuario='$usuario' and clave='$clave'";
$query = $conn->query($sql);
$total ="0";	

while($row = $query->fetch_array()){
		$total ="1";	
		$sw="1";	
		$_SESSION['autentica']='SI';
		$_SESSION['idusu']=$row['id']; 
		$_SESSION['nomusu']=$row['emnom02']; 
		$_SESSION['nomligne']=$row['usuario']; 
		$_SESSION['opc01']=$row['opc01']; 
		$_SESSION['opc02']=$row['opc02']; 
		$_SESSION['opc03']=$row['opc03']; 
		$_SESSION['opc04']=$row['opc04']; 
		$_SESSION['opc05']=$row['opc05']; 
		$_SESSION['opc06']=$row['opc06']; 
		$_SESSION['opc07']=$row['opc07']; 
		$_SESSION['opc08']=$row['opc08']; 
		$_SESSION['opc09']=$row['opc09']; 
		$_SESSION['opcgn']="000";
		$_SESSION['aut02']="NON";    
		$_SESSION['aut03']="NON";    
		$_SESSION['aut04']="NON";    
		$_SESSION['aut05']="NON";    
		$_SESSION['aut06']="NON";    
		$_SESSION['aut07']="NON";    
		$_SESSION['aut08']="NON";    
		$_SESSION['aut09']="NON";    
		$_SESSION['aut10']="NON";    
		$_SESSION['aut11']="NON";    
		$_SESSION['aut12']="NON";    
		$_SESSION['aut13']="NON";    
		$_SESSION['aut14']="NON";    
		$_SESSION['aut15']="NON";    
}
if ($total <= 0){
            echo ("<script>alert('L utilisateur n Existe pas'); window.location.href=\"menun.php\"</script>"); 
}
//Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario 
//nombre del usuario logueado. 
//Direccionamos a nuestra página principal del sistema. 
$menu="S";
if(isset($_POST['menu'])) {
$menu=$_POST['menu'];
}  
if ($menu == "S"){
 echo "<script>window.location.href=\"index.php\"</script>"; 
}else{
 echo "<script>window.location.href=\"index.php\"</script>"; 
}
?>
</head>
</html>
