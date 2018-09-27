<?

class PDF extends FPDF
{
//Cabecera de pgina
function Header()
{
    //Logo
    $this->Image('./logo/lacroix.png',20,8,150);
    $this->Ln(5);	
}

//Pie de pgina
function Footer()
{
  
    $this->SetFont('Arial','',6);
	$this->SetY(-21);
	$this->Cell(0,10,'Pie de Pagina',0,0,'C');
	$this->SetY(-18);
	$this->Cell(0,10,html_entity_decode('Notas2'),0,0,'C');
	$this->SetY(-15);
	$this->Cell(0,10,html_entity_decode('Notas3'),0,0,'C');
	$this->SetY(-12);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');	
}

}
?>