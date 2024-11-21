<?php
// Archivo de configuración para la conexión a la base de datos

$host = 'localhost'; // Dirección del servidor de la base de datos
$dbname = 'BarberiaDB'; // Nombre de la base de datos
$username = 'root'; // Nombre de usuario de la base de datos
$password = ''; // Contraseña de la base de datos

try {
    // Crear conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establecer el modo de errores
} catch (PDOException $e) {
    // Mostrar error si la conexión falla
    echo 'Error de conexión: ' . $e->getMessage();
}
?>
