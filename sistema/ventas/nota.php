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



<style type="text/css">
#capa1{margin-top:0px;margin-left:50px;width:712px;height:850px;float:left;background-color:white;color:black;clear:both;border: 5px groove #006600;}

p{
	font-family: 'Roboto', sans-serif;

}


#d1{
float:left;
background:black;
background-color: white;
width: 450px;
height: 80px;
margin-right: 10px;
margin-top: 10px;
margin-left: 10px;
}
#d1-1{
float:left;
background:black;
background-color: white;
width: 200px;
height: 95px;
margin-right: 10px;
margin-top: 10px;
margin-left: 10px;
color: black;

}
#d1-2{
float:left;
background:black;
font-color:black;
background-color: white;
width: 200px;
height: 55px;
margin-right: 10px;
margin-top: 0px;
margin-left: 0px;

}


#d2{
float:left;
background:#CC6600;
background-color: white;
width: 410px;
height: 40px;
margin-right: 10px;
margin-top: 5px;
margin-left: 10px;
color: black;
border: 2px solid #aaaaaa;
}
#d3{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 85px;
margin-right: 10px;
margin-top: -85px;
margin-left: 510px;
color: black;
border: 5px dotted #aaaaaa;
}
#d4{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 90px;
margin-right: 10px;
margin-top: 5px;
margin-left: 510px;
color: black;
/*border: 5px double #aaaaaa;*/
}
#d5{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 145px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
	
}
#d5-1{
float:left;
background:#CC6600;
background-color: white;
width: 350px;
height: 170px;
margin-right: 0px;
margin-top: -55px;
margin-left: 0px;
color: black;
/*border: 2px solid #aaaaaa;*/
}
	
#d5-3{
float:left;
background:#CC6600;
background-color: white ;
width: 330px;
height: 150px;
margin-right: 0px;
margin-top: -35px;
margin-left: px;
color: black;
/*border: 2px solid #aaaaaa;*/

}

#d66{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 40px;
margin-right: 10px;
margin-top: -40px;
margin-left: 10px;
color: black;
border: 2px solid black;
}

#d6{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 78px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d7{
float:left;
background:#CC6600;
background-color: white;
width: 340px;
height: 80px;
margin-right: 0px;
margin-top: -4px;
margin-left: 0px;
border: 2px solid black;

}
#d8{
float:left;
background:#CC6600;
background-color: white;
width: 336px;
height: 80px;
margin-right: 0px;
margin-top: -4px;
margin-left: 0px;
border: 2px solid black;

}

#d99{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 40px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
border: 2px solid black;
}

#d99-2{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 40px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d99-3{
float:left;
background:#CC6600;
background-color: white;
width: 330px;
height: 55px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
border: 5px solid #aaaaaa;
}
#d9{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 200px;
margin-right: 10px;
margin-top: -5px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d10{
float:left;
background:#CC6600;
background-color: white;
width: 100%;
height: 100%;
margin-right: 0px;
margin-top: -2px;
margin-left: 0px;
border: 2px solid black;
}
#d11{
float:left;
background:#CC6600;
background-color: white;
width: 330px;
height: 85px;
margin-right: 0px;
margin-top: -2px;
margin-left: 0px;
border: 2px solid black;
}
#d12{
float:left;
background:#CC6600;
background-color: white;
width: 677px;
height: 85px;
margin-right: 0px;
margin-top: 0px;
margin-left: 0px;
border: 2px solid black;
}


#d133{
float:left;
background:#CC6600;
background-color: white;
width: 350px;
height: 40px;
margin-right: 5px;
margin-top: 10px;
margin-left: 10px;
color: black;
float: left;
}


#d13{
float:left;
background:#CC6600;
background-color: white;
width: 200px;
height: 330px;
margin-right: 10px;
margin-top: -40px;
margin-left: 10px;
color: black;
float: left;
}


#d13-d{
float:left;
background:#CC6600;
background-color: white;
width: 120px;
height: 320px;
margin-right: 10px;
margin-top: 10px;
margin-left: 0px;
color: black;
float: left;
}

#d14{
float:left;
background:#CC6600;
background-color: white;
width: 450px;
height: 320px;
margin-right: 10px;
margin-top: 10px;
margin-left: 10px;
color: black;

}
#d15{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}

#d16{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}
#d17{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}
#d18{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}

#d19{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 100px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
float: left;
border: 1px solid #aaaaaa;
}
#d20{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 30px;
margin-right: 10px;
margin-top: 5px;
margin-left: 10px;
color: black;

}

#d21{
float:left;
background:#CC6600;
background-color: white;
width: 150px;
height: 40px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
}

