<?php
      include ("./conectar4.php");
      $buscar = $_POST['b'];

       if(!empty($buscar)) {
            $buscar=mysql_real_escape_string($buscar); //decodifica el texto
            buscar($buscar);
      }
      function buscar($b) {
            mysql_query ("SET NAMES 'utf8'");
            $consulta = "SELECT * FROM baseinfor WHERE baseinfor02 LIKE '%$b%' order by baseinfor02 asc";

            $rs_tabla=mysql_query($consulta);
            $nrs=mysql_num_rows($rs_tabla);
            $contar = mysql_num_rows($rs_tabla);

            if($contar == 0){
                  echo "Aucun résultat pour '<b>".$b."</b>'.";
            }else{
                   if($contar >= 1){

                    $combo="combo";
                    $cl=1;
                    for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
                          $nombre=trim(mysql_result($rs_tabla,$i,"baseinfor02"));
                          $id=trim(mysql_result($rs_tabla,$i,"baseinfor01"));
                          $version=trim(mysql_result($rs_tabla,$i,"baseinfor06"));
                          if($cl == 1){

                           echo '<input type="text" name="nombre" id="combo'.$i.'" class="combo" onclick="validar2(this.id, this.value)" value="'.$nombre.'" readonly>';
                           echo '<br>';
                           echo '<input type="hidden" name="id" id="id'.$i.'" value="'.$id.'" >';
                           echo '<input type="hidden" name="version" id="version'.$i.'" value="'.$version.'" >';

                          } //fin $cl
                   } //fin for
                 }  //fin contar
              }  //fin contar
      } //fin funcion buscar

?>
