<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Buscar al usuario en la base de datos
    $sql = "SELECT id, username, password, role_id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        // Redirigir según el rol del usuario
        if ($user["role_id"] == 1) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            header("Location: user_dashboard.php");
            exit();
        }
    } else {
        // Mostrar alerta en la misma página
        echo "<script>alert('Nombre de usuario o contraseña incorrectos.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
