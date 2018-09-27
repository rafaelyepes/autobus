<?php
 
class myDBC {
    public $mysqli = null;
 
    public function __construct() {
 
  	    include ("../conectar.php");  

    }
 
    public function __destruct() {
        $this->CloseDB();
    }
 
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }
 
    public function seleccionar_datos()
    {
		
		$q = "SELECT tablag.*,tablap.* FROM tablag,tablap WHERE tablag.datepr='$datepr' AND tablag.recete=tablap.recete";
 
        $result = $this->mysqli->query($q);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        if( $result->num_rows == 0)
        {
            echo'<script type="text/javascript">
                alert("ningun registro");
                </script>';
        }
 
        else{
 
            while($row = mysqli_fetch_assoc($result))
            {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        }
        //Regresa array asociativo
        return $valores;
    }
}
?>