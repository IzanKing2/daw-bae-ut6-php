<?php include("conexion.php");

$id = $_POST['id'];

if (trim($id) == "") {
    die("❌ Error: El id del hospital no puede estar vacío.");
}

$consulta = "DELETE FROM hospital WHERE hospital_cod = '$id'";

if (mysqli_query($conexion, $consulta)) {
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