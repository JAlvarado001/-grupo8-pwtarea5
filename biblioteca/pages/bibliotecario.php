<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
  header("Location: ../login.php");
  exit();
}
echo "<h2>Bienvenido, Bibliotecario " . $_SESSION['user']['username'] . "</h2>";
?>
<a href="../logout.php">Cerrar sesión</a>
<!-- Aquí agregarás gestión de libros y transacciones -->
