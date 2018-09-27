
<?php

//Incluimos la libreria fpdf
require('fpdf.php');
//Incluimos el archivo de conexion a la base de datos
include ("../conectar.php");  
//Almacenamos la fecha que haya elegido en el formulario

global $datepr;

$datepr = $_POST["fecha"];
//creamos una clase para ocupar el encabezado y pie de pagina en el PDF
class PDF extends FPDF
{
//El metodo para crear el encabezado
function Header()
{
    $this->SetFont('Arial','B',10); //Tipo de letra, estilo y tamaño
 
//Encabezado de la tabla








$this->Cell(0,5,'FDC BARATTES',0,1,'C'); //Titulo del reporte


$this->SetFillColor(255,255,255);
$this->multicell(0,5,utf8_decode('Procédure: Les responsables du barattage/pesage ou leurs substituts ont la responsabilité de suivre les recettes. Ils doivent s assurer de peser/ajouter les bons ingrédients et/ou la bonne quantité au mélange Chaque recette sera consignée  dans le formulaire de surveillance.'),0,1,'J');
$this->Cell(0,5,utf8_decode('Fréquence: Le responsable à chaque recette, le surveillant (contrôle qualité) une fois le matin et une fois en après-midi.'),0,1,'J');
$this->multiCell(0,5,utf8_decode('Limites et rectifications: Lors d un écart, ex. erreur de recette, température non-conforme, le responsable avise le CQ et celui-ci prend les mesures nécessaires pour corriger la non-conformité immédiatement. Le CQ rempli le  registre d écart.'),0,1,'J');

 //ancho,alto,dato,borde,salto,alineacion centrado**

//$pdf->Cell(14,7,'DATE  : '.$datepr,0,1,’C’);//


	
    $this->SetFillColor(182,195,209);

$this->SetDrawColor(0,0,0);
$this->SetTextColor(0,0,0);

    $vble = $_POST['fecha'];
    $this->Cell(14,7,'Date : '. $vble ,0,0,'L');
    $this->Cell(10,7,'',0,0,'C'); //**
    $this->Cell(10,7,'',0,0,'C'); //**
    $this->Cell(182,7,'Ingredients',1,1,'C'); //**
    
    $this->Cell(14,7,'',0,0,'C'); //ancho,alto,dato,borde,salto,alineacion centrado**
    $this->Cell(10,7,'',0,0,'C'); //**
    $this->Cell(10,7,'',0,0,'C'); //**
    $this->Cell(45,7,'Viande',1,0,'C'); //**
    $this->Cell(65,7,'Epices-Sauce',1,0,'C'); //**
    $this->Cell(13,7,'',0,0,'C'); //**
    $this->Cell(13,7,'',0,0,'C'); //**
	$this->Cell(46,7,'Ajout Glace/Hulle',1,1,'C'); //**
    
	
    $this->Cell(14,8,'HeureD',1,0,'C'); //ancho,alto,dato,borde,salto,alineacion centrado**
    $this->Cell(10,8,'Rece',1,0,'C'); //**
    $this->Cell(10,8,'Mela',1,0,'C'); //**
    $this->Cell(15,8,'Code',1,0,'C'); //**
    $this->Cell(10,8,'Kg',1,0,'C'); //**
    $this->Cell(20,8,'DateP',1,0,'C'); //**
    $this->Cell(20,8,'Code',1,0,'C'); //**
	$this->Cell(13,8,'Kg',1,0,'C'); //**
    $this->Cell(12,8,'Nb.Sac',1,0,'C'); //**
    $this->Cell(20,8,'Lote',1,0,'C'); //**
    $this->Cell(15,8,'Eau.Kg',1,0,'C'); //**
    $this->Cell(11,8,'Glace',1,0,'C'); //**
    $this->Cell(13,8,'Code',1,0,'C'); //**
    $this->Cell(13,8,'Kg',1,0,'C'); //**
    $this->Cell(20,8,'Lote',1,0,'C'); //**
    $this->Cell(13,8,'PoidsF',1,0,'C'); //**
    $this->Cell(13,8,'Temp',1,0,'C'); //**
    $this->Cell(13,8,'Heuref',1,0,'C'); //**
	$this->Cell(13,8,'Resp',1,0,'C'); //**
  


}
 
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página


