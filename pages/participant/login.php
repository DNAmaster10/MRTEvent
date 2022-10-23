<?php
    session_start();
    if (isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
        unset($_SESSION["error"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/pages/participant/css/login.css">
    </head>
    <body>
        <div id="main_container">
            <div id="back_button_container">
                <form id="back_form" action="/index.php">
                    <input type="submit" value="< Back">
                </form>
            </div>
            <div id="login_container">
                <form id="login_form" action="/pages/participant/login_submit.php" method="POST">
                    <input type="text" placeholder="Username" name="username">
                    <input type="text" placeholder="Password" name="password">
                    <input type="submit" value="Login >">
                </form>
                <?php
                    if (isset($error)) {
                        echo ("<p id='error_p'>Error: $error</p>");
                    }
                ?>
            </div>
        </div>
    </body>
</html>