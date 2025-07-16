<?php
session_start();
include("../includes/db.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
  header("Location: ../login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Panel Bibliotecario</title>
  <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<div class="container">
<h2>Bienvenido Bibliotecario <?php echo $_SESSION['user']['username']; ?></h2>
<a href="agregar_libro.php">Agregar Libro</a> | <a href="../logout.php">Cerrar sesión</a>
<h3>Catálogo de libros</h3>
<table border='1' cellpadding='5'>
<tr><th>Título</th><th>Autor</th><th>Año</th><th>Género</th><th>Cantidad</th><th>Acciones</th></tr>
<?php
$result = $conn->query("SELECT * FROM books");
while ($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>{$row['title']}</td>
    <td>{$row['author']}</td>
    <td>{$row['year']}</td>
    <td>{$row['genre']}</td>
    <td>{$row['quantity']}</td>
    <td><a href='eliminar_libro.php?id={$row['id']}'>Eliminar</a></td>
  </tr>";
}
?>
</table>
</div>
</body>
</html>