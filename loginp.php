<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include("conexion.php");

$nctrl = $_POST['nctrl']; 
$password = $_POST['contraseña'];

try {
    $Query = "SELECT * FROM usuarios WHERE nctrl = ?";
    $stmt = $conn->prepare($Query);
    $stmt->execute([$nctrl]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener la fila de resultados
        
        // Verificar la contraseña
        if ($password == $row["contraseña"]) {
            // Verificar si es el administrador
            if ($nctrl == '21011015' && $password == 'admin') {
                $_SESSION['username'] = $row['nombre'];
                header("Location: admin.php"); // Redirigir a la página de administrador
                exit; // Finalizar el script después de redirigir
            } else {
                // Contraseña correcta: Iniciar sesión y establecer variables de sesión
                $_SESSION['username'] = $row['nombre'];
                header("Location: principal.php"); // Redirigir a la página principal después de iniciar sesión
                exit; // Finalizar el script después de redirigir
            }
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta'); window.location.href='login.php';</script>";
        }
    } else {
        // Usuario no encontrado
        echo "<script>alert('Usuario no encontrado'); window.location.href='login.php';</script>";
    }
} catch (PDOException $e) {
    die("Error al ejecutar la consulta: " . $e->getMessage());
}

$conn = null;
?>