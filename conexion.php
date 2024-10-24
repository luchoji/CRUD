<?php
// Configuración de la conexión a MySQL
$host = "localhost"; // Pon aquí el nombre o IP de tu servidor MySQL
$port = "3306"; // Especifica el puerto 
$user = "root"; // Usuario de la base de datos MySQL
$password = ""; // Contraseña de MySQL (en XAMPP suele ser vacío por defecto)
$database = "bd"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos MySQL";
}
?>
