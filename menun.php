<?php
include ("detectar.php");

date_default_timezone_set("America/Montreal");

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" >
<head>
<title>LacroixNet</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script src="todataurl.js"></script>
<script src="signature.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/logo.ico"">



<style>
*{
  box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-box-sizing:border-box;
  font-family:arial;
  font-size:18px;
}
body{
background: rgb(248,80,50);
background: -moz-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 0%, rgb(241,111,92) 0%, rgb(246,41,12) 0%, rgb(241,111,92) 0%, rgb(231,56,39) 80%, rgb(240,47,23) 91%, rgb(240,47,23) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgb(248,80,50)), color-stop(0%, rgb(241,111,92)), color-stop(0%, rgb(241,111,92)), color-stop(0%, rgb(246,41,12)), color-stop(0%, rgb(241,111,92)), color-stop(80%, rgb(231,56,39)), color-stop(91%, rgb(240,47,23)), color-stop(100%, rgb(240,47,23)));
background: -webkit-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 0%, rgb(241,111,92) 0%, rgb(246,41,12) 0%, rgb(241,111,92) 0%, rgb(231,56,39) 80%, rgb(240,47,23) 91%, rgb(240,47,23) 100%);
background: -o-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 0%, rgb(241,111,92) 0%, rgb(246,41,12) 0%, rgb(241,111,92) 0%, rgb(231,56,39) 80%, rgb(240,47,23) 91%, rgb(240,47,23) 100%);
background: -ms-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 0%, rgb(241,111,92) 0%, rgb(246,41,12) 0%, rgb(241,111,92) 0%, rgb(231,56,39) 80%, rgb(240,47,23) 91%, rgb(240,47,23) 100%);
background: linear-gradient(to right, rgb(248,80,50) 0%, rgb(241,111,92) 0%, rgb(241,111,92) 0%, rgb(246,41,12) 0%, rgb(241,111,92) 0%, rgb(231,56,39) 80%, rgb(240,47,23) 91%, rgb(240,47,23) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f85032', endColorstr='#f02f17', GradientType=1 );
}
h1{
  color:#AAA173;
  text-align:center;
  font-faimly:icon;
  font-size:20px;
}

.login-form{
  width:350px;
  padding:40px 30px;
  background:rgba(235,235,205,0.7);
  border-radius:4px;
  -moz-border-radius:4px;
  -webkit-border-radius:4px;
  margin:50px auto;
}
.form-group{
  position: relative;
  margin-bottom:15px;
}

.form-control{
  width:100%;
  height:50px;
  border:none;
  padding:5px 7px 5px 15px;
  background:#fff;
  color:#666;
  border:2px solid #E0D68F;
  border-radius:4px;
  -moz-border-radius:4px;
  -webkit-border-radius:4px;
}

.form-control1{
  font-size:18px;
  background:#fff;
  color:#666;
  padding:5px 7px 5px 15px;
   border:2px solid #E0D68F;
  border-radius:4px;
  -moz-border-radius:4px;
  -webkit-border-radius:4px;

}


.form-control:focus, .form-control:focus + .fa{
  border-color:#10CE88;
  color:#10CE88;
}
.form-group .fa{
  position: absolute;
  right:15px;
  top:17px;
  color:#999;
}
.log-status.wrong-entry {
  -webkit-animation: wrong-log 0.3s;
  -moz-animation: wrong-log 0.3s;
  -ms-animation: wrong-log 0.3s;
  animation: wrong-log 0.3s;
}

.log-status.wrong-entry .form-control, .wrong-entry .form-control + .fa {
  border-color: #ed1c24;
  color: #ed1c24;
}

