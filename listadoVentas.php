<?php
include("config/connection.php");

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
    <title>Pharmacy System - Productos</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="./assets/css/listadoProductos.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center mt-3">Lista de ventas</h1>
            <hr>
            <div class="row ms-5 mt-5">
                <div class="col-2">
                <input type="text" class="form-control"  placeholder="Buscar por codigo">
                </div>
                <div class="col-2">
                <input type="date" class="form-control"  placeholder="Buscar por fecha">
                </div>
                <div class="col-2">
                <input type="text" class="form-control"  placeholder="Buscar por cliente">
                </div>
                <div class="col-3">
                <select class="form-select text-black-50" aria-label="Default select example">
                <option selected>Buscar por empleados</option>
                <option value="1">Juan Fernandez</option>
                <option value="2">Miguelina Santana</option>
                <option value="3">Rosa Gonzalez</option>
                </select>
                </div>
                <div class="col-3">
                <button type="button" class="p-2 rounded-3 border-0 btn-descargaReporte">
                    Descargar reporte <i class="bi bi-arrow-down-circle mx-2"></i>
                </button>
                </div>
            </div>
            <div class="container p-3 mt-3">
            <table class="table table-hover table-stripped">
            <thead>
                <tr>
                 <th scope="col">Codigo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Producto</th>
                <th scope="col">Cliente</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                <th scope="row">112</th>
                <td>12/3/2021</td>
                <td>Dramidom</td>
                <td>Medicamentos</td>
                <td>Juan Fernandez</td>
                <td>200</td>
                <td>120.00</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>12/3/2021</td>
                <td>Fendramin</td>
                <td>Medicamentos</td>
                <td>Miguelina Santana</td>
                <td>200</td>
                <td>120.00</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>12/3/2021</td>
                <td>Omeprazol 40 mg</td>
                <td>Medicamentos</td>
                <td>Rosa Gonzalez</td>
                <td>200</td>
                <td>120.00</td>
                </tr>
            </tbody>
            </table>
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item  btn-siguiente">
                <a class="page-link fw-bold" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <li class="page-item btn-siguiente"><a class="page-link" href="#">1</a></li>
                <li class="page-item btn-siguiente"><a class="page-link" href="#">2</a></li>
                <li class="page-item btn-siguiente"><a class="page-link" href="#">3</a></li>
                <li class="page-item btn-siguiente">
                <a class="page-link fw-bold" href="#">Siguiente</a>
                </li>
            </ul>
            </nav>
            </div>
          
           
        
        </div>
    </div>
</div>   



<?php include ("footerLinks.php"); ?>


</body>
</html>