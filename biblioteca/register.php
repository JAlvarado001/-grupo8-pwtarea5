<?php include("includes/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
</head>
<body>
  <h2>Registrar Usuario</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Usuario" required><br>
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <select name="role_id" required>
      <option value="1">Administrador</option>
      <option value="2">Bibliotecario</option>
      <option value="3">Lector</option>
    </select><br>
    <input type="submit" name="register" value="Registrar">
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

  echo "Usuario registrado correctamente.";
}
?>
</body>
</html>
