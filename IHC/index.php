<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form class="contenedor"  method="POST">
            <img src="img/userIcon.png" alt="Imagen de Usuario">
            <input type="text" name="usuario" placeholder="Nombre de Usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input class= "zubmit" type="submit" name="log" id="log" value="Iniciar Sesion">
        </form>
    </body>
</html>

<?php

//db connection
include 'db.php';
$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'password';
$dbname = 'yada';
$db = new db($dbhost, $dbuser, $dbpass, $dbname);


//post
if (isset($_POST['log'])) {
  // if the log in button is pressed:
  $uname = $_POST['usuario'];
  $pass = $_POST['password'];

  $query_string = "SELECT * FROM users WHERE username = '{$uname}'";
  $user_data = $db->query($query_string)->fetchArray();
  $firstName = $user_data['firstname'];
  if (($pass == $user_data['password']) and ($pass != '')){
    echo "Welcome $uname!";
    setcookie(loggedUser, $firstName);
    setcookie(loggedUsername, $uname);
    header("Location:menu.php");
  }
  else{
    echo '<script language="javascript"> alert("Usuario o contraseña incorrectos")</script>';
  }
}

?>
