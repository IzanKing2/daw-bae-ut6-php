<?php include("conexion.php");

// Guardamos las variables del formulario
// y las asignamos a variables PHP
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$total_camas = $_POST['total_camas'];

if (trim($nombre) == "") { // Verificar si el nombre está vacío
    die("❌ Error: El nombre del hospital no puede estar vacío.");
}

// Creamos la consulta para obtener el máximo id de hospital
$consulta_num_hsp_max = "SELECT MAX(HOSPITAL_COD) FROM HOSPITAL";
$num_hsp_max = mysqli_query($conexion, $consulta_num_hsp_max); // Ejecutar la consulta
$fila = mysqli_fetch_row($num_hsp_max); // Obtener el resultado
$num_hsp_max = $fila[0] + 1; // Incrementar el id en 1

// Crea la consulta para insertar el nuevo hospital con los datos del formulario
// y el nuevo id
$consulta = "INSERT INTO hospital (HOSPITAL_COD, nombre, direccion, telefono, total_camas) 
             VALUES ('$num_hsp_max', '$nombre', '$direccion', '$telefono', '$total_camas')";

if (mysqli_query($conexion, $consulta)) { // Ejecutar la consulta
    // Refrescar la página después de insertar
    echo "<script>
            alert('✅ Hospital agregado correctamente.');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "❌ Error: " . mysqli_error($conexion);
}
?>