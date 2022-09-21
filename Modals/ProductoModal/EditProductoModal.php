<?php require_once "./config/connection.php"; ?>

<div class="modal fade" id="editProductModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title titulo-modalDetalles fw-bold" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" class="formProductos" name="formProductosEdit" id="formProductosEdit">
            <input type="hidden" id="idProducto" name="idProducto" class="form-control" required>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="productCode" class="control-label">
                            Código 
                        </label>
                        <input type="text" readonly name="productCode" class="form-control" id="productCode">
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

            <div class="form-group">
                <label for="productCategory" class="control-label mt-3">Seleccione categoria</label>

                <select class="form-select" name="productCategory" id="productCategory">
                    <option value="">--Seleccione categoria--</option>
                    <?php
                        $query = "SELECT * FROM categoria";

                        $statement = $connection->query($query);

                        if ($statement->num_rows > 0) {
                            while($row = $statement->fetch_array()) {
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
            
            <div class="form-group mt-3">
                <label for="productDescription" class="control-label">Descripción (Opcional)</label>
                <textarea name="productDescription" id="productDescription" class="form-control custom-textarea"></textarea>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group mt-3">
                        <label for="productPrice" class="control-label">
                            Precio
                        </label>
                        <input type="text" name="productPrice" class="form-control" id="productPrice">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group mt-3">
                        <label for="productStock" class="control-label">
                            Existencia
                        </label>
                        <input type="text" name="productStock" class="form-control" id="productStock">
                    </div>
                </div>
            </div>
            
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-cancelarProductos" id="btnCancel" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-guardarProductos" id="btnUpdateSubmit">Guardar Cambios</button>
      </div>

    </div>
  </div>
</div>