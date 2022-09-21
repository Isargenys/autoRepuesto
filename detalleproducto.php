<?php

include('config/connection.php');

$request = $_REQUEST;
$idProducto = $request['idProducto'];

$query = "SELECT *, categoria.categoryName
          FROM producto 
          INNER JOIN categoria 
          ON producto.productCategory = categoria.idCategoria
          WHERE producto.idProducto ='".$idProducto."'";
	
$results = $connection->query($query);
$row = $results->fetch_assoc();
$results->free_result();

echo json_encode($row);
?>