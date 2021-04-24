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
<title>Devolver Prestamo</title>

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

  <a class="active" href="devolver_prestamo.php">Devolver Prestamos
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

</head>

<body>

  <h1>Prestamo nuevo</h1>
  
  <br>
  <br>
  <form action="" method="post" name="form1">
    <table width="100%" border="0">
    <h2>Introduce cualquiera de la informacion para busqueda por parametros</h2>
    <br>
    <br>
      <tbody>
        <tr>
          <td>Prestamo# a cerrar</td>
          <td><input type="text" name="prestamo_id" placeholder="Numero de  prestamo"></td>
        </tr>
        <tr>
          <td>Fecha de devolucion</td>
          <td><input type="date" name="fecha_devolucion"></td>
        </tr>
        <tr>
          <td></td>
          <td><input class ="parce" type="submit" name="Submit" value="Buscar"></td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>

    <a href="index.php">
  <img src="media/back.png" alt="Regresar" style="width:42px;height: 42px;"></a>
  <p>Cancelar</p>
  </form>




  <?php
//send info to database
include "config.php";
if (isset($_POST['Submit'])) {
  $prestamo_id = $_POST['prestamo_id'];
  $fecha_devolucion = $_POST['fecha_devolucion'];
  $result = mysqli_query($cser, "UPDATE example.prestamos SET fecha_devolucion='$fecha_devolucion' WHERE prestamo_id='$prestamo_id'");
  $update = mysqli_query($cser, "UPDATE example.tools SET location='almacen', who_has_it='almacen' WHERE item_id=(SELECT item_id from example.prestamos WHERE prestamo_id='$prestamo_id')");
  echo "<font color='green'>Prestamo agregado a base de datos.</font>";
}
?>

  </body>

</html>