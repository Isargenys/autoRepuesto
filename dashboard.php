<?php
session_start();
 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("location: login.php");
     exit;
}

// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//      header("location: login_test.php");
//      exit;
// }

?>

<?php
include ("headerLinks.php"); 
?>
    <div class="d-flex" id="wrapper">
        <?php include('sidenav.php') ?>
        <div id="page-content-wrapper">
            <?php include ("navbar.php"); ?>
            <div class="container-fluid">
                <div class="row mt-3 p-4">
                <div class="col-sm-3 mb-3 ">
                <a class="text-decoration-none" href="">
                <div class="card  border-3" style="background-color:#2c9fa3 ;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">
                            Inventario
                        </h5>
                        <i class="bi bi-card-list d-flex fs-1 justify-content-center mt-auto text-white-50"></i>
                    </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 mb-3 ">
                <a class="text-decoration-none" href="">
                <div class="card  border-3" style="background-color:#ffb914 ;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">
                            Tienda
                        </h5>
                        <i class="bi bi-shop d-flex fs-1 justify-content-center mt-auto text-white-50 "></i>
                    </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 mb-3 ">
                <a class="text-decoration-none" href="">
                <div class="card  border-3" style="background-color:#f03813 ;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">
                            Reportes
                        </h5>
                        <i class="bi bi-clipboard-data d-flex fs-1 justify-content-center mt-auto text-white-50"></i>  
                    </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 mb-3 ">
                <a class="text-decoration-none" href="">
                <div class="card  border-3" style="background-color:#ff8826 ;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">
                            Empleados
                        </h5>
                        <i class="bi bi-people d-flex fs-1 justify-content-center mt-auto text-white-50"></i>
                    </div>
                    </div>
                </a>
            </div>
       
                </a>
            </div>
            
                </div>

        </div>
        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>