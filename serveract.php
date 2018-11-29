<?php
include ("./indexg1.php");
$ruta="localhost";
$clave="sesamo";
$clave="";
$conn4 = new mysqli($ruta, "root", $clave, "autobus");
echo ("</br>");echo ("</br>");
echo ("</br>");
echo ("</br>");
echo ("</br>");
echo ("</br>");
echo ("</br>");
echo 'Recorriendo Tabla Generada';
echo ("</br>");
$fh = fopen('backup.csv', 'r');
while(! feof($fh)){
		$row=fgetcsv($fh);
		$codigo=$row[0];
		$nombre=$row[1];
		$apeemp=$row[2];
		$sexemp=$row[3];
		$activo=$row[4];
		$grupo=$row[5];
		$tomemp=$row[6];
		$GRUEMP1=$row[7];
		$sql4 = "INSERT INTO autobusemp (numemp, nomemp, gruemp, gruemp1 , actemp) values ('$codigo', '$nombre', '$grupo', '$grupo', '$activo') ON DUPLICATE KEY UPDATE nomemp='$nombre', gruemp1='$grupo', actemp='$activo'";
		$query4 = $conn4->query($sql4);
		echo ($codigo);
		echo ("---");
		echo ($nombre);
		echo ("///");
		echo ($grupo);
		echo ("</br>");

}
echo 'FIN Recorrido Tabla Generada - Actulizado el servidor';

//SELECT numemp,nomemp,GRUEMP1 FROM autobusemp where autobusemp.GRUEMP1<>"000-INAC" and autobusemp.GRUEMP1<>"9995-arr" and autobusemp.GRUEMP1<>"G1" and autobusemp.GRUEMP1<>"G2" and actemp=""


//DEL LISTADO QUE TENEMOS ESOS SE HAN VENIDO EN EL AUTOBUS
//SELECT numemp,nomemp,GRUEMP1 FROM autobusemp INNER JOIN autobusmov ON autobusemp.numemp=autobusmov.nummov where autobusemp.GRUEMP1<>"000-INAC" and autobusemp.GRUEMP1<>"9995-arr" and autobusemp.GRUEMP1<>"G1" and autobusemp.GRUEMP1<>"G2" and actemp="" GROUP by numemp

//DEL LISTADO QUE TENEMOS ESOS SE DEBEN VENIR EN EL BUS Y NO SE HAN VENID
//SELECT numemp,nomemp,GRUEMP1 FROM autobusemp LEFT JOIN autobusmov ON autobusemp.numemp=autobusmov.nummov where autobusemp.GRUEMP1<>"000-INAC" and autobusemp.GRUEMP1<>"9995-arr" and autobusemp.GRUEMP1<>"G1" and autobusemp.GRUEMP1<>"G2" and actemp="" GROUP by numemp

//SELECT autobusemp.numemp,autobusemp.nomemp,autobusemp.GRUEMP1,autobusemp.actemp, autobusmov.eximov FROM autobusmov RIGHT JOIN autobusemp ON autobusemp.numemp=autobusmov.nummov where autobusemp.GRUEMP1<>"0-INACTI" and autobusemp.GRUEMP1<>"9000-A" and autobusemp.GRUEMP1<>"9000 - A" and autobusemp.GRUEMP1<>"903 - Co" and autobusemp.GRUEMP1<>"000-INAC" and autobusemp.GRUEMP1<>"9995-arr" and autobusemp.GRUEMP1<>"G1" and autobusemp.GRUEMP1<>"G2" and actemp="" GROUP by numemp



?>
