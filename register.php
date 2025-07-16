<?php include("includes/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
<h2>Registrar Usuario</h2>
<form method="POST">
  <input type="text" name="username" placeholder="Usuario" required>
  <input type="email" name="email" placeholder="Correo" required>
  <input type="password" name="password" placeholder="Contraseña" required>
  <select name="role_id" required>
    <option value="1">Administrador</option>
    <option value="2">Bibliotecario</option>
    <option value="3">Lector</option>
  </select>
  <button type="submit" name="register">Registrar</button>
</form>
<?php
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role_id = $_POST['role_id'];
  $stmt = $conn->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $username, $email, $password, $role_id);
  $stmt->execute();
  echo "<p>Usuario registrado correctamente.</p>";
}
?>
<a href="login.php">Iniciar sesión</a>
</div>
</body>
</html>