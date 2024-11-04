<?php
session_start();

// Replace with actual username and password
$admin_username = 'admin';
$admin_password = 'password123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;  // Set session to indicate the admin is logged in
        header('Location: adminDashboard.view.php'); // Redirect to admin dashboard
        exit;
    } else {
        echo 'Invalid username or password.';
    }
}
?>

