<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/includes/dbh.php";
    if (!isset($_POST["username"])) {
        $_SESSION["error"] = "Please enter a username.";
        header ("Location: /pages/participant/login.php");
        die();
    }
    if (!isset($_POST["password"])) {
        $_SESSION["error"] = "Please enter a password.";
        header ("Location: /pages/participant/login.php");
        die();
    }
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $stmt = $conn->prepare("SELECT password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $stmt->close();

    if (!$result) {
        $_SESSION["error"] = "Username or password invalid.";
        header ("Location: /pages/participant/login.php");
        die();
    }
    
    if ($result == $password) {
        unset ($result);
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $stmt = $conn->prepare("SELECT type FROM users WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($result);
        $stmt->fetch();
        $stmt->close();
        if (!$result) {
            $_SESSION["error"] = "An error occured. Contact DNAmaster10.";
            header ("Location: /pages/participant/login.php");
            die();
        }
        $_SESSION["type"] = $result;
        header ("Location: /pages/participant/home.php");
        die();
    }
?>