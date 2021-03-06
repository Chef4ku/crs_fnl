<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Titulo</title>
</head>

<body>
    <header class="container">
        <nav id="primary-nav">
            <ul>
                <li><a href="index.php?path=inicio">Inicio</a></li>
                <li><a href="index.php?path=login">Login</a></li>
                <li><a href="index.php?path=signup">Signup</a></li>
                <li><a href="index.php?path=salir">Salir</a></li>
            </ul>
        </nav>
        <hr>
    </header>
    <section id="content">
        <?php
        if (isset($_GET["path"])) {
            if (
                $_GET["path"] == "signup" ||
                $_GET["path"] == "login" ||
                $_GET["path"] == "inicio" ||
                $_GET["path"] == "editar" ||
                $_GET["path"] == "salir"
            ) {
                include "paginas/" . $_GET["path"] . ".php";
            } else {
                include "paginas/error404.php";
            }
        } else {
            include "paginas/signup.php";
        }
        ?>
    </section>

    <br>
    <hr>
    <br>

    <footer>
        <span class="iconify" data-icon="logos:github-icon"></span>
        <a href="https://github.com/Chef4ku/crs_fnl" target="_blank"> Repositorio Github</a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="vistas/js/script.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>