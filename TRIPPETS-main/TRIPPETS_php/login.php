<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión - TRIPPETS</title>
  <link href="login.css" rel="stylesheet">
</head>

<body>

  <div class="login-box">
    <h2>Inicio De Sesión</h2>

    <form action="login_process.php" method="post" id="loginForm">
      <div class="user-box">
        <input type="text" name="username" id="username" required>
        <label for="username">Nombre de Usuario</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" id="password" required>
        <label for="password">Contraseña</label>
      </div>
      <div class="button">
        <center>
          <a onclick="validarFormulario()"> 
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Iniciar Sesión
          </a>
        </center>
      </div>
    </form>
  </div>

  <script>
    function validarFormulario() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;

      // Verificar que los campos no estén vacíos
      if (username.trim() === "" || password.trim() === "") {
        alert("Por favor, complete todos los campos.");
        return false; // Evitar enviar el formulario
      }

      document.getElementById("loginForm").submit(); // Enviar el formulario si la validación pasa
    }
  </script>

</body>

</html>