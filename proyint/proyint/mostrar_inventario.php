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

<title>Mostrar Inventario</title>

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

  <a class="active" href="mostrar_inventario.php">Inventario
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

  <h1>Inventario</h1>
  
  <br>
  <br>
  <a href="index.php">
  <img src="media/back.png" alt="Regresar" style="width:42px;height: 42px;"></a>
  <p>Cancelar</p>
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