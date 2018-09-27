<?php
    //-----------------------------------------------------------------------------------
    //    Ejemplo básico de utilización de fPDF
    //-----------------------------------------------------------------------------------
require('fpdf.php');
include ("../conectar.php");  

$pdf=new FPDF();
$pdf->AddPage();
	
//Nombre del Listado
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',16);
$pdf->SetY(20);
$pdf->SetX(0);

$pdf->Ln();    
	
 //Buscamos y listamos las familias

$consulta="SELECT * FROM tablap order by recete asc";
$rs_tabla=mysql_query($consulta);
$nrs=mysql_num_rows($rs_tabla);




$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',16);
$pdf->SetY(20);
$pdf->SetX(0);

$pdf->Ln();    
	
//Restauracin de colores y fuentes

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',7);


//Buscamos y listamos las familias

$consulta="SELECT * FROM tablap order by recete asc";
$rs_tabla=mysql_query($consulta);
$nrs=mysql_num_rows($rs_tabla);

$contador=0;
$item=1;
$numero_articulos=mysql_num_rows($rs_tabla);
if ($numero_articulos>0) {		
			$pdf->SetFont('Arial','',8);
			//Ttulos de las columnas
			$header=array('Recete', 'Nombre', 'Code Viande', 'Code epices', 'KG Epices', 'NB.SAC','Eau','Glace','Code Ajout','KG Ajout','Lote Ajout');
			//Colores, ancho de lnea y fuente en negrita
			$pdf->SetFillColor(200,200,200);
			$pdf->SetTextColor(0);
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetLineWidth(.2);
			$pdf->SetFont('Arial','B',8);
				
			//Cabecera
			$w=array(10,40,70,30,80,15,15,15);
			for($i=0;$i<count($header);$i++)
				$pdf->Ln();
				$pdf->SetFont('Arial','',8);
				while ($contador < mysql_num_rows($rs_tabla)) {
				$pdf->Cell($w[0],5,$item,'LRTB',0,'C');
				$pdf->Cell($w[1],5,mysql_result($rs_tabla,$contador,"recete"),'LRTB',0,'C');
				$pdf->Cell($w[2],5,mysql_result($rs_tabla,$contador,"nombre"),'LRTB',0,'C');
				$pdf->Cell($w[3],5,mysql_result($rs_tabla,$contador,"codeviande"),'LRTB',0,'C');
				$pdf->Cell($w[4],5,mysql_result($rs_tabla,$contador,"codeepices"),'LRTB',0,'L');
				$pdf->Cell($w[5],5,mysql_result($rs_tabla,$contador,"kgepices"),'LRTB',0,'C');
				$pdf->Cell($w[6],5,mysql_result($rs_tabla,$contador,"nbsac"),'LRTB',0,'C');
				$pdf->Cell($w[7],5,mysql_result($rs_tabla,$contador,"eau"),'LRTB',0,'C');
				$pdf->Cell($w[7],5,mysql_result($rs_tabla,$contador,"glace"),'LRTB',0,'C');
				$pdf->Cell($w[7],5,mysql_result($rs_tabla,$contador,"codeajout"),'LRTB',0,'C');
				$pdf->Cell($w[7],5,mysql_result($rs_tabla,$contador,"kgajout"),'LRTB',0,'C');
				$pdf->Cell($w[7],5,mysql_result($rs_tabla,$contador,"loteajout"),'LRTB',0,'C');
				$pdf->Ln();
				$item++;
				$contador++;
			};
		};
	    $pdf->Output();
 ?>