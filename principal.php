<?php
    session_start();
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiTec</title>
</head>
<body>
    <header>
        <h1>Bienvenido <?php printf($_SESSION["username"]); ?> a ServiTec</h1>
        <nav>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </nav> 
    </header>
</body>
</html>