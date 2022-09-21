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
    <title>Pharmacy System - Productos</title>
    <?php include ("headerLinks.php"); ?>
    <link rel="stylesheet" href="./assets/css/productos.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include('sidenav.php') ?>
    <div id="page-content-wrapper">
        <?php include ("navbar.php"); ?>
        <div class="container-fluid">
            <h1 class="text-center mt-3">Productos</h1>
            <p>
            <button class="btn btnAgregar text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Agregar producto
                <i class="bi bi-plus-lg"></i>
            </button>
            </p>
            <div class="collapse" id="collapseExample">
            <div class="card card-body mb-3">
            <form id="formProductos">
            <div class="row mb-3">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="productCode" class="control-label">
                            Código 
                        </label>
                        <input type="number" name="productCode" class="form-control" id="productCode">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label for="productName" class="control-label">
                            Nombre del producto
                        </label>
                        <input type="text" name="productName" class="form-control" id="productName">
                    </div>
                </div>
                
            </div>
            
            <!-- <div class="row mt-3 mb-3">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Imagen del Producto</label>
                        <input type="file" name="" id="fileInput" class="form-control" onchange="imagePreview(event)">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="" alt="" id="preview" class="imagePrev">
                </div>
            </div> -->

            <div class="row mb-3">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="productCategory" class="control-label">Seleccione categoria</label>

                        <select class="form-select" name="productCategory" id="productCategory">
                            <option value="">--Seleccione categoria--</option>
                            <?php
                                $query = "SELECT * FROM categoria";

                                $statement = $connection->query($query);

                                if ($statement->rowCount() > 0) {
                                    while($row = $statement->fetch()) {
                            ?>
                            
                            <option value="<?php echo $row['idCategoria']; ?>">
                                <?php echo $row['categoryName']; ?>
                            </option>
                                
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="productDescription" class="control-label">Descripción (Opcional)</label>
                <textarea name="productDescription" id="productDescription" class="form-control custom-textarea"></textarea>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group mt-3">
                        <label for="productPrice" class="control-label">
                            Precio
                        </label>
                        <input type="number" step=".01" name="productPrice" class="form-control" id="productPrice">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group mt-3">
                        <label for="productStock" class="control-label">
                            Existencia
                        </label>
                        <input type="number" name="productStock" class="form-control" id="productStock">
                    </div>
                </div>
            </div>
            
        </form>
        <div class="container mt-3">
        <button type="button" class="btn btn-cancelarProductos" id="btnCancel" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-guardarProductos" id="btnAdd">Guardar Cambios</button>


        </div>
            </div>

            </div>
            <!-- <button type="button" class="btn btnAgregar text-white" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Agregar producto
                <i class="bi bi-plus-lg"></i>
            </button> -->
            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Buscar producto"
                 aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary btn-buscar border-0 text-white" type="button" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>


            <?php 
            setlocale(LC_MONETARY, 'en-us');

            $query = "SELECT *, categoria.categoryName
                      FROM producto 
                      INNER JOIN categoria 
                      ON producto.productCategory = categoria.idCategoria
                      ORDER BY productCode ASC";

            $statement = $connection->query($query);

            if ($statement->rowCount() > 0) {
            ?>
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                      <th scope="col">Código</th>
                      <th scope="col">Nombre producto</th>
                      <th scope="col">Categoria</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Exixtencia</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

            <?php
                while($row = $statement->fetch()) {
            ?>
            <tr>
                <th scope="row"><?php echo $row['productCode']; ?></th>
                <td><?php echo $row['productName']; ?></td>
                <td><?php echo $row['categoryName']; ?></td>
                <td>$<?php echo number_format($row['productPrice'], 2); ?></td>
                <td><?php echo $row['productStock']; ?></td>
                <td>
                    
                    <button id="btnDetails" data-id="<?php echo $row['idProducto']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Detalles" class="btn-detalles mx-2 border-0" disabled>
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <button id="btnUpdate" data-id="<?php echo $row['idProducto']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn-editar mx-2 border-0">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button id="btnDelete" data-id="<?php echo $row['idProducto']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn-delete border-0">
                        <i class="bi bi-trash3"></i>
                    </button>
                </td>
            </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <?php
            } else {
                echo '<h3 class="text-center text-danger">No hay <strong>Productos</strong> que mostrar</h3>';
            }

            ?>
        </div>
    </div>
</div>   

<?php include('Modals/ProductoModal/DetailsProductoModal.php'); ?>
 <?php 
//  include('Modals/ProductoModal/AddProductoModal.php');
  ?>
<?php include('Modals/ProductoModal/EditProductoModal.php'); ?>

<?php include ("footerLinks.php"); ?>

<script src="./Assets/js/productos.js"></script>

<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

</body>
</html>