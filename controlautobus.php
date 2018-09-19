<?php
            include ("./conectar4.php"); 
            $return_arr = array();
 
            $d1=$_POST['d1'];
            $d2=$_POST['d2'];
            $d3=$_POST['d3'];
            $documento=$_POST['documento'];
            $control=$_POST['control'];

            $fecha = new DateTime('NOW');
            $hora= $fecha->format('H');
            $minuto=$fecha->format('i');
            $segundos=$fecha->format('s');
            $fecha=$fecha->format('Y-m-d');
            $ano = substr($fecha,2,2);
            $mes = substr($fecha,5,2);
            $dia = substr($fecha,8,2);

            $return_arr[] = array("docu" => $documento);



            $horacontrol = ($hora.":".$minuto.":".$segundos);

            if ($control == "depart"){    
            $query_operacion1="update autobusmae set hr2mae='$horacontrol' where docmae='$documento'";
            $rs_tabla1=mysql_query($query_operacion1);   
            }

            if ($control == "rearrive"){    
            $query_operacion1="update autobusmae set hr2mae=null where docmae='$documento'";
            $rs_tabla1=mysql_query($query_operacion1);   
            }

            if ($control == "arrive"){    
            $query_operacion1="update autobusmae set hr3mae='$horacontrol'  where docmae='$documento'";
            $rs_tabla1=mysql_query($query_operacion1);   
            }
            //Passando vetor em forma de json
            // Encoding array in JSON format
    echo json_encode($return_arr);
?>    
