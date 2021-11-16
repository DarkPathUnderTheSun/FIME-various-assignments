<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <title>Menu Principal</title>
        <link rel="stylesheet" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="menu">
            <img src="img/logo.png" alt="Logo de aplicacion">
            <ul>
                <?php
                    $firstName = $_COOKIE[loggedUser];
                    if ($firstName == 'Roberta') {echo '<li><img src="img/user.jpg" alt="Imagen de usuario"></li>';}
                    if ($firstName == 'Juan') {echo '<li><img src="img/userJuan.jpg" alt="Imagen de usuario"></li>';}
                    echo "<li>Hola {$firstName}!</li>";
                ?>
              
            </ul>
        </nav>
        <div class="contenedor">
            <div class="lenguaje">
                <img src="img/lenguaje.jpg" alt="Lenguaje y Comunicacion">
                <button onclick="redirigir('lenguaje')">Lenguaje y Comunicacion</button>
            </div>
            <div class="matematicas">
                <img src="img/matematicas.jpg" alt="Pensamiento Matematico">
                <button onclick="redirigir('matematicas')">Pensamiento Matematico</button>
            </div>
            <div class="exploracion">
                <img src="img/exploracion.jpg" alt="Comprension del Mundo Natural">
                <button onclick="redirigir('exploracion')">Comprension del Mundo Natural</button>
            </div>
        </div>
        <footer></footer>
    </body>
    <script src="js/menu.js"></script>
</html>


<?php
// echo $_COOKIE[loggedUser];
?>