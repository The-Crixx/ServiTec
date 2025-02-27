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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .card {
            height: 100%;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Bienvenido a ServiTec, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">ServiTec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="principal.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Departamentos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="centro_computo.php">Centro de Computo</a>
                            <a class="dropdown-item" href="alfabetizacion.php">Alfabetización de Adultos Mayores</a>
                            <a class="dropdown-item" href="huertos_urbanos.php">Huertos Urbanos</a>
                            <a class="dropdown-item" href="brigadista.php">Brigadista</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guia_documentos.php">Guía para Documentos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <!-- Tarjeta Centro de Computo -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/centro_computo.jpg" class="card-img-top" alt="Centro de Computo">
                    <div class="card-body">
                        <h5 class="card-title">Centro de Computo</h5>
                        <p class="card-text">Información sobre el Centro de Computo.</p>
                        <a href="centro_computo.php" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Alfabetización de Adultos Mayores -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/alfabetizacion.jpg" class="card-img-top" alt="Alfabetización de Adultos Mayores">
                    <div class="card-body">
                        <h5 class="card-title">Alfabetización de Adultos Mayores</h5>
                        <p class="card-text">Información sobre la Alfabetización de Adultos Mayores.</p>
                        <a href="alfabetizacion.php" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Huertos Urbanos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/huertos_urbanos.jpg" class="card-img-top" alt="Huertos Urbanos">
                    <div class="card-body">
                        <h5 class="card-title">Huertos Urbanos</h5>
                        <p class="card-text">Información sobre los Huertos Urbanos.</p>
                        <a href="huertos_urbanos.php" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Brigadista -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/brigadista.jpg" class="card-img-top" alt="Brigadista">
                    <div class="card-body">
                        <h5 class="card-title">Brigadista</h5>
                        <p class="card-text">Información sobre el trabajo de Brigadista.</p>
                        <a href="brigadista.php" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Guía para Documentos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/guia_documentos.jpg" class="card-img-top" alt="Guía para Documentos">
                    <div class="card-body">
                        <h5 class="card-title">Guía para Documentos</h5>
                        <p class="card-text">Información sobre la guía para documentos necesarios.</p>
                        <a href="guia_documentos.php" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>