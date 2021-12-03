<head>
<title>Captura Calidad</title>
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
            <a class="vertical-center" href="graficaCalidad.php">Graficar Calidad</a>
        </li>
    </ul>










    <br><br><br><br><br>
<h3>Capture las medidas de la pieza BR-123</h3><br>
<div class="temperatura">
    <form id="temperatura" method="POST">
        <label><b>Diámetro 1 Interno</b><br>
        </label>
        <input type="number" step="any" name="innerDiameter1" id="innerDiameter1" placeholder="Milímetros">
        <br><br>
        <label><b>Diámetro 1 Externo</b><br>
        </label>
        <input type="number" step="any" name="outerDiameter1" id="outerDiameter1" placeholder="Milímetros">
        <br><br>
        <label><b>Diámetro 2 Interno</b><br>
        </label>
        <input type="number" step="any" name="innerDiameter2" id="innerDiameter2" placeholder="Milímetros">
		<br><br>
        <label><b>Diámetro 2 Externo</b><br>
        </label>
        <input type="number" step="any" name="outerDiameter2" id="outerDiameter2" placeholder="Milímetros">
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
  $innerDiameter1 = $_POST['innerDiameter1'];
  $outerDiameter1 = $_POST['outerDiameter1'];
  $outerDiameter2 = $_POST['outerDiameter2'];
  $innerDiameter2 = $_POST['innerDiameter2'];

  if (($innerDiameter1==NULL)||($outerDiameter1==NULL)||($outerDiameter2==NULL)||($innerDiameter2==NULL)){
    echo '<script language="javascript"> alert("No se permite subir formulario con datos vacios")</script>';
    die();
  }



  $query_string = "INSERT INTO qualityData VALUES ({$innerDiameter1}, {$outerDiameter1}, {$innerDiameter2}, {$outerDiameter2}, NOW())";
  $db->query($query_string);
  
}

?>
