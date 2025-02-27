<?php
include("conexion.php");

$response = array();

if (isset($_POST['nctrl']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['carrera']) && isset($_POST['cred']) && isset($_POST['contraseña'])) {
    $nctrl = $_POST['nctrl'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $carrera = $_POST['carrera'];
    $cred = $_POST['cred'];
    $contraseña = $_POST['contraseña'];

    try {
        $query = "INSERT INTO usuarios (nctrl, nombre, apellidos, carrera, cred, contraseña) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nctrl, $nombre, $apellidos, $carrera, $cred, $contraseña]);

        if ($stmt->rowCount() > 0) {
            $response['success'] = true;
        } else {
            $response['error'] = 'No se pudo agregar el usuario';
        }
    } catch (PDOException $e) {
        $response['error'] = $e->getMessage();
    }
} else {
    $response['error'] = 'Todos los campos son obligatorios';
}

header('Content-Type: application/json');
echo json_encode($response);
$conn = null;
?>