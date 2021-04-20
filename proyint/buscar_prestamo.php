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

  <h1>Buscar prestamo</h1>
  <a href="http://localhost:8000/index.php">Regresar</a>
  <br>
  <br>

  <form method="post">
    <label for="prestamo_id">Prestamo#:</label><br>
    <input type="text" id="prestamo_id" name="prestamo_id">
    <input type="submit" name="search_prestamo_id" value="Buscar Prestamo#"><br>

    <label for="item_id">ID de Herramienta:</label><br>
    <input type="text" id="item_id" name="item_id">
    <input type="submit" name="search_item_id" value="Buscar ID de Herramienta"><br>

    <label for="fecha_prestamo">Fecha de Prestamo:</label><br>
    <input type="date" id="fecha_prestamo" name="fecha_prestamo">
    <input type="submit" name="search_fecha_prestamo" value="Buscar Fecha de Prestamo"><br>

    <label for="fecha_devolucion">Fecha de Devolucion:</label><br>
    <input type="date" id="fecha_devolucion" name="fecha_devolucion">
    <input type="submit" name="search_fecha_devolucion" value="Buscar Fecha de Devolucion"><br>

  </form>
  <br>
  <br>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "example";
//search
include "config.php";


if (isset($_POST['search_prestamo_id'])) {
  $prestamo_id = $_POST['prestamo_id'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.prestamos WHERE prestamo_id='$prestamo_id'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<table><tr><th>Prestamo#</th><th>Herramienta ID</th><th>A quien</th><th>Fecha Prestamo</th><th>Fecha Devolcuion</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["prestamo_id"]."</td><td>".$row["item_id"]."</td><td>".$row["a_quien"]."</td><td>".$row["fecha_prestamo"]."</td><td>".$row["fecha_devolucion"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();
}


if (isset($_POST['search_item_id'])) {
  $prestamo_id = $_POST['item_id'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.prestamos WHERE item_id='$prestamo_id'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<table><tr><th>Prestamo#</th><th>Herramienta ID</th><th>A quien</th><th>Fecha Prestamo</th><th>Fecha Devolcuion</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["prestamo_id"]."</td><td>".$row["item_id"]."</td><td>".$row["a_quien"]."</td><td>".$row["fecha_prestamo"]."</td><td>".$row["fecha_devolucion"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();
}


if (isset($_POST['search_fecha_prestamo'])) {
  $prestamo_id = $_POST['fecha_prestamo'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.prestamos WHERE fecha_prestamo='$prestamo_id'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<table><tr><th>Prestamo#</th><th>Herramienta ID</th><th>A quien</th><th>Fecha Prestamo</th><th>Fecha Devolcuion</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["prestamo_id"]."</td><td>".$row["item_id"]."</td><td>".$row["a_quien"]."</td><td>".$row["fecha_prestamo"]."</td><td>".$row["fecha_devolucion"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();
}


if (isset($_POST['search_fecha_devolucion'])) {
  $prestamo_id = $_POST['fecha_devolucion'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.prestamos WHERE fecha_devolucion='$prestamo_id'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<table><tr><th>Prestamo#</th><th>Herramienta ID</th><th>A quien</th><th>Fecha Prestamo</th><th>Fecha Devolcuion</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["prestamo_id"]."</td><td>".$row["item_id"]."</td><td>".$row["a_quien"]."</td><td>".$row["fecha_prestamo"]."</td><td>".$row["fecha_devolucion"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();
}
?>





</body>

</html>