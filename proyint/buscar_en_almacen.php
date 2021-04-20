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

  <h1>Buscar en almacen</h1>
  <a href="http://localhost:8000/index.php">Regresar</a>
  <br>
  <br>

  <form method="post">
    <label for="ID">ID:</label><br>
    <input type="text" id="id" name="id">
    <input type="submit" name="search_by_id" value="Buscar ID"><br>
    <label for="Herramienta">Herramienta:</label><br>
    <input type="text" id="item_name" name="item_name">
    <input type="submit" name="search_by_name" value="Buscar Herramienta"><br>
    <label for="Marca">Marca:</label><br>
    <input type="text" id="marca" name="marca">
    <input type="submit" name="search_by_marca" value="Buscar Marca"><br>
    <label for="Modelo">Modelo:</label><br>
    <input type="text" id="modelo" name="modelo">
    <input type="submit" name="search_by_modelo" value="Buscar Modelo"><br>
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
if (isset($_POST['search_by_id'])) {
  $item_id = $_POST['id'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.tools WHERE item_id='$item_id'";
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
}
if (isset($_POST['search_by_name'])) {
  $item_id = $_POST['item_name'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.tools WHERE item_name='$item_id'";
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
}
if (isset($_POST['search_by_marca'])) {
  $item_id = $_POST['marca'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.tools WHERE marca='$item_id'";
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
}
if (isset($_POST['search_by_modelo'])) {
  $item_id = $_POST['modelo'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM example.tools WHERE modelo='$item_id'";
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
}
?>





</body>

</html>