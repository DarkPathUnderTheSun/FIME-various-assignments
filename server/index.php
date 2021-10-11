<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <ul>
            <li>
                <div class="image"></div><div style=”clear:both”></div>
            </li>
        </ul>
        <br><br><br><br><br>
        <h3>Ingrese sus credenciales</h3><br>
        <div class="login">
            <form id="login" method="get" action="login.php">
                <label>
                    <b>
                        Nombre de usuario
                    </b>
                </label>
                <br>
                <input type="text" name="Uname" id="Uname" placeholder="Usuario">
                <br><br>
                <label>
                    <b>
                        Contraseña
                    </b>
                </label>
                <br>
                <input type="Password" name="Pass" id="Pass" placeholder="Contraseña">
                <br><br>
                <div class="center">
                <input type="button" name="log" id="log" value="Iniciar Sesion">
                    </div>
                    <br>
                    <input type="checkbox" id="check">
                    <span>Recordarme</span>
                <br><br>
            </form>
        </div>
    </body>
</html>