#d22{
float:left;
background:#CC6600;
background-color: white;
width: 150px;
height: 50px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
float: left;
}
#d23{
float:left;
background:#CC6600;
background-color: white;
width: 150px;
height: 50px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;

}

.txt {
   width: 460px;
   height: 85px;
 }

 #dfin{
float:left;
background:#CC6600;
background-color: white;
width: 600px;
height: 30px;
margin-right: 10px;
margin-top: -5px;
margin-left: 50px;
color: black;
float: left;
}

#d9-2{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 85px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d10-2{
float:left;
background:#CC6600;
background-color: white;
width: 338px;
height: 85px;
margin-right: 0px;
margin-top: -3px;
margin-left: 0px;
border: 2px solid black;
}
#d11-2{
float:left;
background:#CC6600;
background-color: white;
width: 338px;
height: 85px;
margin-right: 0px;
margin-top: -3px;
margin-left: 0px;
border: 2px solid black;
}
#d12-2{
float:left;
background:#CC6600;
background-color: white;
width: 678px;
height: 85px;
margin-right: 0px;
margin-top: 0px;
margin-left: 0px;
border: 2px solid black;
}

</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<?php
			    $varconid = $lista->id_venta;

        $sentencia = $base_de_datos->query("SELECT productos_vendidos.id_productos_vendidos, ventas.total, ventas.fecha, ventas.id_venta,ventas.nombre_us,ventas.telefono_us, ventas.modo, GROUP_CONCAT( productos.codigo, '..', productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id_venta INNER JOIN productos ON productos.id_productos = productos_vendidos.id_productos where ventas.id_venta = $varconid GROUP BY ventas.id_venta ORDER BY ventas.id_venta;");

        $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

				?>

<?php foreach($ventas as $venta){ ?>


<div id="globald">

<div id="general">

<div id="capa1">



	<div id="d1"><img src="images/andromeda_logo_.png" width="100%" height="100"></div>


		<div id="d3" align="center"><h3 style="margin-top: 10px;"><p><b>N. Venta: </b> <br># <?php echo $venta->id_productos_vendidos ?></br></p></h3></div>

		<div id="d4" align="center"><h4><p><b>Fecha De Venta: </b><p> <?php echo $venta->fecha ?></p></h4></div>


	<div id="d5">

		<div id="d5-1">
			

     
     <p><h2 align="center"><b>CONTACTOS</b></h2></p>
      <h4 align="center"><b>
    <p align="center">Local: 664 121-13-68</p>
		<p align="center">Mas Informacion: 664 481-99-46</p></h4>
      </b></h4>
    


		</div>

		<div id="d5-3" align="center"><label><p align="center">Bazar Gemana	 <br> 
			Garantia en equipos 30 dias, Sin nota no hay reclamos <br> </p> </label></div>

	</div>

	<div id="d66" align="center"><H3 style="margin-top: 5px;"><p><b>Datos Del Cliente</b></p></H3></div>

	<div id="d6" align="center">
		
		<div id="d7"><H3 style="margin-top: 10px;"><p><b>Nombre del cliente:<p></b><?php echo $venta->nombre_us ?></p></H3></div>

		<div id="d8" ><b><H3 style="margin-top: 10px;"><p><b> Telefono:<p></b><?php echo $venta->telefono_us ?></p></H3></b></div>

	</div>

	<div id="d99" align="center"><H3 style="margin-top: 5px;"><p><b>Datos Del Equipo</b></p></H3></div>

	<div id="d9">

		<div id="d10" align="center">  <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                                $producto = explode("..", $productosConcatenados)
                                ?>
                                <tr>
                                    
                                    <td><?php echo $producto[1] ?></td>
                                    <td><?php echo $producto[2] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table></div>

		
   

		
		</div>

<div id="d99-2" align="center"><H3 style="margin-top: 10px;"><p><b>Datos De Pago</b></p></H3></div>
  
  <div id="d9-2">

    <div id="d10-2" align="center"> <H3 style="margin-top: 10px;"><p><b>Modo:<p></b><?php echo $venta->modo ?></p></H3></div>

    <div id="d11-2" align="center"><H3 style="margin-top: 10px;"><p><b>Total:<p></b><?php echo $venta->total ?></p></H3></div>

    <!-- <div id="d12-2"> <h3 style="margin-top: 10px;"> <p><b>Trabajo:<p></b><?php echo $venta->trabajo ?></p></h3></div> 
 -->
  </div>

</div>



</div>

	<?php } ?>

<div >
  <button  class="btn btn-info" style="color: black; width: 250px; margin-top:25px; margin-left: 25px;"><a href="https://api.whatsapp.com/send?phone=52<?php echo $venta->telefono_us ?>" target="_blank">Envio nuevo</a></button>
</div>	
<?php
} else {
  header("location: ../../index.php");
  }
 ?>
