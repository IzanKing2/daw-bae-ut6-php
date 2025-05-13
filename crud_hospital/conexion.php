<?php
$servername = "localhost";
$database = "sanidad";
$username = "root";
$password = "";
// Creamos la conexión
$conexion = mysqli_connect($servername, $username, $password, $database);
// Chequeamos la conexión
// Si la conexión falla, ejecutamos la funcion die()
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}