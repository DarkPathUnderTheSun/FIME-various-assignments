<head>
<title>Grafica Calidad</title>
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
            <a class="vertical-center" href="capturaCalidad.php">Capturar Calidad</a>
        </li>
    </ul>









<h3>Generar gráfica de calidad</h3><br>
<div class="temperatura">
    <form id="temperatura" method="POST">
        <label><b>Fecha Inicial</b><br>
        <input type="date" name="startDate" id="startDate">
        <br><br>
        <label><b>Fecha Final</b><br>
        <input type="date" name="endDate" id="endDate">
        <br><br>
        <label><b>Tipo de Análisis</b><br>
        <select name="method" id="method">
        <option value="bollinger">Bollinger</option>
        <option value="fuzzyLogic">Tolerancias</option>
        </select>
        <br><br>
        <label><b>Datos a Graficar</b><br>
        <select name="measureType" id="measureType">
        <option value="inner1">Diametro Interno 1</option>
        <option value="outer1">Diametro Externo 1</option>
        <option value="inner2">Diametro Interno 2</option>
        <option value="outer2">Diametro Externo 2</option>
        </select>
        <br><br>
        <input type="submit" name="getGraph" id="getGraph" value="Aceptar">
        <br><br>
    </form>
</div>
</body>
</html>


<?php
if (isset($_POST['getGraph'])) {
	$fileFlag = fopen("graph.json", "w") or die("Unable to reach grapher server!");
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$method = $_POST['method'];
    $measureType = $_POST['measureType'];
	$fileContents = '{
    "db": "quality",
	"startDate":"'.$startDate.'",
	"endDate":"'.$endDate.'",
    "measureType":"'.$measureType.'",
	"analysisType":"'.$method.'"
}';
	fwrite($fileFlag, $fileContents);
	fclose($fileFlag);
	sleep(1);
}
if (file_exists("qualityGraph.png")) {
    echo('<div  align="center">');
	echo('<img src="qualityGraph.png" alt="grafica"><br>');
    echo('<a class="download" href="qualityGraph.png" download="graph">');
    echo('<button type="button">Download</button></a>');
    echo('</div>');
}

?>
