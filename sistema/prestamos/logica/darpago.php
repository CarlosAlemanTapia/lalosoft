<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_prestamo"]) || !isset($_POST["cobrador"]) || !isset($_POST["fecha_pago"]) || !isset($_POST["pago"])|| !isset($_POST["saldo"]) || !isset($_POST["n_pago"]) || !isset($_POST["fecha_proxima"]) || !isset($_POST["fecha_aviso"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../base_de_datos.php";

$id_prestamo = $_POST["id_prestamo"];
$cobrador = $_POST["cobrador"];
$fecha_pago = $_POST["fecha_pago"];
$pago = $_POST["pago"];
$saldo = $_POST["saldo"];
$n_pago = $_POST["n_pago"];
$fecha_proxima = $_POST["fecha_proxima"];
$fecha_aviso = $_POST["fecha_aviso"];

$saldon = $saldo - $pago;
$n_pagon = $n_pago + 1 ;

$ahora3 = date("Y-m-d");
$nuevaproxima = strtotime ( '+7 day' , strtotime ( $fecha_proxima ) ) ;
$nuevaproxima = date ( 'Y-m-j' , $nuevaproxima );

$fecha_aviso = strtotime ( '+6 day' , strtotime ( $fecha_aviso ) ) ;
$fecha_aviso = date ( 'Y-m-j' , $fecha_aviso );


$sentencia = $base_de_datos->prepare("INSERT INTO pagos(id_prestamo, cobrador, fecha_pago, pago) VALUES (?,?, ?,?);");
$resultado = $sentencia->execute([$id_prestamo, $cobrador, $ahora3, $pago]);


$sentencia2 = $base_de_datos->prepare("UPDATE prestamos set saldo = ?, n_pago = ?,fecha_proxima =?, fecha_aviso =? WHERE id_prestamos = ? ;");

$resultado2 = $sentencia2->execute([$saldon, $n_pagon, $nuevaproxima,$fecha_aviso, $id_prestamo]);

if($resultado2 === TRUE){
	header("Location: ../rutacobro.php");
	exit;
}
else echo "Algo salió mal.";


?>