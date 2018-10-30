<?php

include ("./conectar4.php"); 

//mysql_query("SET NAMES 'utf8'");
date_default_timezone_set("America/Montreal");

$res = array('error' => false);
$crud = '';
$nummov = '';
$fecmov = '';
$docmov = '';
$sexe = '';
$autobus = '';
$chofer = '';
$chofernuevo='';
$autobusnuevo = '';
$horadepart = '00:00:00';
$horallegada = '00:00:00';
$reg_time = '';
$horatotal = '';
$horatotaldif=0;

$firstname = '';
$lastname = '';
$memid = '';

if(isset($_GET['crud'])){
	$crud = $_GET['crud'];
}
if(isset($_POST['crud'])){
	$crud = $_POST['crud'];
}

if(isset($_GET['nummov'])){
	$nummov = $_GET['nummov'];
}
if(isset($_POST['nummov'])){
	$nummov = $_POST['nummov'];
}

if(isset($_GET['fecmov'])){
	$fecmov = $_GET['fecmov'];
}
if(isset($_POST['fecmov'])){
	$fecmov = $_POST['fecmov'];
}

if(isset($_GET['docmov'])){
	$docmov = $_GET['docmov'];
}
if(isset($_POST['docmov'])){
	$docmov = $_POST['docmov'];
}

if(isset($_GET['autobus'])){
	$autobus = $_GET['autobus'];
}
if(isset($_POST['autobus'])){
	$autobus = $_POST['autobus'];
}

if(isset($_GET['chofer'])){
	$chofer = $_GET['chofer'];
}
if(isset($_POST['chofer'])){
	$chofer = $_POST['chofer'];
}

if(isset($_GET['firstname'])){
	$firstname = $_GET['firstname'];
}
if(isset($_POST['firstname'])){
	$firstname = $_POST['firstname'];
}


if(isset($_GET['lastname'])){
	$lastname = $_GET['lastname'];
}
if(isset($_POST['lastname'])){
	$lastname = $_POST['lastname'];
}

if(isset($_GET['sexe'])){
	$sexe = $_GET['sexe'];
}
if(isset($_POST['sexe'])){
	$sexe = $_POST['sexe'];
}

if(isset($_GET['memid'])){
	$memid = $_GET['memid'];
}
if(isset($_POST['memid'])){
	$memid = $_POST['memid'];
}


$autobusact=$autobus;
$choferact=$chofer;


$out['members'] = '';
$res['members'] = '';
$members = array();
$first_array= array();

/*Calculando la fecha de Salida del Autobus*/
$fecha = new DateTime('NOW');
$hora= $fecha->format('H');
$minuto=$fecha->format('i');
$segundos=$fecha->format('s');
$fecha=$fecha->format('Y-m-d');
$horatotal= ($hora.":".$minuto.":".$segundos);
$ano = substr($fecha,2,2);
$mes = substr($fecha,5,2);
$dia = substr($fecha,8,2);
/*Calculando la fecha de Salida del Autobus*/
$members = array();

if($crud == 'read-1'){
	//$documento="abc";
	//	$sql = "select * from autobusmov where docmov='$documento'";
 	$fecin = "";
   	$busin = "inicial";
   	$choin = "inicial";

	$sql1 = "select * from autobusmae where docmae='$docmov'";
	//	$sql = "select * from autobusmov";
	$query1 = $conn->query($sql1);
	
	while($row = $query1->fetch_array()){
   	  $fecin = $row['datmae'];
   	  $busin = $row['busmae'];
   	  $choin = $row['chomae'];
	}

	
	$sql = "SELECT @row_num := 0"; 
	$query = $conn->query($sql);

	$sql = "SELECT @row_num:=@row_num + 1 AS row_number, docmov, fecmov, nummov, nommov, apemov, sexmov, stamov from autobusmov WHERE docmov='$docmov' order by row_number DESC";
	
	//$sql = "select * from autobusmov where docmov='$docmov' order by id DESC";
	//	$sql = "select * from autobusmov";
	$query = $conn->query($sql);
	
	while($row = $query->fetch_array()){
		array_push($members, $row);
	}


	$res['fecin'] = $fecin;
	$res['busin'] = $busin;
	$res['choin'] = $choin;

	$res['results'] = $members;
	echo json_encode($res);
}



