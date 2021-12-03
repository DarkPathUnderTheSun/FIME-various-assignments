<head>
<title>Grafica Temperatura</title>
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








<h3>Generar gráfica de termómetro</h3><br>
<div class="temperatura">
    <form id="temperatura" method="POST">
        <label><b>Numero Empleado</b><br>
        </label>
        <input type="number" name="employeeNumber" id="employeeNumber">
        <br><br>
		<input type="checkbox" id="soloExcedentes" name="soloExcedentes" value="1">
        <label for="soloExcedentes">Solo temperaturas mayores a 37 grados</label><br>
		<br>
        <label><b>Fecha Inicial</b><br>
        <input type="date" name="startDate" id="startDate">
        <br>
        <br>
        <label><b>Fecha Final</b><br>
        <input type="date" name="endDate" id="endDate">
        <br><br>
        <input type="submit" name="getGraph" id="getGraph" value="Aceptar">
        <br><br>
    </form>
</div>
</body>
</html>


<?php
if (isset($_POST['getGraph'])) {

    if(isset($_POST['soloExcedentes']) && $_POST['soloExcedentes'] == '1') 
    {
        $onlyAbove37 = "1";
    }
    else
    {
        $onlyAbove37 = "0";
    }	 



	$fileFlag = fopen("graph.json", "w") or die("Unable to reach grapher server!");
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$employeeNumber = $_POST['employeeNumber'];
	$fileContents = '{
    "db": "temp",
	"startDate":"'.$startDate.'",
	"endDate":"'.$endDate.'",
	"employeeNumber":"'.$employeeNumber.'",
    "onlyAbove37":"'.$onlyAbove37.'"
}';
	fwrite($fileFlag, $fileContents);
	fclose($fileFlag);
	sleep(1);
}
if (file_exists("graph.png")) {
    echo('<div  align="center">');
	echo('<img src="graph.png" alt="grafica"><br>');
    echo('<a class="download" href="graph.png" download="graph">');
    echo('<button type="button">Download</button></a>');
    echo('</div>');
}

?>
