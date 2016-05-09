<?php include 'templates/header.php';?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Inicio</a>
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
     
        <div class="container">
        <div class="row">
            <div class="col-md-3">
            <div class="col-md-9">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                <img src="imagenes/01.png" width="800" height="300"> </div>
                                <div class="item">
                                <img src="imagenes/01.png" width="800" height="300"> </div>
                                <div class="item">
                                <img width="497" height="342" src="imagenes/01.png" /></div>
                            </div>
                      </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>


               </div>
              </div>
              </div>
              </div>
              </div>
          </div>
  
        
    <!-- /.container -->

    <div class="container">
   <hr>
</div>
    
<?php include 'templates/footer.php'; ?>