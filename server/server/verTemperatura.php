<head>
<title>Ver Temperatura</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<!DOCTYPE html>
<html>
<body>
    <ul>
        <li>
            <div class="image"></div><div style=”clear:both”></div>
        </li>
        <li>
            <a class="vertical-center" href="graficaTemperatura.php">Gráfica de Temperatura</a>
        </li>
    </ul>








<h3>Busqueda de registros de temperatura</h3><br>
<div class="temperatura">
    <form id="temperatura" method="POST">
        <label><b>Numero Empleado</b><br>
        </label>
        <input type="text" name="noEmpleado" id="noEmpleado" placeholder="No. Empleado">
        <br><br>
		<input type="checkbox" id="soloExcedentes" name="soloExcedentes" value="soloExcedentes">
        <label for="soloExcedentes">Solo temperaturas mayores a 37 grados</label><br>
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
  $noEmpleado = $_POST['noEmpleado'];
  $soloExcedentes = $_POST['soloExcedentes'];

  if (($noEmpleado == NULL)&&($soloExcedentes == NULL)) {
      // echo "ambos vacios";
      $query_string = "SELECT * FROM covid_thermometer, employees WHERE employees.emp_number = covid_thermometer.person";

      $temperatureData = $db->query($query_string)->fetchAll();
      echo "<br>";
      echo "<br>";
      echo "<table class='center'>";
      echo "<tr>";
      echo "<th>Temperatura</th>";
      echo "<th>No. Empleado</th>";
      echo "<th>Nombre</th>";
      echo "<th>Correo</th>";
      echo "<th>Fecha</th>";
      echo "</tr>";
      foreach ($temperatureData as $temperatureDatum) {
	    echo "<tr>";
        echo "<td> {$temperatureDatum['temp']} </td>";
        echo "<td> {$temperatureDatum['person']} </td>";
        echo "<td> {$temperatureDatum['emp_name']} </td>";
        echo "<td> {$temperatureDatum['emp_email']} </td>";
        echo "<td> {$temperatureDatum['temp_datetime']} </td>";
        echo "</tr>";
      }
      echo "</table>";
  }
  if (($noEmpleado != NULL)&&($soloExcedentes == NULL)) {
      // echo "soloExcedentes vacio";
      $query_string = "SELECT * FROM covid_thermometer, employees WHERE covid_thermometer.person = {$noEmpleado} AND employees.emp_number = covid_thermometer.person";
      $temperatureData = $db->query($query_string)->fetchAll();
      echo "<br>";
      echo "<br>";
      echo "<table class='center'>";
      echo "<tr>";
      echo "<th>Temperatura</th>";
      echo "<th>No. Empleado</th>";
      echo "<th>Nombre</th>";
      echo "<th>Correo</th>";
      echo "<th>Fecha</th>";
      echo "</tr>";
      foreach ($temperatureData as $temperatureDatum) {
	    echo "<tr>";
        echo "<td> {$temperatureDatum['temp']} </td>";
        echo "<td> {$temperatureDatum['person']} </td>";
        echo "<td> {$temperatureDatum['emp_name']} </td>";
        echo "<td> {$temperatureDatum['emp_email']} </td>";
        echo "<td> {$temperatureDatum['temp_datetime']} </td>";
        echo "</tr>";
      }
      echo "</table>";
  }
  if (($noEmpleado == NULL)&&($soloExcedentes != NULL)) {
      // echo "noEmpleado vacio";
      $query_string = "SELECT * FROM covid_thermometer, employees WHERE covid_thermometer.temp > 37 AND employees.emp_number = covid_thermometer.person";
      $temperatureData = $db->query($query_string)->fetchAll();
      echo "<br>";
      echo "<br>";
      echo "<table class='center'>";
      echo "<tr>";
      echo "<th>Temperatura</th>";
      echo "<th>No. Empleado</th>";
      echo "<th>Nombre</th>";
      echo "<th>Correo</th>";
      echo "<th>Fecha</th>";
      echo "</tr>";
      foreach ($temperatureData as $temperatureDatum) {
	    echo "<tr>";
        echo "<td> {$temperatureDatum['temp']} </td>";
        echo "<td> {$temperatureDatum['person']} </td>";
        echo "<td> {$temperatureDatum['emp_name']} </td>";
        echo "<td> {$temperatureDatum['emp_email']} </td>";
        echo "<td> {$temperatureDatum['temp_datetime']} </td>";
        echo "</tr>";
      }
      echo "</table>";
  }
  if (($noEmpleado != NULL)&&($soloExcedentes != NULL)) {
      // echo "ambos llenos";
      $query_string = "SELECT * FROM covid_thermometer, employees WHERE covid_thermometer.temp > 37 AND covid_thermometer.person = {$noEmpleado} AND employees.emp_number = covid_thermometer.person";
      $temperatureData = $db->query($query_string)->fetchAll();
      echo "<br>";
      echo "<br>";
      echo "<table class='center'>";
      echo "<tr>";
      echo "<th>Temperatura</th>";
      echo "<th>No. Empleado</th>";
      echo "<th>Nombre</th>";
      echo "<th>Correo</th>";
      echo "<th>Fecha</th>";
      echo "</tr>";
      foreach ($temperatureData as $temperatureDatum) {
	    echo "<tr>";
        echo "<td> {$temperatureDatum['temp']} </td>";
        echo "<td> {$temperatureDatum['person']} </td>";
        echo "<td> {$temperatureDatum['emp_name']} </td>";
        echo "<td> {$temperatureDatum['emp_email']} </td>";
        echo "<td> {$temperatureDatum['temp_datetime']} </td>";
        echo "</tr>";
      }
      echo "</table>";
  }
}

?>
