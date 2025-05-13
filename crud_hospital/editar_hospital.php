<?php
include("conexion.php");

// Actualizar hospital si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $total_camas = $_POST['total_camas'];

    if (!$id || !$nombre || !$direccion || !$telefono || !$total_camas) {
        exit("Todos los campos son obligatorios.");
    }

    $sql = "UPDATE hospital SET nombre='$nombre', direccion='$direccion', telefono='$telefono', total_camas='$total_camas' WHERE HOSPITAL_COD='$id'";
    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        exit("Error al actualizar: " . mysqli_error($conexion));
    }
}

// Mostrar formulario con datos actuales
if (!isset($_GET['id'])) exit("ID no especificado.");
$id = $_GET['id'];
$res = mysqli_query($conexion, "SELECT * FROM hospital WHERE HOSPITAL_COD='$id'");
if (!$res || mysqli_num_rows($res) == 0) exit("Hospital no encontrado.");
$h = mysqli_fetch_assoc($res);
?>
<link rel="stylesheet" href="style.css">

<h2>Editar Hospital</h2>
<form method="post" class="form-editar-hospital">
    <input type="hidden" name="id" value="<?php echo $h['HOSPITAL_COD']; ?>">
    <label>Nombre:<input name="nombre" type="text" value="<?php echo $h['NOMBRE']; ?>"></label>
    <label>Dirección:<input name="direccion" type="text" value="<?php echo $h['DIRECCION']; ?>"></label>
    <label>Teléfono:<input name="telefono" type="text" value="<?php echo $h['TELEFONO']; ?>"></label>
    <label>Total camas:<input type="number" name="total_camas" value="<?php echo $h['TOTAL_CAMAS']; ?>"></label>
    <button type="submit">Actualizar</button>
    <a href="index.php">Volver</a>
</form>
