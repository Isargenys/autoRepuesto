<?php
include "config/connection.php";

if(!isset($_SESSION['username']) && !empty($_SESSION['username'])){    
    header('Location: login.php');
}

if(isset($_POST['btn_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Categorias</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="./assets/css/puntoVenta.css">

    
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center fw-bold mb-3 mt-3">
               Ventas
            </h1>
           <a href="caja.php">
           <button type="button" class="btn btnAgregar text-white mb-3 " data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Nueva factura
                <i class="bi bi-plus-lg"></i>
            </button>
           </a>
           <div class="row m-auto mt-5 ms-5">
            <div class="col-3">
            <label for="formGroupExampleInput" class="form-label label-buscar mt-1">
                Nombre de cliente o # de factura
             </label>
            </div>
            <div class="col-8">
            <div class="input-group ">
            <input type="text" class="form-control" placeholder="Nombre de cliente o # de factura" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn  btn-buscarFactura" type="button" id="button-addon2">Buscar factura</button>
            </div>
            </div>
           </div>

            <hr>
            <div class="row  p-3 categorias">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>12/2/2022</td>
                    <td>Manuel Jimenez</td>
                    <td>Rosa Perez</td>
                    <td class="estadoF fw-bold">
                        <p>Pagada</p>
                    </td>
                    <td>520.20</td>
                    <td>
                    <button onclick="editProduct()" class="btn-editar mx-2 border-0">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button onclick="detailProduct()" class="btn-detalles mx-2 border-0">
                    <i class="bi bi-arrow-down-circle"></i>
                    </button>
                   
                    <button class="btn-delete border-0">
                        <i class="bi bi-trash3"></i>
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>13/5/2022</td>
                    <td>Ricardo Garcia</td>
                    <td>Fanny Gonzalez</td>
                    <td class="estadoF fw-bold">
                        <p>Pagada</p>
                    </td>
                    <td>632.50</td>
                    <td>
                    <button onclick="editProduct()" class="btn-editar mx-2 border-0">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button onclick="detailProduct()" class="btn-detalles mx-2 border-0">
                    <i class="bi bi-arrow-down-circle"></i>
                    </button>
                   
                    <button class="btn-delete border-0">
                        <i class="bi bi-trash3"></i>
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>12/2/2022</td>
                    <td>Manuel Jimenez</td>
                    <td>Rosa Perez</td>
                    <td class="estadoF fw-bold">
                        <p>Pagada</p>
                    </td>
                    <td>520.20</td>
                    <td>
                    <button onclick="editProduct()" class="btn-editar mx-2 border-0">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button onclick="detailProduct()" class="btn-detalles mx-2 border-0">
                    <i class="bi bi-arrow-down-circle"></i>
                    </button>
                   
                    <button class="btn-delete border-0">
                        <i class="bi bi-trash3"></i>
                    </button>
                    </td>
                    </tr>
                </tbody>
                </table>
                    
      
            </div>
        </div>
    </div>
</div>   




<?php include ("footerLinks.php"); ?>

</body>
</html>