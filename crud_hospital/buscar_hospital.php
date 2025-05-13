<?php
include("conexion.php");

$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : ''; // Obtener el valor del campo de búsqueda

$query = "SELECT * FROM hospital WHERE nombre LIKE '%$buscar%'"; // Consulta para buscar hospitales por nombre
$resultado = mysqli_query($conexion, $query); // Ejecutar la consulta

if (mysqli_num_rows($resultado) > 0) { // Verificar si se encontraron resultados
    // Mostrar la tabla de hospitales
    echo "<table id='hospitales'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th></tr>";
    while ($fila = mysqli_fetch_row($resultado)) { // Recorrer los resultados
        echo "<tr class='hospital'>";
        for ($i = 0; $i < count($fila); $i++) { // Mostrar cada campo en una celda
            echo "<td>" . $fila[$i] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron hospitales.";
}
?>
