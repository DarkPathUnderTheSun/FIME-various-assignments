<!DOCTYPE html>
<html>

<head>
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
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["prestamo_id"]."</td><td>".$row["item_id"]."</td><td>".$row["a_quien"]."</td><td>".$row["fecha_prestamo"]."</td><td>".$row["fecha_devolucion"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>





</body>

</html>