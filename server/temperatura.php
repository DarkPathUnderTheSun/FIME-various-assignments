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
    <form id="temperatura" method="get" action="temperatura.php">
        <label><b>Temperatura</b><br>
        </label>
        <input type="text" name="Temp" id="Temp" placeholder="Exprese en centigrados">
        <br><br>
        <label><b>Numero Empleado</b><br>
        </label>
        <input type="text" name="NoEmpleado" id="NoEmpleado" placeholder="No. Empleado">
        <br><br>
		<select name="inout" id="inout">
        <option value="Entra">Entra</option>
        <option value="Sale">Sale</option>
        </select>
		<br><br>
        <input type="button" name="log" id="log" value="Aceptar">
        <br><br>
    </form>
</div>
</body>
</html>
