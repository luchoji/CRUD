<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado un ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la consulta SQL para eliminar el registro
    $sql = "DELETE FROM tabla WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            // Si la eliminación es exitosa, establecer un mensaje en la sesión
            $_SESSION['mensaje'] = "Eliminación exitosa";
            // Redirigir al usuario a la página principal (index.php)
            header("Location: index.php");
            exit(); // Terminar el script para evitar la ejecución de código innecesario
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