if($crud == 'read'){
	//$documento="abc";
	//	$sql = "select * from autobusmov where docmov='$documento'";

	$sql = "SELECT @row_num := 0"; 
	$query = $conn->query($sql);

	$sql = "SELECT @row_num:=@row_num + 1 AS row_number, docmov, fecmov, nummov,nommov,apemov,sexmov, stamov from autobusmov where fecmov='$fecmov' and docmov='$docmov' order by row_number DESC";
	

//	$sql = "select * from autobusmov where fecmov='$fecmov' and docmov='$docmov' order by id DESC";
	//	$sql = "select * from autobusmov";
	$query = $conn->query($sql);
	
	while($row = $query->fetch_array()){
		array_push($members, $row);
	}
	$res['results'] = $members;
	echo json_encode($res);
}

if($crud == 'grababandolinea'){
	$res['respuesta'] = "Grabando Linea";
	$firstname = "NA";
	$lastname = "NA";
	$sw="0";
	
	$sql = "select * from autobusmov WHERE (nummov='$nummov' and fecmov='$fecmov' and docmov='$docmov')";
	$query = $conn->query($sql);
	while($row = $query->fetch_array()){
		//array_push($members, $row);
		$sw="1";	
	}
	if ($sw == "0"){
		$sql = "SELECT * from autobusemp where numemp='$nummov'";
		$query = $conn->query($sql);
		while($row = $query->fetch_array()){
			//$firstname = "Primer nombre ok";
			//$lastname  = "Last Name OK";
			$firstname = $row['nomemp'];
			$lastname = $row['apeemp'];
		}
		$sql = "INSERT INTO autobusmov (docmov, fecmov, nummov, nommov, apemov, sexmov, stamov) values ('$docmov','$fecmov','$nummov','$firstname', '$lastname', '$sexe', 'Embarqué')";
		$query = $conn->query($sql);
	    $first_array = array( 
                 "nummov" => $nummov, 
                 'nommov' => $firstname, 
                 'apemov' => $lastname, 
                 'sexmov' => '', 
                 'stamov' => 'Embarqué',
                  ); 
		array_push($members, $first_array); 
	}else{
			$first_array = array( 
                 "nummov" => $nummov, 
                 'nommov' => 'EXISTE', 
                 'apemov' => '', 
                 'sexmov' => '', 
                 'stamov' => 'Embarqué', 
            ); 
			array_push($members, $first_array);
	}
	$res['members'] = $members;
	echo json_encode($res);
}


