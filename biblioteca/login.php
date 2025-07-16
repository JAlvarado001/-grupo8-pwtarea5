<?php include("includes/db.php"); session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesión</title>
</head>
<body>
  <h2>Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <input type="submit" name="login" value="Ingresar">
  </form>

<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT * FROM users WHERE email='$email'");
  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      switch ($user['role_id']) {
        case 1: header("Location: pages/admin.php"); break;
        case 2: header("Location: pages/bibliotecario.php"); break;
        case 3: header("Location: pages/lector.php"); break;
      }
    } else {
      echo "Contraseña incorrecta";
    }
  } else {
    echo "Usuario no encontrado";
  }
}
?>
</body>
</html>
