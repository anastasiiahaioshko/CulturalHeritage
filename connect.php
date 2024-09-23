<?php
$servername = "localhost:3308"; // swiss server designated localhost
$username = "dev10dbuser";//replace with username for your database dev02dbuser,dev03dbuser, etc.
$password = "M0jyKlhXjpgKU7IJ";//replace with password for your database FM02web2020,FM03web2020, etc.
$dbname = "dev10db";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

?>