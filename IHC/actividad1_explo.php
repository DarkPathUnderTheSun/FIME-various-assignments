<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="css/lenguajes.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="menu exploracion">
            <div>
                <a href="menu.php"><i class="fas fa-home"></i></a>
                <a href="matematicas.php"><i class="fas fa-arrow-left"></i></a>      
            </div>
            <label><i class="fas fa-calculator"></i>&nbsp;Comprension del Mundo Natural</label>
        </nav>
        <div class="contenedor exploracion">
           <h4>Actividad 1.</h4>
           <span>Observe y encierre la opcion que corresponde al dia de hoy.</span>
           <div class="center-flex">
                <canvas id="pizarra" width="325px" height="325px"></canvas>
                <ul>
                    <a id="refrescar"><i class="fas fa-refresh"></i></a>
                    <li><a style="color:black"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:orange"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:yellow"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:red"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:blue"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:green"><i class="fas fa-paint-brush"></i></a></li>
                </ul>
                <form method="post">
                    <input class= "zubmitExp" type="submit" name="test" id="test" value="Entregar" /><br/>
                </form>
            </div>
        </div>
    </body>
    <script src="js/actividad1_len.js"></script>
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
if (isset($_POST['test'])) {
  // if the log in button is pressed:
  $uname = $_COOKIE[loggedUsername];
  $query_string = "update actividades set exp_act_1 = 100 where username = '{$uname}'";
  $db->query($query_string);
}

?>