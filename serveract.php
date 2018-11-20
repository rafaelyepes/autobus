<?php
include ("./indexg1.php");
$ruta="localhost";
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

		/*
		echo ($numemp);
		echo ("---");
		echo ($nomemp);
		echo ("///");
		echo ($apeemp);
		echo ("***");
		echo ($sexemp);
		echo ("---");
		echo ($actemp);
		echo ("///");
		echo ($gruemp);
		echo ("***");
		echo ($tomemp);
		echo ("---");
		echo ($GRUEMP1);
		echo ("***");
		echo ("</br>");
		*/
}
echo 'FIN Recorrido Tabla Generada - Actulizado el servidor';
?>
