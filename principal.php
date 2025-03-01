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
    <link rel="stylesheet" href="css/prin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Bienvenido a ServiTec, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="principal.php">ServiTec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Departamentos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="departamento.php?id=dp1">Centro de Computo</a>
                            <a class="dropdown-item" href="departamento.php?id=dp2">Alfabetización de Adultos Mayores</a>
                            <a class="dropdown-item" href="departamento.php?id=dp3">Huertos Urbanos</a>
                            <a class="dropdown-item" href="departamento.php?id=dp4">Brigadista</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guia_documentos.php">Guía para Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interes.php">Interés</a>
                    </li>
                    <?php if (isset($_SESSION['nctrl']) && $_SESSION['nctrl'] == '21011015'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                        </a>
                        <div class="dropdown-menu" aria-labelledby="adminDropdown">
                            <a class="dropdown-item" href="admin.php">Usuario</a>
                            <a class="dropdown-item" href="comentarios.php">Comentarios</a>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
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
                    <img src="img/lab.jpeg" class="card-img-top" alt="Centro de Computo">
                    <div class="card-body">
                        <h5 class="card-title">Centro de Computo</h5>
                        <p class="card-text">Información sobre el Centro de Computo.</p>
                        <a href="dlab.html" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Alfabetización de Adultos Mayores -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="img/ivea.png" class="card-img-top" alt="Alfabetización de Adultos Mayores">
                    <div class="card-body">
                        <h5 class="card-title">Alfabetización de Adultos Mayores</h5>
                        <p class="card-text">Información sobre la Alfabetización de Adultos Mayores.</p>
                        <a href="divea.html" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Huertos Urbanos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="img/huertos.jpeg" class="card-img-top" alt="Huertos Urbanos">
                    <div class="card-body">
                        <h5 class="card-title">Huertos Urbanos</h5>
                        <p class="card-text">Información sobre los Huertos Urbanos.</p>
                        <a href="dhuert.html" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Brigadista -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="img/brigadas.png" class="card-img-top" alt="Brigadista">
                    <div class="card-body">
                        <h5 class="card-title">Brigadista</h5>
                        <p class="card-text">Información sobre el trabajo de Brigadista.</p>
                        <a href="dbrig.html" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta Guía para Documentos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="img/docs.jpg" class="card-img-top" alt="Guía para Documentos">
                    <div class="card-body">
                        <h5 class="card-title">Guía para Documentos</h5>
                        <p class="card-text">Información sobre la guía para documentos necesarios.</p>
                        <a href="docs.html" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>