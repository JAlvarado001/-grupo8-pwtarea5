<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 3) {
  header("Location: ../login.php");
  exit();
}
echo "<h2>Bienvenido, Lector " . $_SESSION['user']['username'] . "</h2>";
?>
<a href="../logout.php">Cerrar sesión</a>
<!-- Aquí puedes mostrar el catálogo y solicitud de préstamo -->
