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
<title>Buscar en almacen</title>

<div class="topnav">
  <a href="index.php">Pagina Principal
  <br>  
  <img src="media/home.png" alt="Home">
  </a>

  <a href="agregar_herramienta.php">Agregar Herramientas
    <br>
    <img src="media/plus.png" alt="Agregar">
  </a>

  <a class="active" href="buscar_en_almacen.php">Busquedas
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

  <a href="mostrar_inventario.php">Inventario
    <br>
    <img src="media/inventory.png" alt="inventory">
  </a>
  <a href="mostrar_prestamos.php">Mostrar Prestamos
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

  <h1>Buscar en almacen</h1>

  <br>
  <br>


  <form method="post">
    <h2>Funciones para busqueda de herramientas en almacen</h2>
    <br>
    <br>

    <div class="form_block">
    <!--<label for="ID">ID:</label><br>-->
    <input type="text" id="id" name="id" placeholder="ID de herramienta">
    <input class ="buttonS" type="submit" name="search_by_id" value="Buscar ID"><br>
    
    <!--<label for="Herramienta">Herramienta:</label><br>-->
    <input type="text" id="item_name" name="item_name" placeholder="Herramienta">
    <input class ="buttonS" type="submit" name="search_by_name" value="Buscar Herramienta"><br>

    <!--<label for="Marca">Marca:</label><br>-->
    <input type="text" id="marca" name="marca" placeholder="Marca">
    <input class ="buttonS" type="submit" name="search_by_marca" value="Buscar Marca"><br>

    <!--<label for="Modelo">Modelo:</label><br>-->
    <input type="text" id="modelo" name="modelo" placeholder="Modelo">
    <input class ="buttonS" type="submit" name="search_by_modelo" value="Buscar Modelo"><br>

    </div>
    <br>
    <a href="index.php">
    <img src="media/back.png" alt="Regresar" style="width:42px;height: 42px;"></a>
    <p>Cancelar</p>
  </form>
  <br>

  <p class ="sectex">Texto de prueba</p>
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