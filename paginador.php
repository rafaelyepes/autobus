<script>
function myFunction(id){
  d2=id;
/*
  alert (id);
  alert ("xx");
*/
  location.href="http://www.google.com";
}  //fin de l



</script>
<table class="tablat" border=1 id ="your-table-id" cellspacing=0 cellpadding=0>
<?php
	 //header("Content-Type: text/html;charset=utf-8");
    include ("./conectar4.php");
    $codigo="plantill011a.php";
  	$RegistrosAMostrar=25;

	//  $fechai=($_GET['c']);
  //  $fechaf=($_GET['d']);

	//  $tipoc="0";

	//estos valores los recibo por GET
	if(isset($_GET['pag'])){
			$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
			$PagAct=$_GET['pag'];
		//caso contrario los iniciamos
	}else{
			$RegistrosAEmpezar=0;
			$PagAct=1;

	}

	$nombre_fichero1="../plantilla/archivos/fdc/";

    if(isset($_GET['b'])) {
        $codigo = $_GET["b"];
    }
    if(isset($_GET['c'])) {
        $fechai = $_GET["c"];
    }
    if(isset($_GET['d'])) {
        $fechaf = $_GET["d"];
    }

    if(isset($_GET['tipoc'])) {
        $tipoc= $_GET["tipoc"];
    }

    if ($tipoc!="0") {
      $fechai = date('Y-m-d');
      $fechaf = date('Y-m-d');
      if ($tipoc == "1"){
        $fechai = date('Y-m-d', strtotime('-720 day'));
      }
      if ($tipoc == "2"){
        $fechai = date('Y-m-d', strtotime('-8 day'));
      }
      if ($tipoc == "3"){
        $fechai = date('Y-m-d', strtotime('-30 day'));
      }
      if ($tipoc == "4"){
        $fechai = date('Y-m-d', strtotime('-360 day'));
      }
    }

  //  echo ($tipoc);
     mysql_query ("SET NAMES 'utf8'");

     $i=0;
     $sql="SELECT * FROM autobusmae WHERE  datmae>='$fechai' and datmae<='$fechaf' order by id DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";

     $query = $conn->query($sql);
      if ($query->num_rows > 0) {
       while($row = $query->fetch_array()){
        $idb        = $row['id'];
        $control01  = $row['docmae'];
        $control02  = $row['busmae'];
        $control06  = $row['chomae'];
        $control07  = $row['reg_time'];
        $control09  = $row['hr1mae'];
        $control08  = $row['hr2mae'];
        $control09  = $row['datmae'];
        $i=$i+1;
      ?>
      <tr id="mostrardatos" class="member">
      <td align="center" width="1%"><input class="form-control" type="hidden" id="poid<?php echo ($i)?>"  name="mitextoid[]"  required value="<?php echo ($idb)?>" />
      </td>

      <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid29<?php echo ($i)?>" readonly   value="<?php echo ($control09)?>"/>
      </td>

      <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid20<?php echo ($i)?>" readonly   value="<?php echo ($control01)?>"/>
      </td>

      <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid21<?php echo ($i)?>" readonly   value="<?php echo ($control02)?>"/>
      </td>

      <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid22<?php echo ($i)?>"  readonly  value="<?php echo ($control07)?>"/></td>

      <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid23<?php echo ($i)?>"  readonly value="<?php echo ($control09)?>"/></td>

      <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid24<?php echo ($i)?>" readonly  value="<?php echo ($control08)?>"/></td>

      <td align="center"><button type="button" border="0" id="poid27e<?php echo ($i)?>"  onmouseout="salir_del_hover()" onmouseover="hacer_hover()" onclick="consultar(this.id)" class="button" value=""><img width="90%" height="11%" src="./img/editer.png"></button></td>

      <input class="form-control" type="hidden"  style="width: 100%;  min-width: 100%; align: left;"  id="versionx<?php echo ($i)?>" readonly   value="<?php echo ($control06)?>"/>

   </td>




 </tr>
   <?php
   }  //fin del FOR
   } //FIN DEL IF NRS>0
		//******--------determinar las páginas---------******//

    $sql="SELECT * FROM autobusmae WHERE  datmae>='$fechai' and datmae<='$fechaf' order by id";
    $query = $conn->query($sql);

  	$NroRegistros=($query->num_rows);

		$PagAnt=$PagAct-1;
		$PagSig=$PagAct+1;
		$PagUlt=$NroRegistros/$RegistrosAMostrar;

		//verificamos residuo para ver si llevará decimales
		$Res=$NroRegistros%$RegistrosAMostrar;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina

		echo "<tr>";
		echo "<td colspan='10' align='center'>";
   	    if($Res>0) $PagUlt=floor($PagUlt)+1;
		 //desplazamiento
		 echo "<a onclick=\"Pagina('1')\">Pemier</a> ";
		 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\"><-- Pr&#233c&#233dent</a> ";
		 echo "<strong>Page ".$PagAct."/".$PagUlt."</strong>";
		 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Suivant --></a> ";
		 echo "<a onclick=\"Pagina('$PagUlt')\">  Derni&#233re</a>";
     echo "<tr>";

/*
		echo "</td>";
	    echo "</tr>";
	    echo "<tr>";
		echo "<td colspan='10' align='center'>";
   	    echo ($PagAct);
   	    echo ("<br>");
   	    echo ($PagUlt);
   	    echo ("<br>");
   	    echo ("Fecha Inicial".$fechai);
   	    echo ("<br>");
   	    echo ("Fecha Final ".$fechaf);
   	    echo ("<br>");
   	    echo ("Plantilla ".$codigo);
   	    echo ("<br>");
   	    echo ("Tipo C ".$tipoc);
   	    echo ("<br>");
   	    echo "</td>";
	    echo "</tr>";
*/

?>
</table>
