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
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>INICIO </a>
                    </li>
                    <li class="menu-title">PRESTAMOS</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>PRESTAMOS</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">CREAR NUEVO</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">RUTA DE COBRO</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">DEUDAS LISTA</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">HISTORIAL</a></li>
                        </ul>
                    </li>
                

                    <li class="menu-title">INVENTARIOS</li><!-- /.menu-title -->

                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>PRODUCTOS</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">BODEGA</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">LOCAL</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">SOBRE RUEDAS</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">GLOBAL</a></li>
                     
                        </ul>
                    </li>


                    <li class="menu-title">REALIZAR VENTAS</li><!-- /.menu-title -->

                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>NUEVA VENTA</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">CONTADO</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">CREDITO</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">APARTADO</a></li>
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
                    <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
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
                                <br>
                                <br>

                                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Nuevo</button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <form method="post" action="php/addproductos.php">
                                                    
                                                    <p style="margin-left: 5px;">Datos Del Producto</p>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6" style="margin-left:10px;">
                                                            <div class="form-group">
                                                                <label>Codigo Barra:</label>
                                                                <input id="codigo" name="codigo" type="text" class="form-control" required="Ingresa el codigo de barra">
                                                            </div>
                                                        </div>

                                                        <div class="col-6" style="margin-left:-20px;">
                                                            <div class="form-group">
                                                                <label>Descripcion Del Producto:</label>
                                                                <input id="descripcion" name="descripcion" type="text" class="form-control" required="Ingresa la descripcion" >
                                                            </div>
                                                        </div>

                                                    </div>
                                                   


                                                    <div class="row">
                                                        <div class="col-6" style="margin-left:10px;">
                                                            <div class="form-group form-group-default">
                                                                <label>Tipo Producto:</label>
                                                                <select name="tipo_pro" id="tipo_pro" class="form-control">
                                                                    <option value="Samsung">Licuadora</option>
                                                                    <option value="Otro">Labadora</option>
                                                                    <option value="Lg">Refrigerador</option>
                                                                    <option value="Motorola">Estufas</option>
                                                                    <option value="Huawei">Mini Split</option>
                                                                    <option value="Iphone">Secadoras</option>
                                                                    <option value="Alcatel">Alcatel</option>
                                                                    <option value="Sony">Sony</option>
                                                                    <option value="Lenovo">Lenovo</option>
                                                                    <option value="Htc">Htc</option>
                                                                    <option value="Zte">Zte</option>
                                                                    <option value="Lanix">Lanix</option>
                                                                    <option value="Nokia">Nokia</option>
                                                                    <option value="OnePlus">One Plus</option>
                                                                    <option value="Xiaomi">Xiaomi</option>
                                                                    <option value="Vivo">Vivo</option>
                                                                    <option value="Blue">Blue</option>
                                                                    <option value="Verycool">Verycool</option>
                                                                    <option value="Google">Google</option>
                                                                    <option value="Oppo">Oppo</option>
                                                                    <option value="Blackvery">Blackvery</option>
                                                                    <option value="Asus">Asus</option>
                                                                    <option value="M4">M4</option>
                                                                    <option value="Polaroid">Polaroid</option>
                                                                    <option value="Zumm">Zumm</option>
                                                                    <option value="Hisense">Hisense</option>
                                                                    <option value="HP">HP</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6" style="margin-left:-20px;">
                                                             <div class="form-group form-group-default">
                                                                <label>Precio Venta:</label>
                                                                <input id="precioVenta" name="precioVenta" type="number" class="form-control" required="Ingresa el precio venta">
                                                            </div>
                                                        </div>

                                                    </div>
                                

                                                    <div class="form-group form-group-default" style="margin-left:10px; margin-right: 10px;">
                                                        <label>Existencia Inicial:</label>
                                                        <input id="existencia" name="existencia" type="number" class="form-control" required="Ingresa la cantidad">
                                                    </div>

                                                
                                                    <input type="hidden" id="sucursal_pro" name="sucursal_pro" value="Bodega">

                                                     <div class="row">
                                                        <div class="col-8" style="margin-left:15%;">
                                                            <div class="form-group">
                                                               <input class="form-control btn-info" type="submit" value="Guardar">
                                                            </div>
                                                        </div>


                                                    </div>
                                                   
                                                 
                                                  
                                                </form>
                                    </div>
                                  </div>
                                </div>

                            </div>

                            <?php
								include_once "../base_de_datos.php";
								$sentencia = $base_de_datos->query("SELECT * FROM productos where sucursal_pro = 'Bodega' ;");
								$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
							?>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Codigo Barra</th>
                                            <th>Descripción</th>
                                            
                                            <th>Tipo De Producto</th>
                                            <th>Existencia</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($productos as $producto){ ?>
                                        <tr>
                                            <td><?php echo $producto->codigo ?></td>
                                            <td><?php echo $producto->descripcion ?></td>
                                            <td><?php echo $producto->tipo_pro ?></td>
                                            <td><?php echo $producto->existencia ?></td>
                                               <td><center><a class="btn btn-warning" href="<?php echo "php/modbod.php?id_productos=" . $producto->id_productos?>"><i class="fa fa-edit"></i></a></center></td>
                                            <td><center><a class="btn btn-danger" href="<?php echo "php/delbod.php?id_productos=" . $producto->id_productos?>"><i class="fa fa-trash-o"></i></a></center></td>
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
