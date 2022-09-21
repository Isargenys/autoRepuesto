<?php

session_start();

if (!isset($_SESSION['username']) && !empty($_SESSION['username'])) {    
    header('Location: login.php');
}

include_once "config/connection.php";

?>

<?php include ("headerLinks.php");?>

    <div class="d-flex" id="wrapper">
        <?php include('sidenav.php') ?>
        <div id="page-content-wrapper">
            <?php include ("navbar.php"); ?>
            
            <div class="container-fluid">
                
                
            
            </div>

        </div>
        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>