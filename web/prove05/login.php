<?php

session_start();

if (isset($_POST['username'])) {    
    $username = htmlspecialchars($_POST['username']);
    $_SESSION['username'] = $username;    
}
if (isset($_POST['password'])) {
    $password = htmlspecialchars($_POST['password']);
    $_SESSION['password'] = $password;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    require 'getPassword.php';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="login.css" />
    <script src="login.js"></script>
</head>
<body>
    <div>
        <?php
        if ($password == $pwd){
            echo "<h1> Welcome $username </h1>";
            echo "click <a href='trainer.php'> here </a> to go to your account";
        }
        else {
            echo "<h1>Sorry Team Rocket! Wrong TrainerName or password</h1> <br>
            <h2>click <a href='index.html'>here </a> to try again</h2>";
        }
        ?>
    </div>
</body>
</html>