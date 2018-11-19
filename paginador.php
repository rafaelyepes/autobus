<table class="tablat" border=1 id ="your-table-id" cellspacing=0 cellpadding=0>
<?php
include ("./conectar4.php");
echo ("</br>");
echo ("Linea-1");
echo ("</br>");
echo ("Linea-2");
echo ("</br>");
echo ("Linea-3");
$fechai="2018-09-01";
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

   </tr>
  <?php
  }
  ?>
  </table>
