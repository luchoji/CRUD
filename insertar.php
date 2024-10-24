<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos enviados desde el formulario
    $nombre_completo = $_POST['nombre_completo'];
    $direccion = $_POST['direccion'];
    $observacion = $_POST['observacion'];

    // Verificar que todos los campos estén completos antes de proceder
    if (!empty($nombre_completo) && !empty($direccion) && !empty($observacion)) {
        // Preparar la consulta SQL para insertar el nuevo registro
        $sql = "INSERT INTO tabla (nombre_completo, direccion, observacion) VALUES (?, ?, ?)";
        
        // Preparar la sentencia SQL para evitar inyecciones
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Vincular los parámetros a la consulta
            mysqli_stmt_bind_param($stmt, "sss", $nombre_completo, $direccion, $observacion);
            
            // Ejecutar la consulta
            if (mysqli_stmt_execute($stmt)) {
                // Si el registro es exitoso, establecer un mensaje en la sesión
                $_SESSION['mensaje'] = "Registro exitoso";
                // Redirigir al usuario a la página principal (index.php)
                header("Location: index.php");
                exit(); // Terminar el script para evitar la ejecución de código innecesario
            } else {
                echo "Error al registrar los datos: " . mysqli_error($conn);
            }

            // Cerrar la sentencia preparada
            mysqli_stmt_close($stmt);
        }
    } else {
        // Si algún campo está vacío, mostrar un mensaje de advertencia
        echo "Por favor, completa todos los campos.";
    }
}

// Cerrar la conexión con la base de datos
mysqli_close($conn);
?>

