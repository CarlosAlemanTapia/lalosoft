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
<?php

if(!isset($_GET["id_productos_vendidos"])) exit();

$id = $_GET["id_productos_vendidos"];

include_once "../base_de_datos.php";

$sentencia = $base_de_datos->prepare("SELECT * FROM productos_vendidos WHERE id_productos_vendidos = ?;");
$sentencia->execute([$id]);

$lista = $sentencia->fetch(PDO::FETCH_OBJ);
if($lista === FALSE){

    echo "¡No existe venta con ese ID!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../../../assets/css/demo.css">

        <style type="text/css">
        * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;

}

td.producto,
th.producto {
    width: 120px;
    max-width: 120px;
    
    font-size: 15px;
}

td.cantidad,
th.cantidad {
    width: 80px;
    max-width: 80px;
    word-break: break-all;
   
    font-size: 14px;
}

td.precio,
th.precio {
    width: 60px;
    max-width: 60px;
    word-break: break-all;
    
    font-size: 14px;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 270px;
    max-width: 270px;
   
}

img {
    max-width: inherit;
    width: inherit;

}
}
    </style>
</head>
<body>

    <?php

        $varconid = $lista->id_venta;

        $sentencia = $base_de_datos->query("SELECT productos_vendidos.id_productos_vendidos, ventas.total, ventas.fecha, ventas.id_venta, GROUP_CONCAT( productos.codigo, '..', productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id_venta INNER JOIN productos ON productos.id_productos = productos_vendidos.id_productos where ventas.id_venta = $varconid GROUP BY ventas.id_venta ORDER BY ventas.id_venta;");

        $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    ?>
                <?php foreach($ventas as $venta){ ?>

                
                 <div class="ticket" align="center">
            <img
                src="../../../assets/img/andromeda_logo_.png"
                alt="Logotipo">
                <br>
                <br>
                <p style="margin-left: 50px;"><h2>Andromeda Reparacion</h2></p>
                <p style="margin-left: 5px;" class="centrado"><h2>Boulevard El Refugio Oeste 21320, El Florido 1, A y 2a. Sección, 22244 Tijuana, B.C.</h2></p>
                <p style="margin-left: 5px;" class="centrado"><h2>Numero: 664 399 9594</h2></p>
                <p style="margin-left: 5px;"><h2>Fecha: <?php echo $venta->fecha ?></h2></p>
                <br>
            <table>
                <thead>
                    <tr>
                        
                        <th class="producto"><h2>PROD</h2></th>
                        <th class="cantidad"><h2>CANT</h2></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                                $producto = explode("..", $productosConcatenados)
                                ?>
                                <tr>
                                    
                                    <td><h2><?php echo $producto[1] ?></h2></td>
                                    <td><h2><?php echo $producto[2] ?></h2></td>
                                </tr>
                                <?php } ?>
                    </tr>
                    <tr>
                        
                        <td class="precio"><h2>TOTAL</h2></td>
                        <td class="precio"><h2> $ <?php echo $venta->total ?></h2></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <p class="centrado"><h1>¡GRACIAS POR SU COMPRA!</h1></p>
            <p class="centrado"><h2>Andromedafix.mx</h2></p>
        </div>

    <?php } ?>  

    <div style="width: 150px; height: 50px; margin-left: 400px; margin-top: -350px;">
        <button class="btn btn-info" onclick="imprimir()">Imprimir</button>
        <br>
        <br>
        <a class="btn btn-danger" href="./hostorial.php">Regresar  <i class="fa fa-chevron-left"></i></a>
    </div>


</body>
</html>

<script type="text/javascript">
    
    function imprimir() {
      window.print();
    }
</script>
<?php
} else {
  header("location:../index.php");
  }
 ?>
