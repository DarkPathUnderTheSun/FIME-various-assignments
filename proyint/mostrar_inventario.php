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

  <h1>Almacen</h1>
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

$sql = "SELECT * FROM example.tools";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>id</th><th>Herramienta</th><th>Ubicacion</th><th>Quien la tiene</th><th>Marca</th><th>Modelo</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["item_id"]."</td><td>".$row["item_name"]."</td><td>".$row["location"]."</td><td>".$row["who_has_it"]."</td><td>".$row["marca"]."</td><td>".$row["modelo"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>





</body>

</html>