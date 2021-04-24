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
          <td>ID de Herramienta</td>
          <td><input type="text" name="item_id"></td>
        </tr>
        <tr>
          <td>A quien se presta</td>
          <td><input type="text" name="a_quien"></td>
        </tr>
        <tr>
          <td>A donde va</td>
          <td><input type="text" name="location"></td>
        </tr>
        <tr>
          <td>Fecha en que se presta</td>
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
  $result = mysqli_query($cser, "INSERT INTO example.prestamos(item_id,a_quien,fecha_prestamo) VALUES('$item_id','$a_quien','$fecha_prestamo')");
  $update = mysqli_query($cser, "UPDATE example.tools SET location='$location', who_has_it='$a_quien' WHERE item_id='$item_id'");
  echo "<font color='green'>Prestamo agregado a base de datos.</font>";
}
?>

  </body>

</html>