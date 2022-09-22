<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
require_once "./config/connection.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["NombreUsuario"]))){
        $username_err = "Por favor, ingresa un nombre de usuario.";
    } else{
        $username = trim($_POST["NombreUsuario"]);
    }
    
    if(empty(trim($_POST["Password"]))){
        $password_err = "Por favor, ingresa una contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT UsuarioID, NombreUsuario, password FROM usuarios WHERE NombreUsuario = :NombreUsuario";
        
        if($stmt = $connection->prepare($sql)){
            $stmt->bindParam(":NombreUsuario", $param_username, PDO::PARAM_STR);
            
			$param_username = trim($_POST["NombreUsuario"]);
            
			if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["UsuarioID"];
                        $username = $row["NombreUsuario"];
                        $hashed_password = $row["Password"];
                        
						session_start();
                            
                        $_SESSION["loggedin"] = true;
						$_SESSION["UsuarioID"] = $id;
						$_SESSION["NombreUsuario"] = $username;                            
                        
						header("location: dashboard.php");
                    }
                } else{
                    $login_err = "Nombre de Usuario y/o Contraseña son invalidos.";
                }
            } else{
                echo "Oops! Algo salio mal, intente de nuevo mas tarde...";
            }

			unset($stmt);
        }
    }
    
	unset($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GoodPharmacy - Inicio de Sesión</title>
	<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
	
	<div class="container fw-bold  form-login">
		<h1 class="text-center mb-3">GoodPharmacy</h1>
		
		<div class="row mt-5">
			<div class="col-12 col-md-4"></div>
			<div class="col-12 col-md-4 ">
				<?php 
				if(!empty($login_err)){
					echo '<div class="alert alert-danger">' . $login_err . '</div>';
				}        
				?>
				<div class="card login mb-3">
					<h4 class="card-header text-center text-white p-4">Inicio de Sesion</h4>
					<div class="card-body mt-3">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div class="form-group mb-3 text-white">
								<label for="NombreUsuario" class="mb-2">Nombre de Usuario</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<i class="bi bi-person-fill"></i>
								  </span>
								  <input type="text" class="form-control" id="NombreUsuario" name="NombreUsuario">
								</div>
							</div>
							<div class="form-group mb-3 text-white">
								<label for="password" class="mb-2">Contraseña</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<i class="bi bi-lock-fill"></i>
								  </span>
								  <input type="password" class="form-control" id="password" name="Password">
								</div>
							</div>
							<div class="mt-4 mb-3 d-flex justify-content-center gap-2">
								<button type="submit" id="btnSubmit" class="btn btn-iniciar w-75 border-3">Iniciar</button>
							</div>
						</form>
					</div>
				</div>
				<a href="passwordRecovery.php" class="mt-5 text-decoration-none linkC">Olvide mi contraseña?</a>
			</div>
			<div class="col-12 col-md-4"></div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>