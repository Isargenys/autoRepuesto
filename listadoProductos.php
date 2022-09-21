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
            <h1 class="text-center mt-3">Lista de productos</h1>
            <hr>
            <div class="row ms-5 mt-5">
                <div class="col-3">
                <input type="text" class="form-control"  placeholder="Buscar por codigo">
                </div>
                <div class="col-3">
                <input type="text" class="form-control"  placeholder="Buscar por nombre">
                </div>
                <div class="col-3">
                <select class="form-select text-black-50" aria-label="Default select example">
                <option selected>Buscar por categorias</option>
                <option value="1">Medicamentos</option>
                <option value="2">Cuidado de la piel</option>
                <option value="3">Cuidado personal</option>
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
                <th scope="col">Producto</th>
                <th scope="col">Categoria</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                <th scope="row">112</th>
                <td>Dramidom</td>
                <td>Medicamentos</td>
                <td>200</td>
                <td>120.00</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Fendramin</td>
                <td>Medicamentos</td>
                <td>200</td>
                <td>120.00</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Omeprazol 40 mg</td>
                <td>Medicamentos</td>
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