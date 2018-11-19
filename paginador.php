<table class="tablat" border=1 id ="your-table-id" cellspacing=0 cellpadding=0>
<?php
include ("./conectar4.php");
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

   <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid21<?php echo ($i)?>" readonly   value="<?php echo ($control02)?>"/>
   </td>

   <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid22<?php echo ($i)?>"  readonly  value="<?php echo ($control07)?>"/></td>

   <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid23<?php echo ($i)?>"  readonly value="<?php echo ($control09)?>"/></td>

   <td align="left"><input class="form-control" type="text"  style="width: 100%;  min-width: 100%; align: left;"  id="poid24<?php echo ($i)?>" readonly  value="<?php echo ($control08)?>"/></td>

   <td align="center"><button type="button" border="0" id="poid27e<?php echo ($i)?>"  onmouseout="salir_del_hover()" onmouseover="hacer_hover()" onclick="consultar(this.id)" class="button" value=""><img width="90%" height="11%" src="./img/editer.png"></button></td>


   </tr>
  <?php
  }
  ?>
  </table>
