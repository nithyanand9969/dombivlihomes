<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'pashupra_homes');
define('DB_PASS', 'Mumbai@2050');
define('DB_NAME', 'pashupra_homes');

// Create connection
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
