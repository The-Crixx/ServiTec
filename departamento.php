<?php
session_start();
include("conexion.php");

if (!isset($_GET['id'])) {
    die("ID de departamento no especificado.");
}

$id = $_GET['id'];

try {
    $query = "SELECT * FROM departamento WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $departamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$departamento) {
        die("Departamento no encontrado.");
    }

    // Obtener comentarios del departamento
    $queryComentarios = "SELECT * FROM comentarios WHERE id_dep = ? ORDER BY fecha DESC";
    $stmtComentarios = $conn->prepare($queryComentarios);
    $stmtComentarios->execute([$id]);
    $comentarios = $stmtComentarios->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener los datos del departamento: " . $e->getMessage());
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($departamento['nombre']); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1><?php echo htmlspecialchars($departamento['nombre']); ?></h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="principal.php">ServiTec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="principal.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Departamentos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="departamento.php?id=1">Centro de Computo</a>
                            <a class="dropdown-item" href="departamento.php?id=2">Alfabetización de Adultos Mayores</a>
                            <a class="dropdown-item" href="departamento.php?id=3">Huertos Urbanos</a>
                            <a class="dropdown-item" href="departamento.php?id=4">Brigadista</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guia_documentos.php">Guía para Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interes.php">Interés</a>
                    </li>
                    <?php if ($_SESSION['nctrl'] == '21011015'): ?>
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
            <div class="col-md-12">
                <h2><?php echo htmlspecialchars($departamento['nombre']); ?></h2>
                <img src="<?php echo htmlspecialchars($departamento['imagen']); ?>" alt="<?php echo htmlspecialchars($departamento['nombre']); ?>" class="img-fluid">
                <p><?php echo htmlspecialchars($departamento['descripcion']); ?></p>
                <h3>Actividades</h3>
                <p><?php echo htmlspecialchars($departamento['actividades']); ?></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Comentarios</h3>
                <form id="commentForm">
                    <div class="form-group">
                        <label for="comentario">Agregar comentario</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <div id="commentsList" class="mt-4">
                    <?php foreach ($comentarios as $comentario): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($comentario['nombre']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($comentario['fecha']); ?></h6>
                                <p class="card-text"><?php echo htmlspecialchars($comentario['comentario']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#commentForm').submit(function(event) {
                event.preventDefault();
                var comentario = $('#comentario').val();
                var departamento_id = <?php echo $id; ?>;
                var nctrl = '<?php echo $_SESSION['nctrl']; ?>';
                var nombre = '<?php echo $_SESSION['username']; ?>';

                $.ajax({
                    url: 'add_comment.php',
                    method: 'POST',
                    data: {
                        id_dep: departamento_id,
                        nctrl: nctrl,
                        nombre: nombre,
                        comentario: comentario
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert('Comentario agregado correctamente');
                            location.reload();
                        } else {
                            alert('Error al agregar el comentario: ' + response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error al agregar el comentario: ' + textStatus);
                    }
                });
            });
        });
    </script>
</body>
</html>