<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nctrl = $_POST['nctrl'];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    $id_dep = $_POST['id_dep'];
    $comentario = $_POST['comentario'];

    try {
        $query = "DELETE FROM comentarios WHERE nctrl = ? AND nombre = ? AND departamento = ? AND id_dep = ? AND comentario = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nctrl, $nombre, $departamento, $id_dep, $comentario]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }

    $conn = null;
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>