<?php
require_once "./config/connection.php";

$productName = trim($_POST['productName']);
$productDescription = trim($_POST['productDescription']);
$productCode = trim($_POST['productCode']);
$productCategory = trim($_POST['productCategory']);
$productPrice = trim($_POST['productPrice']);
$productStock = trim($_POST['productStock']);

$query = "INSERT INTO producto (productName, productDescription, productCode, productPrice,	productStock, productCategory) 
VALUES('$productName', '$productDescription', '$productCode', '$productPrice',	'$productStock', '$productCategory')";

if ($connection->query($query)) {
  echo json_encode(array("statusCode" => 200));
} else {
  echo "Oops! Something went wrong. Please try again later.";
}

?>