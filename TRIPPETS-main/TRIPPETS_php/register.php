<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="Register.css" rel="stylesheet">
</head>

<body>

  <div class="login-box">
    <h2>REGISTRO</h2>

    <form action="register_process.php" method="post" id="registerForm" onsubmit="return validarFormulario()">
      <div class="user-box">
        <input type="text" name="username" id="nombres" required>
        <label>Nombre de usuario</label>
      </div>
      <div class="user-box">
        <input type="email" name="email" id="email" required>
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" id="password" required>
        <label>Contraseña</label>
      </div>
      <div class="user-box">
        <input type="password" name="confirm_password" id="confirm_password" required>
        <label>Confirmar Contraseña</label>
      </div>
      <div class="button">
        <center>
          <center>
            <a onclick="validarFormulario()">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Registrarse
            </a>
          </center>
      </div>
    </form>

    <div class="register-link">
      ¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a>
    </div>
  </div>

  <script>
    function validarFormulario() {
      var username = document.getElementById("nombres").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var confirm_password = document.getElementById("confirm_password").value;

      // Verificar que los campos no estén vacíos
      if (username.trim() === "" || email.trim() === "" || password.trim() === "" || confirm_password.trim() === "") {
        alert("Por favor, complete todos los campos.");
        return false; // Evitar enviar el formulario
      }

      // Verificar que las contraseñas coincidan
      if (password !== confirm_password) {
        alert("Las contraseñas no coinciden.");
        return false; // Evitar enviar el formulario
      }

      // Enviar el formulario si la validación pasa
      document.getElementById("registerForm").submit();
    }
  </script>


</body>

</html>