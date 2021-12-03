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
            <form id="login" method="POST">
                <label>
                    <b>
                        Nombre de usuario
                    </b>
                </label>
                <br>
                <input type="text" name="uname" id="uname" placeholder="Usuario">
                <br><br>
                <label>
                    <b>
                        Contraseña
                    </b>
                </label>
                <br>
                <input type="Password" name="pass" id="pass" placeholder="Contraseña">
                <br><br>
                <input type="submit" name="log" id="log" value="Iniciar Sesion">
                    <br>
                    <input type="checkbox" id="check">
                    <span>Recordarme</span>
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
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];

  $query_string = "SELECT * FROM employees WHERE emp_email = '{$uname}'";
  $emplyee_data = $db->query($query_string)->fetchArray();
  if ($pass == $emplyee_data['emp_password']){
    if ($emplyee_data['emp_role'] == 'admin'){
        echo "Welcome $uname!";
        header("Location:adminpage.php");
    }
    if ($emplyee_data['emp_role'] == 'guardia'){
        echo "Welcome $uname!";
        header("Location:temperatura.php");
    }
    if ($emplyee_data['emp_role'] == 'RH'){
        echo "Welcome $uname!";
        header("Location:verTemperatura.php");
    }
    if ($emplyee_data['emp_role'] == 'captCalidad'){
        echo "Welcome $uname!";
        header("Location:capturaCalidad.php");
    }
  }
  else{
    echo '<script language="javascript"> alert("Usuario o contraseña incorrectos")</script>';
  }
}

?>
