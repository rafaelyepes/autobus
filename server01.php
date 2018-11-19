<?php
ini_set('max_execution_time', 900); //900 seconds = 15 minutes

echo ("</br>");
echo ("</br>");
echo 'Iniciando Proceso SUBIENDO DATOS AL SERVIDOR Espere un momento';
echo ("</br>");
echo ("</br>");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filename = dirname(__FILE__) . '\autobusemp.sql';

echo ($filename);
echo ("</br>");
echo ("</br>");

$database = 'autobus';
$tablap = 'temporary_table';
$user = 'root';
$pass = '';
$host = 'localhost';
$dir = dirname(__FILE__) . '\autobusemp.sql';

$ruta="localhost";
$clave="";
$conn4 = new mysqli($ruta, "root", $clave, "autobus");
$sql4 = "DROP TABLE autobusemp";
$query4 = $conn4->query($sql4);


echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
//$list = shell_exec ("C:\xampp\mysql\bin\mysqldump.exe $database  --user=$user--password=$pass > dumpfile.sql");
exec("C:/xampp\mysql\bin\mysql --user={$user} --password={$pass} --host={$host} {$database} < $dir");


//exec("C:/xampp\mysql\bin\mysqldump --user={$user} --password={$pass} --host={$host} {$database} {$tablap} --result-file={$dir} 2<&1", $dir);
//var_dump($dir);


echo 'Tabla Recuperada Correctamente';
?>
