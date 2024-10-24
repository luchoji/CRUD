<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el formulario ha sido enviado (si se recibió el método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos enviados a través del formulario
    $nombre_completo = $_POST['nombre_completo'];
    $direccion = $_POST['direccion'];
    $observacion = $_POST['observacion'];

    // Preparar la llamada al procedimiento almacenado
    $sql = "CALL InsertarDatos(?, ?, ?)";

    // Preparar la sentencia para evitar inyecciones SQL
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Vincular los parámetros con los valores recibidos del formulario
        $stmt->bind_param("sss", $nombre_completo, $direccion, $observacion);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Establecer un mensaje de éxito en la sesión
            $_SESSION['mensaje'] = "Datos registrados exitosamente";
            // Redirigir a la página de inicio
            header("Location: index.php"); 
            exit; // Asegúrate de llamar a exit después de header
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
