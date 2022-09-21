<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include_once "./Config/connection.php";






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Categorias</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="./assets/css/caja.css">

    <link rel="stylesheet" href="./assets/css/jquery.dataTables.min.css">
    
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center fw-bold mb-3 mt-3">
                Caja
            </h1>
            <hr>
            <h4 class="ms-3 mb-5 nuevaVenta fw-normal">Nueva venta</h4>
            <form id="sellForm">
            <div class="container  shadow-sm">
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="fechaVenta" class="form-label">Fecha de venta</label>
                            <input type="text" class="form-control" id="fechaVenta" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="cliente" class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="cliente">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="buscarProducto" class="form-label">Buscar producto</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar producto" autocomplete="off" id="inputBuscarProducto">
                            <button class="btn btn-outline-secondary border-0 btn-buscar" type="button" id="buscarProducto">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div id="search_result" class="suggestions"></div>
                    </div>
                    <div class="col-3">
                        <label for="precio" class="form-label">Precio</label>
                        <div class="mb-3 input-group">
                            <input type="text" class="form-control" id="precio" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cant.</label>
                            <input type="number" class="form-control" id="cantidad">
                        </div>
                    </div>
                    <div class="col-2">
                         <div class="mb-3">
                            <button type="button" id="btnAgregar" name="agregar_medicina" class=" btn-agregar border-0 p-2 rounded-3">
                                Agregar <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="Vendedor" class="form-label">Vendedor</label>
                            <input type="text" class="form-control" id="vendedor" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex mt-4 pb-4">
                    <button type="button" class=" btn-facturar border-0 p-2 rounded-3 mx-4">
                        Facturar
                    </button>
                    <button type="button" id="btnClearList" class=" btn-borrar border-0 p-2 rounded-3 ">
                        Borrar factura
                    </button>
                </div>
            </div>
</form>
            <div class="table-responsive">
                <table class="table" id="caja_table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio total</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM Cart";
                        $result = $connection->query($query);

                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch()) {
                        ?>
                        
                        <tr>
                            <td><?php echo $row['productName']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><?php echo $row['productPrice']?></td>
                            <td><?php echo $row['totalPrice']?></td>
                            <td class="eliminarProducto">
                                <i class="bi bi-x-circle"></i>
                            </td>
                        </tr>
                        
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>   



<?php include ("footerLinks.php"); ?>
<script src="./assets/js/caja.js"></script>
<!-- <script src="./assets/js/jquery.dataTables.min.js"></script> -->
</body>
</html>