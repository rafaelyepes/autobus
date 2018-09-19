<?php

$conn = new mysqli("localhost", "root", "", "autobus");
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//mysql_query("SET NAMES 'utf8'");

$out = array('error' => false);

$crud = 'read';

if(isset($_GET['crud'])){
	$crud = $_GET['crud'];
}
if(isset($_POST['crud'])){
	$crud = $_POST['crud'];
}



if($crud == 'read'){
    $documento = $_GET['documento'];
	//$documento="abc";
	$sql = "select * from autobusmov where docmov='$documento'";
//	$sql = "select * from autobusmov";
	$query = $conn->query($sql);
	$members = array();

	while($row = $query->fetch_array()){
		array_push($members, $row);
	}

	$out['members'] = $members;
}

if($crud == 'create'){
	$out['message'] = "Impossible d'ajouter un employé";
	$firstname = $_POST['nommov'];
	$lastname = $_POST['apemov'];
	$sexe = $_POST['sexmov'];
	$documento = $_POST['documento'];
	$fecmov = $_POST['fecmov'];
	//$out['message'] = "Impossible d'ajouter un employé--222";


	$sql = "insert into autobusmov (docmov, fecmov, nommov, apemov, sexmov, stamov) values ('$documento','$fecmov','$firstname', '$lastname', '$sexe', 'Embarqué')";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Employé ajouté avec succès";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Impossible d'ajouter un employé";
	}
	
}

if($crud == 'create1'){
	$numero = $_POST['nummov'];
	$firstname = $_POST['nommov'];
	$lastname = $_POST['apemov'];
	$sexe = $_POST['sexmov'];
	$documento = $_POST['documento'];

    $sql = "insert into autobusmov (docmov, nummov, nommov, apemov, sexmov, stamov) values ('$documento','$numero','$firstname', '$lastname', '$sexe', 'Embarqué')";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Employé ajouté avec succès";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Impossible d'ajouter un employé";
	}
}

if($crud == 'update'){

	$memid = $_POST['id'];
	$firstname = $_POST['nommov'];
	$lastname = $_POST['apemov'];
	$sexe = $_POST['sexmov'];

	$sql = "update autobusmov set nommov='$firstname', apemov='$lastname',  sexmov='$sexe' where id='$memid'";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Employé ajouté avec succès";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Impossible de mettre à jour un employé";
	}
	
}

if($crud == 'delete'){

	$memid = $_POST['memid'];

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

if($crud == 'debarque'){
	$memid = $_POST['id'];
	$debar="Débarqué";
	$sql = "update autobusmov set stamov='$debar' where id='$memid'";
	$query = $conn->query($sql);
	if($query){
		$out['message'] = "Employé Débarqué";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Impossible Débarqué l'employé ";
	}


	$out['message'] = "Impossible Débarqué l'employé ";
}


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


if($crud == 'valida'){
	$nummov = $_POST['nummov'];
	$fecmov = $_POST['fecmov'];


	//$nummov = "10014";
	//$fecmov = "2018-04-19";

	$sw="1";
	$members = array();


	$sql = "select * from autobusmov WHERE nummov='$nummov' and fecmov='$fecmov'";
	$query = $conn->query($sql);
	while($row = $query->fetch_array()){
		array_push($members, $row);
		$sw="0";	
	}


	if ($sw == "0"){
	  //$members = array();
	}else{
		$first_array = array( 
                 "nummov" => "NumeroTemporal-2", 
                 'nommov' => 'NUEVO', 
                 'apemov' => '', 
                 'sexmov' => '', 
                 'stamov' => 'Embarqué', 
            ); 
		array_push($members,$first_array);
	 }



	//$out['message'] = "Consultado ok en la Base de Datos";
	$out['members'] = $members;
}


if($crud == 'revisa'){
	$out['message'] = "REVISANDO l'employé ";
	/*
	$numero = $_POST['nummov'];
	$sql = "select * from autobusmov WHERE nummov='$numero'";
	$query = $conn->query($sql);
	$members = array();
	$sw="0";
	while($row = $query->fetch_array()){
		array_push($members, $row);
		$sw="1";	
	}
	if ($sw == "1"){
	 //$members = array();
	}else{
		$first_array = array( 
                 "nummov" => $numero, 
                 'nommov' => 'NUEVO', 
                 'apemov' => '', 
                 'sexmov' => '', 
                 'stamov' => 'Embarqué', 
            ); 
		array_push($members,$first_array);
	}
	//	$out['message'] = "Consultado ok en la Base de Datos";
	$out['members'] = $members;
	*/
}

if($crud == 'grababd'){
	$nummov = $_POST['nummov'];
	$fecmov = $_POST['fecmov'];
	$docmov = $_POST['docmov'];


	$firstname = "NA";
	$lastname = "NA";
	$sexe = "null";

	//$nummov = "10014";
	//$fecmov = "2018-04-19";

	$sw="0";
	$members = array();

	$sql = "select * from autobusmov WHERE nummov='$nummov' and fecmov='$fecmov'";
	$query = $conn->query($sql);
	while($row = $query->fetch_array()){
		//array_push($members, $row);
		$sw="1";	
	}

	if ($sw == "0"){
		$sql = "select * from autobusemp where numemp='$nummov'";
		$query = $conn->query($sql);
		while($row = $query->fetch_array()){
			//$firstname = "Primer nombre ok";
			//$lastname  = "Last Name OK";
			$firstname = $row['nomemp'];
			$lastname = $row['apeemp'];
		}

		$sql = "insert into autobusmov (docmov, fecmov, nummov, nommov, apemov, sexmov, stamov) values ('$docmov','$fecmov','$nummov','$firstname', '$lastname', '$sexe', 'Embarqué')";
		$query = $conn->query($sql);

		 $first_array = array( 
                 "nummov" => $nummov, 
                 'nommov' => $firstname, 
                 'apemov' => $lastname, 
                 'sexmov' => '', 
                 'stamov' => 'Embarqué',
                  ); 
		array_push($members,$first_array); 

	}else{
				 $first_array = array( 
                 "nummov" => $nummov, 
                 'nommov' => 'EXISTE', 
                 'apemov' => '', 
                 'sexmov' => '', 
                 'stamov' => 'Embarqué', 
            ); 
		array_push($members,$first_array);


	}


	
	
	//$out['message'] = "Consultado ok en la Base de Datos";
	$out['members'] = $members;
}




$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();


?>