<?php require_once('Connections/conexion_usuarios.php'); ?>
<?php

if (!isset($_SESSION)) {
  session_start();
}


$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){

  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";


function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  
  $isValid = False; 

 
  if (!empty($UserName)) { 

    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 

    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "ingreso.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?><?php
$colname_consulta_usuario = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_consulta_usuario = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_conexion_usuarios, $conexion_usuarios);
$query_consulta_usuario = sprintf("SELECT `user` FROM usuarios WHERE `user` = '%s'", $colname_consulta_usuario);
$consulta_usuario = mysql_query($query_consulta_usuario, $conexion_usuarios) or die(mysql_error());
$row_consulta_usuario = mysql_fetch_assoc($consulta_usuario);
$totalRows_consulta_usuario = mysql_num_rows($consulta_usuario);
?>



<!DOCTYPE html>
<html lang="es">
<head>
	
    
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    <meta charset="utf-8"/>
	<title>UPQ Store</title>
    
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
 



   
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <style type="text/css">
    .container .row .row .col-sm-4.col-lg-4.col-md-4 {
	font-style: italic;
}
    .container .row .row .col-sm-4.col-lg-4.col-md-4 {
	text-align: center;
}
    </style>

</head>
<body>
	
		
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">UPQ Store</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
  </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                
                
                
                <table width="900" border="0">
  <tr>
    <td width="140"><a href="entrar.php"> <FONT SIZE=5 ace="Comic Sans MS"><B>Inicio</B><FONT>                    </a></td>
    <td width="360"> <a href="grafica_productos.php"><FONT SIZE=5 ace="Comic Sans MS"><B>Grafica Productos</B></FONT></a></td>
    <td width="360"> <a href="grafica_usuarios.php"><FONT SIZE=5 ace="Comic Sans MS"><B>Grafica Usuarios</B></FONT></a></td>
  <tr>
    <td width="200"><?php echo $row_consulta_usuario['user']; ?></td>
  </tr>
</table>
    <p>&nbsp;<a href="<?php echo $logoutAction ?>"><img src="imagenes/05.jpg.png" width="25" height="21"><FONT SIZE=3 ace="Comic Sans MS" color="#FF0000"><B>Cerrar Sesión</B></FONT></a></td>
    <td width="74"><a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a></td>
  </tr>
</table>
         
                
                   </u>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
       
       
        
	</header>
	<section>
    
    
    
    
    
        <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead"><span class="navbar-header"><a class="navbar-brand" href="#"><img src="imagenes/logo.png" width="233" height="110"></a></span></p>
                <p class="lead">&nbsp;</p>
                <p class="lead">&nbsp;</p>
                <p class="lead">&nbsp;</p>
              <p class="lead">Categorias</p>
                <div class="list-group">
                    <a href="Tazas.php" class="list-group-item">Tazas</a>
                    <a href="Plumas.php" class="list-group-item">Plumas</a>
                    <a href="Camisas.php" class="list-group-item">Camisas</a>
                    <a href="Agendas.php" class="list-group-item">Agendas</a>
                    <a href="Juegos.php" class="list-group-item">Juegos</a>
                    <a href="Ropa.php" class="list-group-item">Ropa Deportiva</a>
                    
                    <a href="Recuerdos.php" class="list-group-item">Recuerdos</a>
                    <a href="Mochilas.php" class="list-group-item">Mochilas</a>
                    <a href="#" class="list-group-item">Chamarras</a>
                <a href="#" class="list-group-item">Otros</a></div>
          </div>
    
    
    
    
    
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos where nombre = 'Agenda'")or die(mysql_error());
		
		
		while ($f=mysql_fetch_array($re)) {
		?>
			<div class="producto">
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<a href="./detalles.php?id=<?php  echo $f['id'];?>">ver</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>