if($crud == 'validaautobus'){
		//$nummov = "41251";
		$res['respuesta'] = "EMPLEADO NO ACORDE";

		$sql = "select * from autobusemp where numemp='$nummov'";
		$query = $conn->query($sql);

		if ($query->num_rows > 0) {
			
			while($row = $query->fetch_array()){
				$firstname = $row['nomemp'];
				$lastname  = $row['apeemp'];
				$grupoemp  = $row['gruemp'];
			}
			$res['respuesta00'] = "SIII existe EL EMPLEADO  : ".$grupoemp;
			if ($grupoemp =="G1" || $grupoemp =="G2" ){
				$res['respuesta'] = "g1--g2";
				if ($grupoemp =="G1"){
					$chofernuevo=$nummov;
					$chofer=$chofernuevo;
				}
				if ($grupoemp =="G2"){
					$autobusnuevo=$nummov;
					$autobus=$autobusnuevo;
				}
				$res['respuesta3'] = $autobus;
				$res['respuesta4'] = $chofer;

				
 			// if ($autobusact =="" && $choferact =="" ){
 				if ($autobus !="" && $chofer !="" ){
				$res['respuesta'] = "CHOFER-AUTOBUS";
				$res['respuesta2'] = "SELECTI-AUTOBUS-MAE VIRIFCA SI EXISTE EL NUMERO  :".$fecmov." : ".$chofer." : ".$autobus;
				$docmov='';
				$sql = "SELECT * from autobusmae WHERE (datmae='$fecmov' and chomae='$chofer' and busmae='$autobus')";
				$query = $conn->query($sql);
				while($row = $query->fetch_array()){
					$reg_time = $row['reg_time'];
					$reg_time=strtotime($reg_time);
					$horatotalx=strtotime($horatotal);
					$horatotaldif=$horatotalx-$reg_time;
					if ($horatotaldif <= 5750){
						$docmov = $row['docmae'];
						$horadepart  = $row['hr2mae'];
						$horallegada = $row['hr3mae'];
					}
				}
				$res['respuesta5'] = "Respuesta Numero documento : ".$docmov;

				if ($docmov == ""){
						$res['respuesta5'] = "INSERTANDO EN autobusmae";
					$sql = "INSERT INTO autobusmae (datmae, busmae, chomae, reg_time) VALUES ('$fecmov', '$autobus', '$chofer', '$horatotal')";
						$query = $conn->query($sql);
						$res['respuesta'] = "ONINS OK";
						$docmov = $conn->insert_id;
						/********************/
						/********************/
						$res['respuesta6'] = "UPDATEANDO EN autobusmae";
						$sql = "UPDATE autobusmae set docmae='$docmov' where id='$docmov'";
						$query = $conn->query($sql);
						$horadepart  = "00:00:00";
						$horallegada = "00:00:00";
				}
			  }
			}
			if ($grupoemp =="G1" || $grupoemp =="G2" ){
				$grabando="NO";	
				$res['respuesta'] = "ya existe chofer o autobus";
				if (($grupoemp =="G1" && $chofernuevo==$choferact) && ($grupoemp =="G2" && $autobusnuevo==$autobusact)){
					$grabando="SI";	
				}
	
			    if ($grabando == "NO"){
			   		$res['respuesta'] = "ACTUALIZANDO CHOFER- INSERTANDO LINEA AUTOBUS";
					//$sql = "UPDATE autobusmae set busmae='$autobus', chomae='$chofer', docmae='$docmov' where id='$docmov'";
					//$query = $conn->query($sql);
					//$sql = "INSERT INTO autobusmov (docmov, fecmov, nummov, nommov, apemov, sexmov, stamov) values ('$docmov','$fecmov','$nummov','$firstname', '$lastname', '$sexe', 'Embarqué')";
					//$query = $conn->query($sql);
			  	    $first_array = array( 
		                 "nummov" => $nummov, 
		                 'nommov' => $firstname, 
		                 'apemov' => $lastname, 
		                 'sexmov' => '', 
		                 'stamov' => 'Embarqué',
		                  ); 
					array_push($members,$first_array); 
				} // FIN DEL IF grabando
			}else{
				$res['respuesta'] = "EMPLEADO NO ACORDE";
			}	
		}
				$res['chofer'] = $chofer;
				$res['autobus'] = $autobus;
				$res['documento'] = $docmov;
				$res['horadepart'] = $horadepart;
				$res['horallegada'] = $horallegada;


				$res['horatotal0'] = $reg_time;
				$res['horatotal1'] = ($horatotal);
				$res['horatotal2'] = ($horatotaldif);

		$res['results'] = $members;
		echo json_encode($res);
} // fin crud=validaautobus





if($crud == 'consulta'){
	$numero = $_POST['nummov'];
//	$numero = "10014";
	
	$sql = "select * from autobusemp where numemp='$numero'";
//	$sql = "select * from autobusemp where 1";

	$query = $conn->query($sql);
	//"id" => $id
	$members = array();
	$sw="0";
	//$row = $query->fetch_array();
	while($row = $query->fetch_array()){
		array_push($members, $row);
		$sw="1";	
	}
	if ($sw == "1"){
	 //$members = array();
	}else{
		$first_array = array( 
                 "numemp" => $numero, 
                 'nomemp' => 'Nom No existe', 
                 'apeemp' => '', 
                 'sexemp' => '', 
                 'staemp' => 'Embarqué', 
            ); 
		array_push($members,$first_array);
	}
//	$out['message'] = "Empleado consultado ok";
	$out['members'] = $members;
}


if($crud == 'create'){
	$res['message'] = "Impossible d'ajouter un employé";
	//$out['message'] = "Impossible d'ajouter un employé--222";

	$sql = "INSERT INTO autobusmov (docmov, fecmov, nommov, apemov, sexmov, stamov) values ('$docmov','$fecmov','$firstname', '$lastname', '$sexe', 'Embarqué')";
	$query = $conn->query($sql);

	if($query){
		$res['message'] = "Employé ajouté avec succès";
	}
	else{
		$res['error'] = true;
		$res['message'] = "Impossible d'ajouter un employé";
	}
	echo json_encode($res);
}


