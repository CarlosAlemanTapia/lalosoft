<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["cliente_nombre"]) || !isset($_POST["fecha_prestamo"]) || !isset($_POST["monto"]) || !isset($_POST["interes"]) || !isset($_POST["plazo"]) || !isset($_POST["responsable"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../base_de_datos.php";


$cliente_nombre = $_POST["cliente_nombre"];
$fecha_prestamo = $_POST["fecha_prestamo"];
$monto = $_POST["monto"];
$interes = $_POST["interes"];
$plazo = $_POST["plazo"];
$responsable = $_POST["responsable"];

$totalpagar = $monto/$interes;
$suma = $monto + $totalpagar;

$pagossemal = $suma/$plazo;

date_default_timezone_set("America/Tijuana");
$ahora3 = date("Y-m-d");
$ahora = date("d-m-Y");
$ahora1 = date("d-m-Y");

$nuevaproxima = strtotime ( '+7 day' , strtotime ( $ahora ) ) ;
$nuevaproxima = date ( 'Y-m-j' , $nuevaproxima );

$fecha_aviso = strtotime ( '+6 day' , strtotime ( $ahora1 ) ) ;
$fecha_aviso = date ( 'Y-m-j' , $fecha_aviso );


$sentencia = $base_de_datos->prepare("INSERT INTO prestamos(cliente_nombre, fecha_prestamo, monto, interes, plazo,total_pagar, fecha_proxima, fecha_aviso,saldo,responsable ,pagos) VALUES (?,?, ?, ?, ?, ?,?,?,?,?,?);");
$resultado = $sentencia->execute([$cliente_nombre, $ahora3, $monto, $interes, $plazo, $suma,$nuevaproxima,$fecha_aviso,$suma,$responsable,$pagossemal]);

if($resultado === TRUE){
	header("Location: ../vistaprestamos.php");
	exit;
}
else echo "Algo salió mal.";


?>