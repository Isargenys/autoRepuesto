<?php
session_start();
 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("location: login.php");
     exit;
}

$firstName = $lastName = $phone = $address = $idnivel =
$username = $password = $confirm_password = "";

$firstName_err = $lastName_err = $phone_err = $address_err = $idnivel_err =
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty(trim($_POST["firstName"]))) {
        $firstName_err = "Por favor, ingrese un nombre";
    } else {
        $firstName = trim($_POST["firstName"]);
    }
    
    if (trim($_POST["middleName"])) {
        $middleName = trim($_POST["firstName"]);
    }
    
    if (empty(trim($_POST["lastName"]))) {
        $lastName_err = "Por favor ingrese un apellido";
    } else {
        $lastName = trim($_POST["lastName"]);
    }
    
    if (empty(trim($_POST["phone"]))) {
        $lastName_err = "Por favor ingrese un numero de telefono";
    } else {
        $phone = trim($_POST["phone"]);
    }
    
    if (empty(trim($_POST["address"]))) {
        $lastName_err = "Por favor ingrese un direccion";
    } else {
        $address = trim($_POST["address"]);
    }
    
    if (empty(trim($_POST["idnivel"]))) {
        $lastName_err = "Por favor ingrese un nivel de usuario";
    } else {
        $idnivel = trim($_POST["idnivel"]);
    }
    
    if (trim($_POST["email"])) {
        $sql = "SELECT id FROM users WHERE email = :email";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            $param_email = trim($_POST["email"]);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $email_err = "Este correo electronico ya existe en los registros";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }

    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, ingrese un nombre de usuario";
    } else {
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            $param_username = trim($_POST["username"]);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = "Este nombre de usuario ya existe en los registros";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, ingrese una contraseña";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña debe tener 6 caracteres o mas";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor, confirme la contraseña";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden";
        }
    }

    if (empty($firstName_err) && empty($lastName_err) && 
        empty($phone_err) && empty($password_err) &&
        empty($address_err) && empty($idnivel_err) &&
        empty($confirm_password_err)) {
            $query = "INSERT INTO employees(firstName, middleName, lastName, phone, address, email, idnivel, username, password) 
            VALUES (:firstName, :middleName, :lastName, :phone, :address, :email, :idnivel, :username, :password)";

            if ($statement = $connection->query($query)) {
                $statement->bindParam(":firstName", $param_firstName, PDO::PARAM_STR); 
                $statement->bindParam(":middleName", $param_middleName, PDO::PARAM_STR);
                $statement->bindParam(":lastName", $param_lastName, PDO::PARAM_STR);
                $statement->bindParam(":phone", $param_phone, PDO::PARAM_STR);
                $statement->bindParam(":address", $param_address, PDO::PARAM_STR);
                $statement->bindParam(":email", $param_email, PDO::PARAM_STR);
                $statement->bindParam(":idnivel", $param_idnivel, PDO::PARAM_STR);
                $statement->bindParam(":username", $param_username, PDO::PARAM_STR);
                $statement->bindParam(":password", $param_passowrd, PDO::PARAM_STR);

                $param_firstName = $firstName; 
                $param_middleName = $middleName;
                $param_lastName = $lastName;
                $param_phone = $phone;
                $param_address = $address;
                $param_email = $email;
                $param_idnivel = $idnivel;
                $param_username = $username;
                $param_passowrd = password_hash($password, PASSWORD_DEFAULT);

                if ($statement->execute()) {
                    header('location: employees.php');
                } else {
                    echo "Something wrong";
                }

                unset($statement);
            }
        }
    
    unset($connection);
}

?>

<?php
include ("headerLinks.php"); 
?>
    <div class="d-flex" id="wrapper">
        <?php include('sidenav.php') ?>
        <div id="page-content-wrapper">
            <?php include ("navbar.php"); ?>

            <div class="container-fluid">
            
            <h4 class=" mt-5 ms-5 nuevoEmpleado">Nuevo Empleado</h4>
                <div class="container mt-5 d-flex justify-content-center shadow-sm w-75 rounded-3">
                

                <form action="">
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Numero de empleado
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Nombre
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                    Apellido
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Telefono
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Dirección
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                    Correo
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Permisos
                                </label>
                                <select class="form-select" aria-label="Default select example">
                                <option selected>Administrador</option>
                                <option value="1">Cajero</option>
                                <option value="2">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                Usuario
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">
                                    Clave
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
                </div>


            </div>

        </div>
    </div>       

      
    

<?php
include ("footerLinks.php"); 
?>