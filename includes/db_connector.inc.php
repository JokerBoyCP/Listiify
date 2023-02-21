<?php
// Variabeln deklarieren
$host = 'localhost'; // host
$username = 'listiify'; // username
$password = 'BBZBL12345'; // password
$database = 'listiify_db'; // database



// mit der Datenbank verbinden
$conn = mysqli_connect($host, $username, $password, $database);



// Fehlermeldung, falls Verbindung fehl schlägt.
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
