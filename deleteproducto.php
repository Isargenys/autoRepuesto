<?php
    require_once "./config/connection.php";

	$request = $_REQUEST;
	$id = $request['idProducto'];

	$sql = "DELETE FROM producto WHERE idProducto='".$id."'";
    
    if ($connection->query($sql)) {
	  echo "Employee has been successfully deleted.";
	} else {
	  echo "Error: " . $sql . "<br>" . $connection->error;
	}
?>