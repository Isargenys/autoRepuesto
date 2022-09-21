function imagePreview(e) {
    const reader = new FileReader();

    reader.readAsDataURL(e.target.files[0]);
    reader.onload = () => {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
    }
}

$('#btnAdd').click(function() {
    let productAddForm = $('#formProductos').serialize();

    // let productCode = document.getElementById('productCode').value;
    // let productName = document.getElementsByName('productName').value;
    // let productCategory = document.getElementById('productCategory').value;
    // let productPrice = document.getElementsByName('productPrice').value;
    // let productStock = document.getElementById('productStock').value;

    debugger;

    // if (isNaN(productCode)) {
    //     alert('Este campo "CODIGO" solo admite valores numericos.');
    //     return false;
    // }
    
    // if (isNaN(productPrice)) {
    //     alert('Este campo "PRECIO" solo admite valores numericos.');
    //     return false;
    // }
    
    // if (isNaN(productStock)) {
    //     alert('Este campo "EXISTENCIA" solo admite valores numericos.');
    //     return false;
    // }
    
    // if (productCode == '' || productCode == null || productCode.length == 0) {
    //     alert('Debe asignar un codigo de producto.');
    //     return false;
    // } 

    // if (productName == '' || productName == null || productName.length == 0) {
    //     alert('El campo nombre de Producto esta vacio o es invalido.');
    //     return false;
    // }
    
    // if (productCategory.value == '' || productCategory.value == null) {
    //     alert('Debe elegir una categoria para este producto');
    //     return false;
    // }

    // if (productPrice == '' || productPrice == null || productPrice.length == 0) {
    //     alert('Debe asignar precio de venta a este producto.');
    //     return false;
    // }

    // if (productStock == '' || productStock == null || productStock.length == 0) {
    //     alert('Debe asignar una cantidad en almacen');
    //     return false;
    // }
    
    $.ajax({
        data: productAddForm,
        type: 'post',
        url: 'addProduct.php',
        success: function(response) {
            let dataResult = JSON.parse(response);

            if (dataResult.statusCode == 200) {
                //$('#addProductModal').modal('hide');
                //alert('Producto Agregado exitosamente!!!');

                location.reload();
            } else {
                alert(response);
            }
        }
    })
});

detailProduct();

function detailProduct() {
    $(document).delegate('#btnDetails', 'click', function() {
        let productId = $(this).attr('data-id');

        $.ajax({
            type: "GET", //we are using GET method to get data from server side
            url: 'detalleproducto.php', // get the route value
            data: { idProducto: productId  }, //set data
            success: function (response) {//once the request successfully process to the server side it will return result here
                response = JSON.parse(response);
                
                $('#modalInfo #productName').val(response.productName);
                $('#modalInfo #productCategory').val(response.productCategory);
                $('#modalInfo #productDescription').val(response.productDescription);
                $('#modalInfo #productPrice').val(response.productPrice);
            }
        });

        $("#modalProductDetalles").modal("show");
    });
}


//editProduct();

//function editProduct() {
    $(document).delegate('#btnUpdate', 'click', function() {
        let productId = $(this).attr('data-id');

        $.ajax({
            type: "GET", //we are using GET method to get data from server side
            url: 'detalleproducto.php', // get the route value
            data: { idProducto: productId  }, //set data
            success: function (response) {//once the request successfully process to the server side it will return result here
                response = JSON.parse(response);
                
                console.log(productId);
                $('#formProductosEdit #idProducto').val(productId);
                $('#formProductosEdit #productCode').val(response.productCode);
                $('#formProductosEdit #productName').val(response.productName);
                $('#formProductosEdit #productCategory').val(response.productCategory);
                $('#formProductosEdit #productDescription').val(response.productDescription);
                $('#formProductosEdit #productPrice').val(response.productPrice);
                $('#formProductosEdit #productStock').val(response.productStock);
            }
        });

        
        $("#editProductModal").modal("show");
    });
//}



    
$("#btnUpdateSubmit").on("click", function() {
    // var $this = $(this);
    // var id = $('#formProductosEdit input#idProducto').attr("id");  
    // var $caption = $this.html();
    // var form = "#formProductosEdit";
    // var formData = $(form).serializeArray();

    // let productId = $(this).attr('data-id');

    // console.log(id);
    // console.log(productId);

    // $.ajax({
    //     type: "POST",
    //     url: 'actualizarproducto.php',
    //     data: {idProducto: productId, formData},
    //     beforeSend: function () {
    //         $this.attr('disabled', true).html("Processing...");
    //     },
    //     success: function (response) {
    //         $('#idProducto').val(id); 
    //         $this.attr('disabled', false).html($caption);
            
    //         alert(response);
    //         window.location.reload();
    //     }
    // });

    $('#formProductosEdit #idProducto').val();
    $('#formProductosEdit #productCode').val();
    $('#formProductosEdit #productName').val();
    $('#formProductosEdit #productCategory').val();
    $('#formProductosEdit #productDescription').val();
    $('#formProductosEdit #productPrice').val();
    $('#formProductosEdit #productStock').val();

//     $.ajax({
//         url: 'actualizarproducto.php',
//         method: 'POST',
//         data: {
//             formData
//             //$('#formProductosEdit #idProducto').val(productId);
//             // productCode: productCode,
//             // productName: productName,
//             // productCategory: productCategory,
//             // productDescription: productDescription,
//             // productPrice: productPrice,
//             // productStock: productStock
//         },
//         success: function(response) {
//             alert(response);
//             window.location.href = 'productos.php';
//         }
//    });

    var formData = $("#formProductosEdit").serialize();

    $.ajax({
        data: formData,
        type: "post",
        url: 'actualizarproducto.php',
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                //$('#editEmployeeModal').modal('hide');
                //alert('Data updated successfully !'); 
                location.reload();						
            }
            else if(dataResult.statusCode==201){
               alert(dataResult);
            }
    },
    });
});


deleteProduct();

function deleteProduct() {
    $(document).delegate('#btnDelete', 'click', function() {
        if (confirm("Esta seguro que desea eliminar este producto?")) {
            let productId = $(this).attr('data-id');
            
            $.ajax({
                type: 'GET',
                url: 'deleteproducto.php',
                data: { idProducto: productId },
                success: function() {
                    window.location.reload();
                }
            });
        }
    });
}