<?php
@include 'Backend/ConnectPHP.php'; // Include database connection

session_start(); // Start a session to store user data once logged in

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['UId'];
    $password = $_POST['UPassword'];

    // Retrieve user from database based on Uid
    $sql = "SELECT * FROM users WHERE uid = $uid";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['UPassword'])) {
        // Password matches, set session variables
        $_SESSION['UId'] = $user['UId'];
        $_SESSION['UName'] = $user['UName'];
        $_SESSION['UEmail'] = $user['UEmail'];
        header("Location: profile.php"); // Redirect to profile page after successful login
        echo  $_SESSION['Uname'];
    } else {
        echo "Invalid login credentials!";
    }
}
?>
