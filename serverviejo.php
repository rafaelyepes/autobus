<?php
//echo phpversion();
/*
echo ("</br>");
echo ("</br>");
echo ("</br>");
*/

//$serverName = "10.0.10.19\SQLEXPRESS";
//$serverName = "CENTAUR-PC\SQLEXPRESS";
//$serverName = "CENTAUR-PC";
$serverName = "10.0.10.19";
//$uid = 's1';
//$pwd = 'Abc123456';
$uid = 'sa';
$pwd = '95A6t584P3eTY';
$databaseName = 'Centaur3Main';
$connectionInfo = array('Database'=>$databaseName, 'UID'=>$uid, 'PWD'=>$pwd, 'CharacterSet'=>'UTF-8');

$conn = sqlsrv_connect($serverName, $connectionInfo);


if($conn){
//	echo 'Conectado Correctamente'; 
}else{
	echo 'Fallo en la Conexion <br />';
	die(print_r(sqlsrv_errors(),TRUE));
}

// create var to be filled with export data
$csv_export = '';
// filename for export
$csv_filename = 'db_export_'.date('Y-m-d').'.csv';


// query to get data from database
$sql = "SELECT  cu.UDText1b, cu.LastName, cu.FirstName, cu.UDText8b, ug.Nom as OperationName
FROM Tracker.dbo.Users tu
inner join Centaur3Main.dbo.Users cu on cu.UserID = tu.UserID
inner join Centaur3Main.dbo.UserGroups ug on ug.ID = cu.UserGroupID
where tu.Status = 1
order by ug.Nom, cu.LastName, cu.FirstName";

$query = sqlsrv_query($conn, $sql);
$field = sqlsrv_num_fields($query);
$records = array();

/*
echo getcwd();
echo ("</br>");
echo ("</br>");
echo ("</br>");

//$csv_file = getcwd()."\"."Archivosql.csv";

echo ($csv_file);
*/
$csv_file = "Archivosql.csv";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=".$csv_file."");
$fh = fopen( 'php://output', 'w' );


while( $row = sqlsrv_fetch_array( $query )) {
	$cont=rtrim(strlen($row[0]));
	$cont1 = str_replace(' ', '', $row[0]);

	$cont2=rtrim(strlen($cont1));
	
	if( $cont == 5 && $cont2 == 5 ) { 
		fputcsv($fh, array($row[1], $row[3], $row[2], $row[4], $row[0]));
		/*
		echo $row[0];
		echo $row[1];
		echo $row[2];
		echo $row[3];
		echo $row[4];
		echo ("</br>");
		*/
	}
}

/*
$csv_file = "Archivo_".date('Ymd') . ".csv";
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=".$csv_file."");
$fh = fopen( 'php://output', 'w' );
$is_coloumn = true;
if(!empty($records)) {
	foreach($records as $record) {
	if($is_coloumn) {
		fputcsv($fh, array_keys($record));
		$is_coloumn = false;
	}	
	fputcsv($fh, array_values($record));
	}
}
*/

echo ("</br>");
echo ("</br>");
echo 'Conexion Cerrada Correctamente'; 

sqlsrv_close($conn);
?>