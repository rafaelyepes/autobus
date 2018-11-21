<?php
date_default_timezone_set("America/Montreal");

$conn = new mysqli("localhost", "root", "", "autobus");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
