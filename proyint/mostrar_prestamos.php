<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/busqueda.css">
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital@1&display=swap" rel="stylesheet">
<meta name="viewport" content="width= device-width, user-scalabe=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

<div class="topnav">
  <a href="index.php">Pagina Principal
  <br>
  <img src="media/home.png" alt="Home">
  </a>

  <a href="agregar_herramienta.php">Agregar Herramientas
    <br>
    <img src="media/plus.png" alt="Agregar">
  </a>

  <a href="buscar_en_almacen.php">Busquedas
    <br>
    <img src="media/loupe.png" alt="Search">
  </a>

  <a href="buscar_prestamo.php">Prestamos
    <br>
    <img src="media/settings.png" alt="Borrow">
  </a>

  <a href="devolver_prestamo.php">Devolver Prestamos
    <br>
    <img src="media/packing.png" alt="Packing">
  </a>

  <a  href="mostrar_inventario.php">Inventario
    <br>
    <img src="media/inventory.png" alt="inventory">
  </a>
  <a class="active" href="mostrar_prestamos.php">Mostrar Prestamos
    <br>
    <img src="media/eye.png" alt="show">
  </a>
  <a href="prestamo_nuevo.php">Prestamo Nuevo
    <br>
    <img src="media/new.png" alt="new">
  </a>
  <a href="mantenimiento.php">Mantenimientos
    <br>
    <img src="media/maint.png" alt="new">
  </a>
</div>

  <style>
  table,
  td,
  th {
    padding: 10px;
    border: 2px solid #1c87c9;
    border-radius: 5px;
    background-color: #e5e5e5;
    text-align: center;
  }
  </style>
</head>

<body>

  <h1>Lista de Prestamos</h1>
  <a href="http://localhost:8000/index.php">Regresar</a>
  <br>
  <br>

  <?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "example";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM example.prestamos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Prestamo#</th><th>ID de Herramienta</th><th>A quien se presto</th><th>Fecha de Prestamo</th><th>Fecha de retorno</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["prestamo_id"] . "</td><td>" . $row["item_id"] . "</td><td>" . $row["a_quien"] . "</td><td>" . $row["fecha_prestamo"] . "</td><td>" . $row["fecha_devolucion"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>





</body>

</html>