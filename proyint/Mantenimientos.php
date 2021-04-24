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
<title>Mantenimientos</title>

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
  <a class="active" href="mantenimiento.php">Mantenimientos
    <br>
    <img src="media/maint.png" alt="new">
  </a>
</div>

</head>
<body>
<h1>Herramientas en mantenimiento</h1>
  <a href="http://localhost:8000/index.php">Regresar</a>
  <br>
  <br>
  <form action="" method="post" name="form1">
    <table width="25%" border="0">
      <tbody>
        <tr>
          <td>ID de Herramienta</td>
          <td><input type="text" name="item_id"></td>
        </tr>
        <tr>
          <td>Quien entrega</td>
          <td><input type="text" name="a_quien"></td>
        </tr>
        <tr>
          <td>A donde va</td>
          <td><input type="text" name="location"></td>
        </tr>
        <tr>
          <td>Fecha de salida</td>
          <td><input type="date" name="fecha_prestamo"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
      </tbody>
    </table>
  </form>

  <?php
//send info to database
include "config.php";
if (isset($_POST['Submit'])) {
    $item_id = $_POST['item_id'];
    $a_quien = $_POST['a_quien'];
    $location = $_POST['location'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $result = mysqli_query($cser, "INSERT INTO example.mantenimiento(item_id,a_quien,fecha_salida) VALUES('$item_id','$a_quien','$fecha_prestamo')");
    $update = mysqli_query($cser, "UPDATE example.tools SET location='$location', who_has_it='mantenimiento' WHERE item_id='$item_id'");
    echo "<font color='green'>Prestamo agregado a base de datos.</font>";
}
?>

  </body>

</html>