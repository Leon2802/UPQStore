<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
	<title>Carrito de Compras</title>
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
                    <a href="#" class="list-group-item">Tazas</a>
                    <a href="#" class="list-group-item">Plumas</a>
                    <a href="#" class="list-group-item">Camisas</a>
                    <a href="Agendas.html" class="list-group-item">Agendas</a>
                    <a href="#" class="list-group-item">Juegos</a>
                    <a href="#" class="list-group-item">Ropa Deportiva</a>
                    
                    <a href="#" class="list-group-item">Recuerdos</a>
                    <a href="Mochilas.html" class="list-group-item">Mochilas</a>
                    <a href="#" class="list-group-item">Chamarras</a>
                <a href="#" class="list-group-item">Otros</a></div>
          </div>
    
    
    
    
    
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos")or die(mysql_error());
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