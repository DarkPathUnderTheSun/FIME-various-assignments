<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="css/actividades.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="menu exploracion">
            <a href="menu.php"><i class="fas fa-home"></i></a>
            <label><i class="fas fa-search"></i>&nbsp;Comprension del Mundo Natural</label>
        </nav>
        <div class="contenedor exploracion">
            <div class="cards">
                <button onclick="window.location.href = 'actividad1_explo.php'" class="card">
                    <span><b>Actividad 1.</b></span>
                    <span>Observa el cielo y encierra la opcion que corresponde al dia de hoy.</span>
                    <img src="img/nubes.png" alt="Opciones de clima">
                    <?php
                    //db connection
                    include 'db.php';
                    $dbhost = 'localhost';
                    $dbuser = 'user';
                    $dbpass = 'password';
                    $dbname = 'yada';
                    $db = new db($dbhost, $dbuser, $dbpass, $dbname);
                    $uname = $_COOKIE[loggedUsername];
                    $query_string = "SELECT exp_act_1 FROM actividades WHERE username = '{$uname}'";
                    $data = $db->query($query_string)->fetchArray();
                    if ($data[exp_act_1] == 100) {
                        echo "✅";
                    }
                    ?>
                </button>
                <button class="card">No disponible</button>
                <button class="card">No disponible</button>
                <button class="card">No disponible</button>
                <button class="card">No disponible</button>
                <button class="card">No disponible</button>
            </div>
        </div>
    </body>
</html>