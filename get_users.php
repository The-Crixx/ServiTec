<?php
include("conexion.php");

try {
    $query = "SELECT nctrl, nombre, apellidos, carrera, cred FROM usuarios";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn = null;
?>