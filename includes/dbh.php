<?php
    $dbServername = "localhost";
    $dbUsername = "kaloro-db";
    $dbPassword = "password";
    $dbName = "mrtevent";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQLi: " . mysqli_connect_error();
    }
?>