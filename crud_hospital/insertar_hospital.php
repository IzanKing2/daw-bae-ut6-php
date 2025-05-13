<?php include("conexion.php");

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$total_camas = $_POST['total_camas'];

if (trim($nombre) == "") {
    die("❌ Error: El nombre del hospital no puede estar vacío.");
}

$consulta_num_hsp_max = "SELECT MAX(HOSPITAL_COD) FROM HOSPITAL";
$num_hsp_max = mysqli_query($conexion, $consulta_num_hsp_max);
$fila = mysqli_fetch_row($num_hsp_max);
$num_hsp_max = $fila[0] + 1;

$consulta = "INSERT INTO hospital (HOSPITAL_COD, nombre, direccion, telefono, total_camas) 
             VALUES ('$num_hsp_max', '$nombre', '$direccion', '$telefono', '$total_camas')";

if (mysqli_query($conexion, $consulta)) {
    // Refrescar la página después de insertar
    echo "<script>
            alert('✅ Hospital agregado correctamente.');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "❌ Error: " . mysqli_error($conexion);
}
?>