if($crud == 'createex'){

	$res['message'] = "Impossible d'ajouter un employé existant";
	//$out['message'] = "Impossible d'ajouter un employé--222";

	$sql = "INSERT INTO autobusmov (docmov, fecmov, nummov, nommov, apemov, sexmov, stamov) values ('$docmov','$fecmov', 'ZZZZZ', '$firstname', '$lastname', '$sexe', 'Embarqué')";
	$query = $conn->query($sql);

	if($query){
		$res['message'] = "Employé ajouté avec succès existant";
	}
	else{
		$res['error'] = true;
		$res['message'] = "Impossible d'ajouter un employé existant";
	}
	echo json_encode($res);
}


if($crud == 'update'){

	$sql = "UPDATE autobusmov set nommov='$firstname', apemov='$lastname',  sexmov='$sexe' where id='$memid'";
	$query = $conn->query($sql);
	if($query){
		$res['message'] = "Employé ajouté avec succès";
	}
	else{
		$res['error'] = true;
		$res['message'] = "Impossible de mettre à jour un employé";
	}
	echo json_encode($res);
}

if($crud == 'debarque'){
	$debar="Débarqué";
	$sql = "UPDATE autobusmov set stamov='$debar' where id='$memid'";
	$query = $conn->query($sql);
	if($query){
		$res['message'] = "Employé Débarqué";
	}
	else{
		$res['error'] = true;
		$res['message'] = "Impossible Débarqué l'employé ";
	}
	echo json_encode($res);
}

if($crud == 'embarque'){
	$debar="Embarqué";
	$sql = "UPDATE autobusmov set stamov='$debar' where id='$memid'";
	$query = $conn->query($sql);
	if($query){
		$res['message'] = "Employé Embarqué";
	}
	else{
		$res['error'] = true;
		$res['message'] = "Impossible Embarqué l'employé ";
	}
	echo json_encode($res);
}


if($crud == 'delete'){
	$sql = "delete from autobusmov where memid='$memid'";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Member Deleted Successfully";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Could not delete Member";
	}
}


if($crud == 'depart'){
			$res['horadepart'] = '00:00:00';
            $horacontrol = ($hora.":".$minuto.":".$segundos);
            $sql = "UPDATE autobusmae set hr2mae='$horacontrol' where id='$docmov'";
			$query = $conn->query($sql);
			if($query){
				$res['horadepart'] = $horacontrol;
				$res['message'] = "OK";
			}
			else{
				$res['error'] = true;
				$res['message'] = "Error";
			}
			echo json_encode($res);
}

if($crud == 'rearrive'){
			$res['horadepart'] = '00:00:00';

            $sql = "UPDATE autobusmae set hr2mae='00:00:00' where id='$docmov'";
			$query = $conn->query($sql);
			if($query){
				$res['horadepart'] = '00:00:00';
				$res['message'] = "OK";
			}
			else{
				$res['error'] = true;
				$res['message'] = "Error";
			}
			echo json_encode($res);
}

if($crud == 'reouvrir'){
			$res['horadepart'] = '00:00:00';

            $sql = "UPDATE autobusmae set hr2mae='00:00:00', hr3mae='00:00:00' where id='$docmov'";
			$query = $conn->query($sql);
			if($query){
				$res['horadepart'] = '00:00:00';
				$res['horadearrive'] = '00:00:00';

				$res['message'] = "OK";
			}
			else{
				$res['error'] = true;
				$res['message'] = "Error";
			}
			echo json_encode($res);
}


if($crud == 'arrive'){
			$res['horadepart'] = '00:00:00';
            $horacontrol = ($hora.":".$minuto.":".$segundos);
            $sql = "UPDATE autobusmae set hr3mae='$horacontrol' where id='$docmov'";
			$query = $conn->query($sql);
			if($query){
				$res['horadepart'] = $horacontrol;
				$res['message'] = "OK";
			}
			else{
				$res['error'] = true;
				$res['message'] = "Error";
			}
			echo json_encode($res);
}






$conn->close();
die();





?>