<?php
include ("./conectar4.php");
echo ("</br>");
echo ("Linea-1");
echo ("</br>");
echo ("Linea-2");
echo ("</br>");
echo ("Linea-3");
$fechai="2018-11-01";
$fechaf="2018-11-30";
$i=0;
$sql="SELECT * FROM autobusmae WHERE  datmae>='$fechai' and datmae<='$fechaf' order by id";
$query = $conn->query($sql);
while($row = $query->fetch_array()){
   $idb        = $row['id'];
   $control01  = $row['docmae'];
   $control02  = $row['busmae'];
   $control06  = $row['chomae'];
   $control07  = $row['reg_time'];
   $control09  = $row['hr1mae'];
   $control08  = $row['hr2mae'];
   $control09  = $row['datmae'];
   echo ("</br>");
   echo ($control01);
}
?>
