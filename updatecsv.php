<?php
include ("./conectar4.php"); 

$row = 1;  
$fp = fopen ("Archivo.csv","r");  
while ($data = fgetcsv ($fp, 10000, ";"))  
{  
    $num = count ($data);  
    echo " </br>";  
    $row++;  
    $linea=explode(',',$data[0]);
  
  /*  $linea2=explode(' ',$linea[1]);
    $linea3=explode('"',$linea2[1]);
    $linea4=explode('"',$linea2[0]);


    $lineacp1=rtrim($linea[0]);
    $lineacp2=rtrim($linea4[1]);*/



    //if ($lineacp1 == $lineacp2){
    if (isset($linea[4])){
      if(is_numeric($linea[4]) && $linea[4]!='') {
        echo "<td>$linea[4]</td>";
        echo "<td>     </td>";

        if (isset($linea[3])){
        echo "<td>$linea[3]</td>";
        echo "<td>     </td>";
        }

        /*
        if (isset($linea[1])){
        echo "<td>$linea[1]</td>";
        echo "<td>     </td>";
        }
        */

        if (isset($linea[0])){
        echo "<td>$linea[0]</td>";
        echo "<td>     </td>";
        }

        if (isset($linea[2])){
        echo "<td>$linea[2]</td>";
        echo "<td>     </td>";
        }

        $sw="0";
        $sql1 = "select * from autobusemp where numemp='$linea[4]'";
        $query1 = $conn->query($sql1);
        while($row = $query1->fetch_array()){
         $nomemp = $row['nomemp'];
         $apeemp = $row['apeemp'];
         $gruemp = $row['gruemp'];
         $actemp = $row['actemp'];
         $sw="1";   
        }
        if ($sw == "1"){
         if ($gruemp !="G1" && $gruemp !="G2"){

                        $sql = "UPDATE autobusmae set docmae='$docmov' where id='$docmov'";


            $sql2 = "UPDATE autobusemp set nomemp='$linea[0]',apeemp='$linea[2]', gruemp='$linea[3]', actemp='$linea[1]' where numemp='$linea[4]'";
            $query2 = $conn->query($sql2);
         }
        }else{
        $sql2 = "INSERT INTO autobusemp (numemp, nomemp, apeemp, gruemp , actemp) values ('$linea[4]', '$linea[0]', '$linea[2]', '$linea[3]', '$linea[1]')";
            $query3 = $conn->query($sql2);



        }





        }  // IF ES NUMERICO    
    }

    /*
    echo "<td>$linea3[0]</td>";
    echo "<td>$linea[2]</td>";
    echo "<td>$linea[3]</td>";
    echo "<td>$linea[4]</td>";
    echo "<td>$linea4[1]</td>";
    */
    //}
   
} 




?>