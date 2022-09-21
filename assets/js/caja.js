$(document).ready(function () {
  var fecha = new Date();

  var fechaCompleta =
    fecha.getDate() + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear();
  document.getElementById("fechaVenta").value = fechaCompleta;

  // AJAX Method for search Products
  $("#inputBuscarProducto").keyup(function () {
    var query = $(this).val();

    if (query != "") {
      $.ajax({
        url: "./searchProductToSell.php",
        method: "POST",
        data: {
          query: query,
        },
        success: function (data) {
          $("#search_result").fadeIn();
          $("#search_result").html(data);
        },
      });
    } else {
      $("#search_result").css("display", "none");
    }
  });

  $(document).on("click", "li", function () {
    $("#inputBuscarProducto").val($(this).text());
    $("#search_result").fadeOut();

    console.log($(this).attr("id"));
    $("#precio").val($(this).attr("id"));
  });

  //Showing productlist
  showData();
});

// Calculate total amount by quantity of product
function totalByQuantity(price, quantity) {
  var result = price * quantity;

  return result;
}

//Clear LocalStorage
document.getElementById("btnClearList").addEventListener("click", function () {
  localStorage.clear();
});

// Method for add shoping product list in localStorage and showing in table
let productList = localStorage.getItem("productList") ?
  JSON.parse(localStorage.getItem("productList")) :
  [];
localStorage.setItem("productsList", JSON.stringify(productList));

//document.getElementById("btnAgregar").addEventListener("click", function () {
  // document.getElementById("vendedor").value = totalByQuantity(precio, cantidad);

  // var productToBuy = {
  //   productName: document.getElementById("inputBuscarProducto").value,
  //   productPrice: document.getElementById("precio").value,
  //   quantity: document.getElementById("cantidad").value,
  // };

  // productList.push(productToBuy);
  // localStorage.setItem("productList", JSON.stringify(productList));

  // document.getElementById("inputBuscarProducto").value = "";
  // document.getElementById("precio").value = "";
  // document.getElementById("cantidad").value = "";

  // productList = JSON.parse(localStorage.getItem("productList"));

  // AddToCart();
  // showData();
//});

document.getElementById("btnAgregar").addEventListener('click', function() {
  console.log('Hiciste CLick');
  debugger;

  AddToCart();
});

function AddToCart() {
  let sellForm = $('#sellForm').serialize();

  var productName = document.getElementById('buscarProducto').value;
  var quantity = document.getElementById('precio').value;
  var price = document.getElementById('cantidad').value;

  if (productName == null || productName == '' &&
      quantity == null || quantity == '' &&
      price == null || price == '') {
        alert('No hay productos seleccionados');
        return false;
      }

  $.ajax({
    type: 'POST',
    url: '../caja.php',
    data: sellForm,
    success: function(response) {
      let dataResult = JSON.parse(response);

      dataResult == 200 ? location.reload() : alert(response);
    }
  });
} 