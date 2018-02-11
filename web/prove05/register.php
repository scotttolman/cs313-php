<?php

session_start();

if (isset($_POST['tname'])) {    
    $username = htmlspecialchars($_POST['tname']);
    $_SESSION['username'] = $username;    
}
if (isset($_POST['tpassword'])) {
    $password = htmlspecialchars($_POST['tpassword']);
    $_SESSION['password'] = $password;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    require 'PDOconnect.php';
    require 'PDOaddUser.php';   
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trainer Added</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="pokedex.css" />
    <script src="pokedex.js"></script>
</head>
<body>
    <h1>Congratulations you are now a registered Pokémon trainer</h1>
    <h3>Click <a href="trainer.php">here</a>to view your profile</h3>
</body>
</html>