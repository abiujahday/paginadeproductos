<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'id15590805_egan';
$dbPassword = 'Q8jB9j>Ekbc31pIb';
$dbName = 'id15590805_utrapidfood';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} 
?>