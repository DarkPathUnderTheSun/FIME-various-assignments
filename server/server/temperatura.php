<head>
<title>Captura Temperatura</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<!DOCTYPE html>
<html>
<body>
    <ul>
        <li>
            <div class="image"></div><div style=”clear:both”></div>
        </li>
    </ul>





    <br><br><br><br><br>
<h3>Capture la temperatura corporal y numero de empleado</h3><br>
<div class="temperatura">
    <form id="temperatura" method="POST">
        <label><b>Temperatura</b><br>
        </label>
        <input type="text" name="temp" id="temp" placeholder="Exprese en centigrados">
        <br><br>
        <label><b>Numero Empleado</b><br>
        </label>
        <input type="text" name="noEmpleado" id="noEmpleado" placeholder="No. Empleado">
        <br><br>
		<select name="inout" id="inout">
        <option value="Entra">Entra</option>
        <option value="Sale">Sale</option>
        </select>
		<br><br>
        <input type="submit" name="log" id="log" value="Aceptar">
        <br><br>
    </form>
</div>
</body>
</html>

<?php

//working db connection
include 'db.php';
$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'password';
$dbname = 'yada';
$db = new db($dbhost, $dbuser, $dbpass, $dbname);

//working post
if (isset($_POST['log'])) {
  // Execute this code if the submit button is pressed.
  $temp = $_POST['temp'];
  $noEmpleado = $_POST['noEmpleado'];
  $inout = $_POST['inout'];

  if ($inout == "Entra"){
      $inout = 0;
  }
  else{
    $inout = 1;
  }

  if (($temp==NULL)||($noEmpleado==NULL)){
    echo '<script language="javascript"> alert("No se permite subir formulario con datos vacios")</script>';
    die();
  }


  $query_string = "INSERT INTO covid_thermometer VALUES ({$noEmpleado}, {$temp}, NOW(), {$inout})";
  $db->query($query_string);
  
}

?>