@keyframes wrong-log {
  0% { left: 0px;}
  20% {left: 15px;}
  40% {left: -15px;}
  60% {left: 15px;}
  80% {left: -15px;}
  100% {left: 0px;}
}
@-ms-keyframes wrong-log {
  0% { left: 0px;}
  20% {left: 15px;}
  40% {left: -15px;}
  60% {left: 15px;}
  80% {left: -15px;}
  100% {left: 0px;}
}
@-moz-keyframes wrong-log {
  0% { left: 0px;}
  20% {left: 15px;}
  40% {left: -15px;}
  60% {left: 15px;}
  80% {left: -15px;}
  100% {left: 0px;}
}
@-webkit-keyframes wrong-log {
  0% { left: 0px;}
  20% {left: 15px;}
  40% {left: -15px;}
  60% {left: 15px;}
  80% {left: -15px;}
  100% {left: 0px;}
}
.log-btn{
background: rgb(248,80,50);
background: -moz-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 50%, rgb(246,41,12) 51%, rgb(240,47,23) 71%, rgb(231,56,39) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgb(248,80,50)), color-stop(50%, rgb(241,111,92)), color-stop(51%, rgb(246,41,12)), color-stop(71%, rgb(240,47,23)), color-stop(100%, rgb(231,56,39)));
background: -webkit-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 50%, rgb(246,41,12) 51%, rgb(240,47,23) 71%, rgb(231,56,39) 100%);
background: -o-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 50%, rgb(246,41,12) 51%, rgb(240,47,23) 71%, rgb(231,56,39) 100%);
background: -ms-linear-gradient(left, rgb(248,80,50) 0%, rgb(241,111,92) 50%, rgb(246,41,12) 51%, rgb(240,47,23) 71%, rgb(231,56,39) 100%);
background: linear-gradient(to right, rgb(248,80,50) 0%, rgb(241,111,92) 50%, rgb(246,41,12) 51%, rgb(240,47,23) 71%, rgb(231,56,39) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f85032', endColorstr='#e73827', GradientType=1 );

  dispaly:inline-block;
  width:100%;
  font-size:16px;
  height:50px;
  color:#fff;
  text-decoration:none;
  border:none;
  border-radius:4px;
  -moz-border-radius:4px;
  -webkit-border-radius:4px;
}

.link{
  text-decoration:none;
  color:#9D8E79;
  display:block;
  text-align:right;
  font-size:14px;
  margin-bottom:15px;
}
.link:hover{
  text-decoration:underline;
  color:#8C918F;
}
.alert{
  display:none;
  font-size:14px;
  color:#f00;
  float:left;
}
</style>


<script language="javascript">

function validar() 
{
sw = "1";
if (document.formulario.usuario.value == ""){
    sw = "2";
    document.formulario.usuario.focus();
}    

if (document.formulario.clave.value == "" & sw == "1"){
    sw = "3";
    document.formulario.clave.focus();
}    
    
if (sw == "1") {    
document.getElementById("formulario").submit();
}

    
}
function envia3(tecla) {
    tecla = tecla;
    
    if (tecla == 13) {
        
        document.formulario.clave.focus();
        
} else if (!((event.keyCode>=48) && (event.keyCode<=57))) {
event.keyCode=0;

}

}

function validar1(tecla) {
    tecla = tecla;
    
    if (tecla == 13) {
        validar();        
        
} else if (!((event.keyCode>=48) && (event.keyCode<=57))) {




event.keyCode=0;

}

}

function inicio() {
document.formulario.usuario.focus();


}

</script>
</head> 
<body onload=inicio()>
<form name="formulario" action="controln.php" method="post" id="formulario">
   <input type="hidden" name="menu" id="menu" value="<?php echo ($menu)?>">
     <div class="login-form">
     <h1>Login</h1>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " name="usuario" id="usuario" onKeypress="envia3(window.event.keyCode)">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" name="clave" id="clave" onKeypress="validar1(window.event.keyCode)">
       <i class="fa fa-lock"></i>
     </div>
     <span class="alert">Invalid Credentials</span>
      
     <button type="button" class="log-btn" onclick="validar()" >Log in</button>
    
   </div>
</form> 
 
  
   
    
</body> 
</html>