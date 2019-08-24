<?php

//Directorio
$dir = getcwd();
$directorio = opendir($dir);
$archivos = array();
$carpetas = array();
//Carpetas y Archivos a excluir
$excluir = array('.', '..', 'index.php', 'favicon.ico', 'folder.png', 'file.png', '.dropbox.cache', '.dropbox', '.idea');
while ($f = readdir($directorio)) {
    if (is_dir("$dir/$f") && !in_array($f, $excluir)) {
        $carpetas[] = $f;
    } else if (!in_array($f, $excluir)) {
        //No es una carpeta, por ende lo mandamos a archivos
        $archivos[] = $f;
    }
}
closedir($directorio);
sort($carpetas, SORT_NATURAL | SORT_FLAG_CASE);
sort($archivos, SORT_NATURAL | SORT_FLAG_CASE);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Localhost</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>


<!-- Dropdown Structure -->
<!--
<ul id="dropdown1" class="dropdown-content">
    <li><a href="apache_status.php">status</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
</ul>-->
<nav>
    <div class="nav-wrapper black">
        <a class="brand-logo center"><img src="logo.png" style="width:10%;"> </a>
        <!--<ul class="right hide-on-med-and-down">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Apache<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>-->
    </div>
</nav>


<body>
<div class="container">
    <br>


    <h1 class="align-content-center">Proyectos</h1>
    <div class="row">
        <div class="col">
            <?php
            //Mostrar Carpetas
            $i = 1;
            foreach ($carpetas as $c) {
                echo '<p class="carpeta"><a href="' . $c . '" class="waves-effect waves-light btn deep-purple darken-4">' . $c . '</a></p>';
                if (($i % 6) == 0 && ($i % 18) != 0) {
                    echo '</div><div class="col">';
                }
                if (($i % 18) == 0) {
                    echo '</div></div><div class="row"><div class="col">';
                }
                $i++;
            }
            ?>
        </div>
    </div>
    <!--
    <h1>Archivos</h1>
    <div class="fondo">
        <div class="row">
            <div class="col">
                <?php
                //Mostrar Archivos
                $i = 1;
                foreach ($archivos as $a) {
                    echo '<p class="archivo"><a href="' . $a . '" class="waves-effect waves-light btn deep-purple darken-4">' . $a . '</a></p>';
                    if (($i % 6) == 0 && ($i % 18) != 0) {
                        echo '</div><div class="col">';
                    }
                    if (($i % 18) == 0) {
                        echo '</div></div><div class="row"><div class="col">';
                    }
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>-->


</div>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="materialize.js"></script>
<script>$(".dropdown-trigger").dropdown();</script>
</body>
</html>


