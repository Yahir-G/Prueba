<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['reg_username'];
    $password = $_POST['reg_password'];
    $role = $_POST['reg_role'];

    // Consulta para obtener el ID del rol
    $query = "SELECT id FROM Roles WHERE nombre = '$role'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $role_id = $row['id'];

    $query = "INSERT INTO usuarios (username, password, rol_id) VALUES ('$username', '$password', $role_id)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Registro exitoso. Por favor, <a href='login.html'>Inicia Sesión</a";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
