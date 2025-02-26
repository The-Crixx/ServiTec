<?php
include("conexion.php");

if (isset($_GET['nctrl'])) {
    $nctrl = $_GET['nctrl'];

    try {
        $query = "SELECT * FROM usuarios WHERE nctrl = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nctrl]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Usuario no encontrado";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error al obtener los datos del usuario: " . $e->getMessage();
        exit;
    }
} else {
    echo "Número de control no proporcionado";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $carrera = $_POST['carrera'];
    $cred = $_POST['cred'];

    try {
        $query = "UPDATE usuarios SET nombre = ?, apellidos = ?, carrera = ?, cred = ? WHERE nctrl = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nombre, $apellidos, $carrera, $cred, $nctrl]);

        echo "Usuario actualizado correctamente";
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al actualizar el usuario: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($user['apellidos']); ?>" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" class="form-control" id="carrera" name="carrera" value="<?php echo htmlspecialchars($user['carrera']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cred">Créditos:</label>
                <input type="number" class="form-control" id="cred" name="cred" value="<?php echo htmlspecialchars($user['cred']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>