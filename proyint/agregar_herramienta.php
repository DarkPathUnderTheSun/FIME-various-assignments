<!DOCTYPE html>
<html>

<head>
  <style>
  input[type=text] {
    padding: 10px;
    border: 2px solid #1c87c9;
    border-radius: 5px;
    background-color: #e5e5e5;
    text-align: center;
  }

  input[type=submit] {
    width: 50%;
    padding: 10px;
    border: 2px solid #1c87c9;
    border-radius: 5px;
    background-color: #e5e5e5;
    text-align: center;
  }
  </style>
</head>

<title>DB Handler</title>

<h1>Agregar Herramienta</h1>
<a href="http://localhost:8000/index.php">Regresar</a>
<br>
<br>

<form action="" method="post" name="form1">
  <table width="25%" border="0">
    <tbody>
      <tr>
        <td>nombre</td>
        <td><input type="text" name="item_name"></td>
      </tr>
      <tr>
        <td>ubicacion</td>
        <td><input type="text" name="location"></td>
      </tr>
      <tr>
        <td>quien la tiene?</td>
        <td><input type="text" name="who_has_it"></td>
      </tr>
      <tr>
        <td>marca</td>
        <td><input type="text" name="marca"></td>
      </tr>
      <tr>
        <td>modelo</td>
        <td><input type="text" name="modelo"></td>
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
  $item_name = $_POST['item_name'];
  $location = $_POST['location'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $who_has_it = $_POST['who_has_it'];
  if(empty($item_name) || empty($location) || empty($who_has_it) || empty($marca) || empty($modelo) ){                
    echo "<font color='red'>Tienes que llenar todos los campos.</font><br>";
    }
    else { 
    $result = mysqli_query($cser, "INSERT INTO example.tools(item_name,location,who_has_it,marca,modelo) VALUES('$item_name','$location','$who_has_it','$marca','$modelo')");
    echo "<font color='green'>Herramienta agregada a base de datos.</font>";
    }
}
?>

</html>