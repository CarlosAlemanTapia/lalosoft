<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["descripcion"]) || 
	!isset($_POST["tipo_pro"]) || 
	!isset($_POST["precioVenta"]) || 
	!isset($_POST["existencia"]) || 
	!isset($_POST["id_productos"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../base_de_datos.php";

$id_productos = $_POST["id_productos"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$tipo_pro = $_POST["tipo_pro"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];



$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, tipo_pro = ? ,precioVenta = ?, existencia = ? WHERE id_productos = ?;");

$resultado = $sentencia->execute([$codigo, $descripcion, $tipo_pro, $precioVenta, $existencia, $id_productos]);

if($resultado === TRUE){
	header("Location: ../vistainventariobodega.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>