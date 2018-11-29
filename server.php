<?php
include ("./indexg1.php");
// numeros duplicados */
/*
SELECT NUMEMP, COUNT(*) Total
FROM autobusemp
GROUP BY numemp
HAVING COUNT(*) > 1
*/
//echo phpversion();
/*
echo ("</br>");
echo ("</br>");
echo ("</br>");
*/

//$serverName = "10.0.10.19\SQLEXPRESS";
//$serverName = "CENTAUR-PC\SQLEXPRESS";
//$serverName = "CENTAUR-PC";
ini_set('max_execution_time', 900); //900 seconds = 15 minutes
$serverName = "10.0.10.19";
//$uid = 's1';
//$pwd = 'Abc123456';
$uid = 'sa';
$pwd = '95A6t584P3eTY';
$databaseName = 'Centaur3Main';
$connectionInfo = array('Database'=>$databaseName, 'UID'=>$uid, 'PWD'=>$pwd, 'CharacterSet'=>'UTF-8');

$conn = sqlsrv_connect($serverName, $connectionInfo);


if($conn){
	echo 'Conectado Correctamente';
}else{
	echo 'Fallo en la Conexion <br />';
	die(print_r(sqlsrv_errors(),TRUE));
}

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


echo ("</br>");
echo ("</br>");
echo ("</br>");

$conector="0";
while( $row = sqlsrv_fetch_array( $query )) {
	$cont=rtrim(strlen($row[0]));
	$cont1 = str_replace(' ', '', $row[0]);

	$cont2=rtrim(strlen($cont1));

	if( $cont == 5 && $cont2 == 5 ) {
   	    //fputcsv($fh, array($row[1], $row[3], $row[2], $row[4], $row[0]));
				$codigo=trim($row[0]);
				$nombre=ltrim(substr($row[1],5)).' '.trim($row[2]);
				$grupo=trim($row[4]);
				$activo=trim($row[3]);

				if ($conector == '0'){
					$conector = '1';
					$ruta="localhost";
					$clave="";
					$conn4 = new mysqli($ruta, "root", $clave, "autobus");
				}
  			$sql4 = "INSERT INTO autobusemp (numemp, nomemp, gruemp, gruemp1 , actemp) values ('$codigo', '$nombre', '$grupo', '$grupo', '$activo') ON DUPLICATE KEY UPDATE nomemp='$nombre', gruemp1='$grupo', actemp='$activo'";
				$query4 = $conn4->query($sql4);
			}  //fin if
}	//fin while
echo ("</br>");
echo ("</br>");
echo 'Conexion Cerrada Correctamente';
sqlsrv_close($conn);

echo ("</br>");
echo ("</br>");
echo 'Iniciando Proceso Espere un momento';
echo ("</br>");
echo ("</br>");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$database = 'autobus';
$tablap = 'autobusemp';
$user = 'root';
$pass = '';
$host = 'localhost';

//Genera .sql Backup de una tabla//
/*
$dir = dirname(__FILE__) . '\autobusemp.sql';
echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
exec("C:/xampp\mysql\bin\mysqldump --user={$user} --password={$pass} --host={$host} {$database} {$tablap} --result-file={$dir} 2>&1", $output);
var_dump($output);
*/
//FIN Genera .sql Backup de una tabla//

//Genera .csv  de una tabla//:
echo ("</br>");
echo ("</br>");
echo "Generando ARCHIVO --backup.csv--";

$archivo_csv = fopen('backup.csv', 'w');

if($archivo_csv)
{
	  $sql1 = "SELECT numemp, nomemp, apeemp, sexemp, actemp, gruemp, tomemp, GRUEMP1 FROM autobusemp WHERE 1";
		$sth = $conn4->query($sql1);
				while($fila = $sth->fetch_assoc()){
					fputcsv($archivo_csv, $fila);
        }
		    fclose($archivo_csv);
}else{
		echo ("</br>");
    echo "El archivo no existe o no se pudo crear";
}
//FIN  Genera .csv  de una tabla//
echo ("</br>");
echo "Archivo creado Correctamente";
?>
