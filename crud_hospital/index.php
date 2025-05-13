<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Registro</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script> <!-- Vinculación del archivo JavaScript -->
    </head>
    <body>
        <main>
            <!-- Sección para agregar hospitales -->
            <section id="formulario">
                <h1>Gestión de Hospitales</h1>
                <form action="insertar_hospital.php" method="post">
                    <label for="nombre">Nombre del Hospital:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <br>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" placeholder="C/ calle, 22" required>
                    <br>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" required>
                    <br>
                    <label for="total_camas">Total de Camas:</label>
                    <input type="number" id="total_camas" name="total_camas" required>
                    <br>
                    <input type="submit" value="Agregar Hospital">
                </form>
            </section>

            <!-- Sección para ver hospitales -->
            <section id="tabla">
                <h2>Lista de Hospitales</h2>
                <form id="form_buscar" onsubmit="event.preventDefault(); buscarHospital();">
                    <label for="buscar">Buscar Hospital:</label>
                    <input type="text" id="buscar" name="buscar" placeholder="Nombre hospital" onkeyup="buscarHospital();">
                    <input type="submit" value="Buscar">
                </form>
                <div id="tabla_hospitales">
                    <?php
                    // Realizamos la consulta a la base de datos
                    $resultado = mysqli_query($conexion, "SELECT * FROM hospital");
                    if (mysqli_num_rows($resultado) > 0) {
                        echo "<table id='hospitales'>";
                        echo "<tr><th>ID</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Total Camas</th><th>Acciones</th></tr>";
                        while ($fila = mysqli_fetch_row($resultado)) {
                            echo "<tr class='hospital'>";
                            for ($i = 0; $i < count($fila); $i++) {
                                echo "<td>" . $fila[$i] . "</td>";
                            }
                            // Cambiamos el botón por un enlace a editar_hospital.php
                            echo "<td>";
                            echo "<a href='editar_hospital.php?id=" . $fila[0] . "'><button type='button'>Editar</button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No se encontraron hospitales.";
                    }
                    ?>
                </div>
            </section>

            <!-- div oculto para editar hospitales -->
            <div id ="div_editar" style="display:none;">
                <h2>Editar Hospital</h2>
                <form id="form_editar" action="editar_hospital.php" method="post">
                    <input type="hidden" id="id_editar" name="id">
                    <label for="nombre_editar">Nombre del Hospital:</label>
                    <input type="text" id="nombre_editar" name="nombre">
                    <br>
                    <label for="direccion_editar">Dirección:</label>
                    <input type="text" id="direccion_editar" name="direccion">
                    <br>
                    <label for="telefono_editar">Teléfono:</label>
                    <input type="text" id="telefono_editar" name="telefono">
                    <br>
                    <input type="submit" value="Actualizar Hospital">
                </form>
            </div>

            <!-- Sección para borrar hospitales -->
            <section id="borrar">
                <h2>Borrar Hospital</h2>
                <form action="borrar_hospital.php" method="post">
                    <label for="id_borrar">ID del Hospital:</label>
                    <input type="number" id="id_borrar" name="id" placeholder="ID del hospital" required>
                    <br>
                    <input type="submit" value="Borrar Hospital">
                </form>
            </section>
        </main>
    </body>
    <footer>
        <p>&copy; 2023 Hospital Management System</p>
</html>