<?php
include("conexion.php");

$response = array();

if (isset($_POST['nctrl'])) {
    $nctrl = $_POST['nctrl'];

    try {
        $query = "DELETE FROM usuarios WHERE nctrl = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nctrl]);

        if ($stmt->rowCount() > 0) {
            $response['success'] = true;
        } else {
            $response['error'] = 'No se encontró el usuario';
        }
    } catch (PDOException $e) {
        $response['error'] = $e->getMessage();
    }
} else {
    $response['error'] = 'Número de control no proporcionado';
}

header('Content-Type: application/json');
echo json_encode($response);
$conn = null;
?>