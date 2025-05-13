<?php
include("conexion.php");

$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

$query = "SELECT * FROM hospital WHERE nombre LIKE '%$buscar%'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table id='hospitales'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th></tr>";
    while ($fila = mysqli_fetch_row($resultado)) {
        echo "<tr class='hospital'>";
        for ($i = 0; $i < count($fila); $i++) {
            echo "<td>" . $fila[$i] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron hospitales.";
}
?>
