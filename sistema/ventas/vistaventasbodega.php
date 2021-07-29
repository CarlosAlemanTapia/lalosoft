<?php   

  include '../database.php';

  session_start();

  if(isset($_SESSION['user'])){

  $quien = $_SESSION['user'];

    $records = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :id');
    $records->bindParam(':id', $quien);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BAZAR GEMANA</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->


</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../vistaprincipal.php"><i class="menu-icon fa fa-laptop"></i>INICIO </a>
                    </li>
                    <li class="menu-title">PRESTAMOS</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>PRESTAMOS</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-id-badge"></i><a href="../prestamos/vistaprestamos.php">CREAR NUEVO</a></li>
                            <li><i class="fa fa-bars"></i><a href="../prestamos/rutacobro.php">RUTA DE COBRO</a></li>
                            <li><i class="fa fa-bars"></i><a href="../prestamos/listaprestamos.php">DEUDAS LISTA</a></li>
                            <li><i class="fa fa-bars"></i><a href="../prestamos/historial.php">HISTORIAL</a></li>
                        </ul>
                    </li>
                

                    <li class="menu-title">INVENTARIOS</li><!-- /.menu-title -->

                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>PRODUCTOS</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-id-badge"></i><a href="../inventario/vistainventariobodega.php">BODEGA</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">GLOBAL</a></li>
                     
                        </ul>
                    </li>


                    <li class="menu-title">REALIZAR VENTAS</li><!-- /.menu-title -->

                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>NUEVA VENTA</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-id-badge"></i><a href="./vistaventasbodega.php"> CONTADO</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html"> CREDITO</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html"> APARTADO</a></li>
                            <li><i class="fa fa-bars"></i><a href="./hostorial.php"> HISTORIAL</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../vistaprincipal.php"><img src="../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="../vistaprincipal.php"><img src="../images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../php/salir.php"><i class="fa fa-sign-out"></i>Logout</a>

                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">PRODUCTOS EN BODEGA</strong>
                                
                            </div>

                                    <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-6">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title"><b>Introduce El Codigo De Barras</b></div>

                                    <br>
                                    <?php 
    


    if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
    $granTotal = 0;
    ?>
    <div class="">
        <?php
            if(isset($_GET["status"])){
                if($_GET["status"] === "1"){
                    ?>
                        <div class="alert alert-success">
                            <strong>¡Correcto!</strong> Venta realizada correctamente
                        </div>
                    <?php
                }else if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>Venta cancelada</strong>
                        </div>
                    <?php
                }else if($_GET["status"] === "3"){
                    ?>
                    <div class="alert alert-info">
                            <strong>Ok</strong> Producto quitado de la lista
                        </div>
                    <?php
                }else if($_GET["status"] === "4"){
                    ?>
                    <div class="alert alert-warning">
                            <strong>Error:</strong> El producto que buscas no existe
                        </div>
                    <?php
                }else if($_GET["status"] === "5"){
                    ?>
                    <div class="alert alert-danger">
                            <strong>Error: </strong>El producto está agotado
                        </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger">
                            <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                        </div>
                    <?php
                }
            }
        ?>
        <br>

        <form method="post" action="agregarAlCarrito.php">
            <label for="codigo">Código de barras:</label>
            <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código" required="">
        </form>
        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class=""><b>PRODUCTOS</b></div>
                                    <br>
                                    <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Quitar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION["carrito"] as $indice => $producto){ 
                        $granTotal += $producto->total;
                    ?>
                <tr>
                    <!-- <td><?php echo $producto->id_producto ?></td> -->
                    <td><?php echo $producto->descripcion ?></td>
                    <td><?php echo $producto->precioVenta ?></td>
                    <td><?php echo $producto->cantidad ?></td>
                    <td><?php echo $producto->total ?></td>
                    <td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    
  
        <h3>Total Real: <?php echo $granTotal; ?></h3>
        <form action="./terminarVenta.php" method="POST">
            <p>Precio Con Rebaja
            <input name="total" type="number" value="<?php echo $granTotal;?>"></p>
            <button type="submit" class="btn btn-success">Terminar venta</button>
            <a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
            <a href="./ticketventa_directa.php" class="btn btn-warning">Imprimir ultimo ticket</a>

        </form>
                                </div>
                            </div>
                        </div>

                
    


                        </div>
                        
                    </div>


                         
                            </div>
                        </div>
                    




                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
<?php
} else {
  header("location: ../../index.php");
  }
 ?>
