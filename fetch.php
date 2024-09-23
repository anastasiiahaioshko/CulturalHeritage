<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:3308";
$username = "dev10dbuser";
$password = "M0jyKlhXjpgKU7IJ";
$dbname = "dev10db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$region = $_GET['region'];
$type = $_GET['type'];

// Prepare a statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM heritage WHERE region = ? AND type = ?");
$stmt->bind_param("ss", $region, $type);
$stmt->execute();
$result = $stmt->get_result();

$heritage = [];
while ($row = $result->fetch_assoc()) {
    $heritage[] = $row;
}

header('Content-Type: application/json');
echo json_encode($heritage);

?>