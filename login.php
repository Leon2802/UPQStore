<?php require_once('Connections/conexion_usuarios.php'); ?>
<?php
mysql_select_db($database_conexion_usuarios, $conexion_usuarios);
$query_consulta_usuarios = "SELECT * FROM usuarios";
$consulta_usuarios = mysql_query($query_consulta_usuarios, $conexion_usuarios) or die(mysql_error());
$row_consulta_usuarios = mysql_fetch_assoc($consulta_usuarios);
$totalRows_consulta_usuarios = mysql_num_rows($consulta_usuarios);
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "entrar.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion_usuarios, $conexion_usuarios);
  
  $LoginRS__query=sprintf("SELECT user, password FROM usuarios WHERE user='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion_usuarios) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>












<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
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
    .centro {
	text-align: center;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Categorias</a>
                    </li>
                    <li>
                        <a href="grafica_productos.php">Grafica de Productos</a>
                    </li>
                    <li>
                        <a href="grafica_usuarios.php">Grafica de Compras de Clientes</a>
                    </li>
                    <li>
                        <a href="login.php">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead"><span class="navbar-header"><a class="navbar-brand" href="#"><img src="imagenes/logo.png" width="233" height="110"></a></span></p>
                <p class="lead">&nbsp;</p>
                <p class="lead">&nbsp;</p>
                <p class="lead">&nbsp;</p>
          </div>
            
      </div>
                </div>
      </div>

</div>

</div>

    </div>
    <p>&nbsp;</p>
    <form id="form_ingreso" name="form_ingreso" method="POST" action="<?php echo $loginFormAction; ?>"> 
<table width="876" border="0">
      <tr>
        <td width="247">&nbsp;</td>
        <td width="359">
        
       

<table bgcolor="#E6E6E6" width="334" height="1">
      <tr>
        <td width="153" class="centro">Nombre de usuario: </td>
        <td width="31" class="centro">
          <label>
            <input name="usuario" type="text" id="usuario" />
          </label>
        </td>
      </tr>
      <tr>
        <td class="centro">Contrase&ntilde;a:</td>
        <td class="centro">
          <label>
            <input name="contrasena" type="password" id="contrasena" />
          </label>
        </td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <span class="centro">
          <label>
            <input style="color:#FFFFFF;background-color:red" type="submit" name="Submit" value="Entrar" />
          </label>
        </span></div></td>
      </tr>
    </table>





        
        </td>
        <td width="248">&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><!-- /.container -->
      
    </p>
    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Universidad Politécnica de Querétaro &copy; UPQ Store 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
mysql_free_result($consulta_usuarios);
?>
