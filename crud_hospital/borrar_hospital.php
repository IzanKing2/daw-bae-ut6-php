<?php include("conexion.php");

$id = $_POST['id']; // Obtener el id del hospital a borrar

if (trim($id) == "") { // Verificar si el id está vacío
    die("❌ Error: El id del hospital no puede estar vacío.");
}

$consulta = "DELETE FROM hospital WHERE hospital_cod = '$id'"; // Consulta para borrar el hospital

if (mysqli_query($conexion, $consulta)) { // Ejecutar la consulta
    // Verificar si se borró algún registro
    if (mysqli_affected_rows($conexion) > 0) {
        // Refrescar la página después de insertar
        echo "<script>
                alert('✅ Hospital borrado correctamente.');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo "❌ Error: No se encontró un hospital con ese id.";
    }
} else {
    echo "❌ Error: " . mysqli_error($conexion);
}
?>