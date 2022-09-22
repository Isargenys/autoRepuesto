
<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/custom.css">

<nav class="navbar navbar-expand-lg navbar-light  border-bottom">
    <div class="container-fluid">
        <button class="btn btnSidebar" id="sidebarToggle"><i class="bi bi-list"></i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <!-- <h3 class="ml-2 d-block d-sm-none">Pharmacy System Web</h3> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown navTitulo">
                    <a class="nav-link dropdown-toggle fw-bold " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-workspace"></i> 
                     &nbsp; <?php //echo htmlspecialchars($_SESSION["username"]); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center" href="#!">
                        <i class="bi bi-person"></i>
                            Mi perfil
                        </a>
                        <a class="dropdown-item text-center" href="settings.php">
                        <i class="bi bi-gear-wide-connected"></i>
                        Configuración
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Cerrar Sesion</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
