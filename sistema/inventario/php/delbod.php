<?php

if(!isset($_GET["id_productos"])) exit();
$id_productos = $_GET["id_productos"];

include_once "../../base_de_datos.php";

$sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE id_productos = ?;");
$resultado = $sentencia->execute([$id_productos]);
if($resultado === TRUE){
	header("Location: ../vistainventariobodega.php");
	exit;
}
else echo "Algo salió mal";
?>