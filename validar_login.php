<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $rol_id = $row['rol_id'];

    $_SESSION['username'] = $username;
    $_SESSION['rol_id'] = $rol_id;
    
    switch ($rol_id) {
        case 1:
            header("Location: roles/principal.php");
            exit();
        case 2:
            header("Location: roles/principal.php");
            exit();
        case 3:
            header("Location: roles/principal.php");
            exit();
        default:
            echo "Rol no válido";
            break;
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        USUARIO O CONTRASEÑA INCORRECTAS <a href='login.html'>Volver</a>
        </div>";
    }
}
?>