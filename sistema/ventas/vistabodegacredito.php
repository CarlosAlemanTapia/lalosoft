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
                            <strong>??Correcto!</strong> Venta realizada correctamente
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
                            <strong>Error: </strong>El producto est?? agotado
                        </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger">
                            <strong>Error:</strong> Algo sali?? mal mientras se realizaba la venta
                        </div>
                    <?php
                }
            }
        ?>
        <br>

        <form method="post" action="agregarAlCarritoc.php">
            <label for="codigo">C??digo de barras:</label>
            <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el c??digo" required="">
        </form>
        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class=""><b>PRODUCTOS CREDITO</b></div>
                                    <br>
                                    <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Descripci??n</th>
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
                    <td><a class="btn btn-danger" href="<?php echo "quitarDelCarritoc.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    
  
        <h3>Total Real: <?php echo $granTotal; ?></h3>
        <form action="./terminarVentac.php" method="POST">
            
            <input name="total" type="hidden" value="<?php echo $granTotal;?>">
            <p>Nombre Cliente: <input name="nombre_us" id="nombre_us" type="text" ></p>
            <p>Telefono Cliente: <input name="telefono_us" id="telefono_us" type="text" ></p>
            <p>Abono: <input name="abonos" id="abonos" type="number" ></p>
            <input name="modo" id="modo" type="hidden" value="Credito">
            <button type="submit" class="btn btn-success">Terminar venta</button>
            <a href="./cancelarVentac.php" class="btn btn-danger">Cancelar venta</a>
            <a href="./ticketventa_directac.php" class="btn btn-warning">Imprimir ultimo ticket</a>

        </form>
                                </div>
                            </div>
                        </div>

                
    


                        </div>
                        
                    </div>


                         
                            </div>
                        </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                            </div>

                                <?php
                                include_once "../base_de_datos.php";
                                $sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id_venta,ventas.nombre_us, ventas.modo, productos_vendidos.abonos, GROUP_CONCAT( productos.codigo, '..', productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos, id_productos_vendidos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id_venta INNER JOIN productos ON productos.id_productos = productos_vendidos.id_productos where ventas.sucursal_venta = 'Bodega' and ventas.modo = 'Credito' and productos_vendidos.activo = '1'  GROUP BY ventas.id_venta ORDER BY ventas.id_venta desc;");
                                $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>N??mero de venta</th>
                    <th>Cliente</th>
                    <th>Fecha De Venta</th>
                    <th>Productos vendidos</th>
                    <th>Abonos</th>
                    <th>Total $</th>
                    <th>Pagado Completo</th>
                    <th>Abonar</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ventas as $venta){ ?>
                <tr>
                    <td><?php echo $venta->id_venta ?></td>
                    <td><?php echo $venta->nombre_us ?></td>
                    <td><?php echo $venta->fecha ?></td>
                    <td>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>C??digo</th>
                                    <th>Descripci??n</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                                $producto = explode("..", $productosConcatenados)
                                ?>
                                <tr>
                                    <td><?php echo $producto[0] ?></td>
                                    <td><?php echo $producto[1] ?></td>
                                    <td><?php echo $producto[2] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                    <td><?php echo $venta->abonos ?></td>
                    <td><?php echo $venta->total ?> $</td>
                    
                    <td><a class="btn btn-warning" href="<?php echo "eliminarVenta.php?id_venta=" . $venta->id_venta?>"><i class="fa fa-trash-o"></i></a></td>

                    <td><a class="btn btn-info" href="<?php echo "ticketventa.php?id_productos_vendidos=" . $venta->id_productos_vendidos?>"><i class="fa fa-ticket"></i></a></td>

                    <td><a class="btn btn-success" href="<?php echo "nota.php?id_productos_vendidos=" . $venta->id_productos_vendidos?>"><i class="fa fa-ticket"></i></a></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
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
