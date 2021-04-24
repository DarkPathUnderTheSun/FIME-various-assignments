<!DOCTYPE html>
<html>



<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<meta name="viewport" content="width= device-width, user-scalabe=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">


<div class="topnav">
  <a href="index.php">Pagina Principal
  <br>  
  <img src="media/home.png" alt="Home">
  </a>

  <a class="active" href="agregar_herramienta.php">Agregar Herramientas
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
  <a href="Mantenimientos.php">Mantenimientos
    <br>
    <img src="media/maint.png" alt="new">
  </a>
</div>

<title>Agregar herramienta</title>


  <style>
  input[type=text] {
    padding: 10px;
    border: 2px solid #1c87c9;
    border-radius: 5px;
    background-color: #e5e5e5;
    text-align: left;
    color:black;

  }

  input[type=submit] {
    width: 50%;
    padding: 10px;
    border: 2px solid black;
    border-radius: 5px;
    background-color: #e5e5e5;
    text-align: center;
    color:black;
    font-size: 20px;
  }
  </style>
</head>

<title>DB Handler</title>

<h1>Agregar Herramienta</h1>

<br>
<br>

<form action="" method="post" name="Agregar">
  <table width="25%" border="0">
  <form action="formulario-contacto.php" method="post">	
				<input name="item_name" type="text" placeholder="Nombre de herramienta" maxlength="80" pattern="[a-zA-Z0-9]+" required autofocus/>
				<input name="location" type="text" placeholder="Ubicacion" required />	
        <input name="who_has_it" type="text" placeholder="Quien la tiene?" required />	
        <input name="marca" type="text" placeholder="Marca" required />	
        <input name="modelo" type="text" placeholder="Modelo" required />	
				
				<button id="enviar" name="Submit" value="Agregar" class="btn">Agregar</button>

      </form>	
<!--   <tbody>
      <tr>
        <td>Nombre</td>
        <td><input type="text" name="item_name"></td>
      </tr>
      <tr>
        <td>Ubicacion</td>
        <td><input type="text" name="location"></td>
      </tr>
      <tr>
        <td>Quien la tiene?</td>
        <td><input type="text" name="who_has_it"></td>
      </tr>
      <tr>
        <td>Marca</td>
        <td><input type="text" name="marca"></td>
      </tr>
      <tr>
        <td>Modelo</td>
        <td><input type="text" name="modelo"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Agregar"></td>
      </tr>
    </tbody>
  </table>
</form>-->

<a href="index.php">
<img src="media/back.png" alt="Regresar" style="width:42px;height: 42px;"></a>
<p>Cancelar</p>


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