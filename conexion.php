<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servitec";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$conn->set_charset("utf8");
*/
?>

<?php
try {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto web";

    $conn = new PDO("mysql:host=localhost;dbname=servitec",$username,$password,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    // Establecer el modo de errores a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>