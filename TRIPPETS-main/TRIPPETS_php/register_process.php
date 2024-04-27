<?php
session_start();

include 'db.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validar los datos
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Por favor, complete todos los campos.";
    } elseif ($password != $confirm_password) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario en la base de datos
        $sql_insert_user = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt_insert_user = $conn->prepare($sql_insert_user);
        $stmt_insert_user->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt_insert_user->execute()) {
            echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar el usuario.";
        }

        $stmt_insert_user->close();
    }

    $conn->close();
}
?>
