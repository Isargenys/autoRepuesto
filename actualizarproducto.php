<?php
require_once "./config/connection.php";

$request = $_POST;

//$idProducto = $request['idProducto'];
$idProducto = $_GET['idProducto'];


$productName = trim($request['productName']);
$productDescription = trim($request['productDescription']);
$productCode = trim($request['productCode']);
$productCategory = trim($request['productCategory']);
$productPrice = trim($request['productPrice']);
$productStock = trim($request['productStock']);


$query = "UPDATE producto 
          SET productName='".$productName."', 
          productDescription='".$productDescription."', 
          productCode='".$productCode."', 
          productPrice='".$productPrice."',	
          productStock='".$productStock."', 
          productCategory='".$productCategory."' WHERE idProducto = '".$idProducto."'"; 


var_dump($query);

mysqli_query($connection,$query); 

?>