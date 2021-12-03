<a href="adminpage.php">back to admin</a>
<br><br>
<form method="post">
	<input type="date" name="startDate" id="startDate">
	<input type="date" name="endDate" id="endDate" value="<?php echo(date('Y-m-d')); ?>">
	<input type="number" name="employeeNumber" id="employeeNumber" value="<?php echo(date('Y-m-d')); ?>">
    <input type="submit" name="getGraph" id="getGraph" value="RUN" /><br/>
</form>



<?php

if (isset($_POST['getGraph'])) {
	$fileFlag = fopen("graph.json", "w") or die("Unable to reach grapher server!");
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$part = $_POST['employeeNumber'];
	$fileContents = '{
	"startDate":"'.$startDate.'",
	"endDate":"'.$endDate.'",
	"employeeNumber":"'.$part.'"
}';
	fwrite($fileFlag, $fileContents);
	fclose($myfile);
	sleep(1);
}

if (file_exists("graph.png")) {
	echo('<img src="graph.png" alt="grafica">');
}

?>


