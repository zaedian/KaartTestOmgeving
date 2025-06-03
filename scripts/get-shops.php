<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// get-shops.php

header('Content-Type: application/json');

// Database connection
$host = 'localhost';
$db   = 'winkels_database';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$result = $mysqli->query("SELECT naam, producten, adres, postcode, locatie, url, latitude, longitude FROM winkels");

$winkels = [];

while ($row = $result->fetch_assoc()) {
    $winkels[] = $row;
}

echo json_encode($winkels);
?>
