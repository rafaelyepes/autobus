<?php
            include ("./conectar4.php"); 
            $return_arr = array();
            $doc2 = "FDC" ;    
            
            $fechadiaria=$_POST['fecha'];
            $bus=$_POST['bus'];
            $chofer=$_POST['chofer'];

            $viaje=$_POST['viaje'];

            $fecha = new DateTime('NOW');
            $hora= $fecha->format('H');
            $minuto=$fecha->format('i');
            $segundos=$fecha->format('s');
            $fecha=$fecha->format('Y-m-d');
            $ano = substr($fecha,2,2);
            $mes = substr($fecha,5,2);
            $dia = substr($fecha,8,2);
          //  $viaje=1;
            $sw="0";

           
            $consulta="SELECT * FROM autobusmae where datmae='$fechadiaria' and busmae='$bus' and chomae='$chofer'";

            $rs_tabla=mysqli_query($consulta);   
           
            for ($i = 0; $i < mysqli_num_rows($rs_tabla); $i++) {
                 $id = mysqli_data_seek($rs_tabla,$i,"id");
                 $documento = mysqli_data_seek($rs_tabla,$i,"docmae");
                 $horadepart = mysqli_data_seek($rs_tabla,$i,"hr3mae");
                 $viaje = mysqli_data_seek($rs_tabla,$i,"viamae");
                 if($horadepart="00:00:00"){
                   $sw = "1";   
                 }else{
                   $viaje++;
                   $sw = "0";   
                 } //fin del null
             }  //fin del for  

            if ($sw == "0"){
            $query_operacion = "insert into autobusmae (datmae, busmae, chomae, viamae) values ('$fechadiaria', '$bus', '$chofer', '$viaje')";
            $rs_operacion=mysqli_query($query_operacion);   
            $id=mysqli_insert_id();
            $doc2=$doc2.trim($id);
            $query_operacion1="update autobusmae set docmae='$doc2' where id='$id'";
            $rs_tabla1=mysqli_query($query_operacion1);   
            $return_arr[] = array(
                    "id"  => $id,
                    "viamae"  => $viaje,
                    "docu" => $doc2);
            }else{
             $return_arr[] = array(
                 "id"   => $id,
                 "viamae"  => $viaje,
                 "docu" => $documento);
            }  //fin del sw == 0
    //Passando vetor em forma de json
    // Encoding array in JSON format
    echo json_encode($return_arr);
?>    
