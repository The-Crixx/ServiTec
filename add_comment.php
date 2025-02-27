<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_dep = $_POST['id_dep'];
    $nctrl = $_POST['nctrl'];
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];

    try {
        $query = "INSERT INTO comentarios (id_dep, nctrl, nombre, comentario) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id_dep, $nctrl, $nombre, $comentario]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }

    $conn = null;
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>