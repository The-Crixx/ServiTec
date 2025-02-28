<?php
require 'conexion.php';
session_start();

if (!isset($_SESSION['nctrl'])) {
    echo "<script>alert('Error: Sesión no iniciada.'); window.location.href='login.html';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departamento = $_POST['departamento'];
    $nctrl = $_SESSION['nctrl'];
    $return_url = $_POST['return_url'];

    if (!empty($departamento) && !empty($nctrl)) {
        $sql = "INSERT INTO interes (departamento, nctrl) VALUES (:departamento, :nctrl)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':nctrl', $nctrl);

        if ($stmt->execute()) {
            echo "<script>alert('Interés registrado con éxito.'); window.location.href='$return_url';</script>";
        } else {
            echo "<script>alert('Error al registrar el interés.'); window.location.href='$return_url';</script>";
        }
    } else {
        echo "<script>alert('Datos incompletos.'); window.location.href='$return_url';</script>";
    }
}
?>
