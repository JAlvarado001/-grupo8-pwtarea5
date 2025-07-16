<?php
session_start();
include("../includes/db.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
  header("Location: ../login.php");
  exit();
}
if (isset($_POST['add'])) {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $genre = $_POST['genre'];
  $quantity = $_POST['quantity'];
  $stmt = $conn->prepare("INSERT INTO books (title, author, year, genre, quantity) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisi", $title, $author, $year, $genre, $quantity);
  $stmt->execute();
  echo "<p>Libro agregado correctamente.</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Agregar Libro</title>
  <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<div class="container">
<h2>Agregar Nuevo Libro</h2>
<form method="POST">
  <input type="text" name="title" placeholder="Título" required>
  <input type="text" name="author" placeholder="Autor" required>
  <input type="number" name="year" placeholder="Año">
  <input type="text" name="genre" placeholder="Género">
  <input type="number" name="quantity" placeholder="Cantidad" required>
  <button type="submit" name="add">Agregar</button>
</form>
<a href="bibliotecario.php">Volver</a>
</div>
</body>
</html>