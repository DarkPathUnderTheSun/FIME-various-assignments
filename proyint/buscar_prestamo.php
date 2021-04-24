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
<title>Buscar prestamo</title>

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

  <a class="active" href="buscar_prestamo.php">Prestamos
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

  <h1>Buscar prestamo</h1>

  <br>
  <br>

  <form method="post">
  <table width="25%" border="0">

        <h2>Introduce cualquiera de la informacion para busqueda por parametros</h2>
        <br>

				<input name="prestamo_id" type="text" placeholder="Prestamo No." maxlength="80" id="prestamo_id" autofocus/>
        <button id="enviar" name="search_prestamo_id" value="Buscar Prestamo#" class="btn">Buscar prestamo</button>
        <br>
        <br>

				<input  type="text" id="item_id" name="item_id" placeholder="ID de Herramienta" />
        <button id="enviar" name="search_item_id" value="Buscar ID de Herramienta" class="btn">Buscar ID de Herramienta</button>
        <br>
        <br>

        <p>Busqueda por fecha de prestamo</p>
        <input type="date" id="fecha_prestamo" name="fecha_prestamo" />
        <button id="enviar" name="search_fecha_prestamo" value="Buscar Fecha de Prestamo" class="btn">Buscar fecha de prestamo</button>
        <br>
        <br>

        <p>Busqueda por fecha de devolucion</p>
        <input type="date" id="fecha_devolucion" name="fecha_devolucion" />
        <button id="enviar" name="search_fecha_devolucion" value="Buscar Fecha de Devolucion" class="btn">Buscar fecha de devolucion</button>

  </form>

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
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["prestamo_id"] . "</td><td>" . $row["item_id"] . "</td><td>" . $row["a_quien"] . "</td><td>" . $row["fecha_prestamo"] . "</td><td>" . $row["fecha_devolucion"] . "</td></tr>";
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
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["prestamo_id"] . "</td><td>" . $row["item_id"] . "</td><td>" . $row["a_quien"] . "</td><td>" . $row["fecha_prestamo"] . "</td><td>" . $row["fecha_devolucion"] . "</td></tr>";
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
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["prestamo_id"] . "</td><td>" . $row["item_id"] . "</td><td>" . $row["a_quien"] . "</td><td>" . $row["fecha_prestamo"] . "</td><td>" . $row["fecha_devolucion"] . "</td></tr>";
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
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["prestamo_id"] . "</td><td>" . $row["item_id"] . "</td><td>" . $row["a_quien"] . "</td><td>" . $row["fecha_prestamo"] . "</td><td>" . $row["fecha_devolucion"] . "</td></tr>";
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