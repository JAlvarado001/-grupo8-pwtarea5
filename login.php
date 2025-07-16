<?php include("includes/db.php"); session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
   <div style="text-align:center;">
    <img src="ube.png" alt="Logo Biblioteca" class="logo">
<h2>Iniciar sesion</h2>
<h2>Sistema Bibliotecario</h2>
<form method="POST">
  <input type="email" name="email" placeholder="Correo" required>
  <input type="password" name="password" placeholder="Contraseña" required>
  <button type="submit" name="login">Ingresar</button>
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
      echo "<p>Contraseña incorrecta</p>";
    }
  } else {
    echo "<p>Usuario no encontrado</p>";
  }
}
?>
<a href="register.php">¿No tienes cuenta? Regístrate</a>
</div>
</body>
</html>