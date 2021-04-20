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

  <h1>Prestamo nuevo</h1>
  <a href="http://localhost:8000/index.php">Regresar</a>
  <br>
  <br>
  <form action="" method="post" name="form1">
    <table width="25%" border="0">
      <tbody>
        <tr>
          <td>Prestamo# a cerrar</td>
          <td><input type="text" name="prestamo_id"></td>
        </tr>
        <tr>
          <td>Fecha de devolucion</td>
          <td><input type="date" name="fecha_devolucion"></td>
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
  $prestamo_id = $_POST['prestamo_id'];
  $fecha_devolucion = $_POST['fecha_devolucion'];
  $result = mysqli_query($cser, "UPDATE example.prestamos SET fecha_devolucion='$fecha_devolucion' WHERE prestamo_id='$prestamo_id'");
  $update = mysqli_query($cser, "UPDATE example.tools SET location='almacen', who_has_it='almacen' WHERE item_id=(SELECT item_id from example.prestamos WHERE prestamo_id='$prestamo_id')");
  echo "<font color='green'>Prestamo agregado a base de datos.</font>";
}
?>

  </body>

</html>