    $this->cell(0,5,utf8_decode('Signature superviseur ______________________________ '),0,1,'R');
    $this->cell(0,5,utf8_decode('A L exclisivité de: Les Viandes LaCroix Inc./MAJ25-01-2016'),0,0,'J');

    // $this->Cell(0,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
//ahora instanseamos un objeto de la clase fpdf para empezar a armar el PDF con orientacion vertical, margenes en milimetros y tamaño de papel carta

$pdf = new PDF('L','mm','Letter');
 
//Utilizamos el siguiente metodo para cargar una nueva pagina en el PDF
$pdf->AddPage();
$pdf->AliasNbPages();
//Asiganamos el tipo de fuente, el estilo y el tamaño de letra
$pdf->SetFont('Arial','',10);
//Definimos el color de la letra
$pdf->SetTextColor(0x00,0x00,0x00);
 
//generamos la consulta en la siguiente variable
//obtenemos todos los datos de la tabla alumnos segun la fecha al que pertenecen


$listado=mysql_query("SELECT tablag.*,tablap.* FROM tablag,tablap WHERE tablag.datepr='$datepr' AND tablag.recete=tablap.recete");

 $pdf->Ln(); //Hacer el salto de linea para la siguiente fila del registro           	  


//Ahora mediante un bucle construimos el reporte 
//Pero primero validemos si existen datos en ese curso nos cargue los datos
if(mysql_num_rows($listado)>0){
while($fila = mysql_fetch_array($listado)){

 
 $pdf->Cell(14,7,substr($fila['heured'],0,5),1,0,'C'); //id   
 $pdf->Cell(10,7,$fila['recete'],1,0,'L'); //Celda con ancho de 50, alto de 10, el dato, borde 1, sin salto de linea**
 $pdf->Cell(10,7,$fila['melagne'],1,0,'C'); //**
 $pdf->Cell(15,7, substr($fila['codeviande'],0,5),1,0); //**
 $pdf->Cell(10,7,$fila['kgdeviande'],1,0,'R'); //**
 $pdf->Cell(20,7,$fila['datep'],1,0); //** 
 $pdf->Cell(20,7, substr($fila['loteepices'],0,10),1,0,'L'); //** 
 $kgdeviande=$fila['kgdeviande'];
 $kgepices=$fila['kgepices'];
 $eau=$fila['eau'];
 $glace=$fila['glace'];
 $kgepices=$kgdeviande*$kgepices;
 $eau=$kgdeviande*$eau;
 $glace=$kgdeviande*$glace;
 $poids=$kgdeviande+$kgepices+$eau+$glace;






 $pdf->Cell(13,7,$kgepices,1,0,'R'); //** 
 $pdf->Cell(12,7,$eau,1,0,'R'); //** 
 $pdf->Cell(20,7,$eau,1,0,'R'); //lote** 
 $pdf->Cell(15,7,$eau,1,0,'R'); //eau** 
 $pdf->Cell(11,7,$glace,1,0,'R'); //glace** 
 $pdf->Cell(13,7,$eau,1,0,'R'); //code** 
 $pdf->Cell(13,7,$eau,1,0,'R'); //kg** 
 $pdf->Cell(20,7, substr($fila['loteepices'],0,9),1,0,'L'); //lote** 				  	
 $pdf->Cell(13,7,$poids,1,0,'R'); //** 
 $pdf->Cell(13,7, substr($fila['temp'],0,5),1,0); //** 
 $pdf->Cell(13,7, substr($fila['heuref'],0,5),1,0); //** 				  	
 $pdf->Cell(13,7," ",1,0); //** 

 $pdf->Ln(); //Hacer el salto de linea para la siguiente fila del registro           	  
 
}
}
else{
	
$pdf->Cell(0,10,"No existen registros",0,0,"C");
}
//Ejecutar el pdf en una nueva pestaña y al guardarlo sugiere el nombre de archivo
$pdf->Output('REPORTE DE ALUMNOS','I');
?>