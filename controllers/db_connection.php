<?php
//dit gebruikte ik eerst voor de connectie met de database, later een class van gemaakt dus dit gebruik ik niet meer
$servername = "localhost";
$dbname = "portfolio";
$username = 'root';  // Your database username
$password = 'Adil2007';  // Your database password

try {
    // Create a new PDO instance
     $conn =  new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
    // Handle connection errors
    echo "Connection failed: " . $error->getMessage();
    die();
    exit;
}



