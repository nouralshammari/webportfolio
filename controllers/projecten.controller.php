<?php
require_once('DatabaseConnection.php');

// Get the single instance of the Database class
$db = Database::getInstance();

// Get the PDO connection
$conn = $db->getConnection();

// Perform the query
$query = $conn->query("SELECT * FROM projects");
$projects = $query->fetchAll(PDO::FETCH_ASSOC);


