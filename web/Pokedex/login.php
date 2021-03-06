<?php

session_start();

try
{
    $dbUrl = getenv('DATABASE_URL');

    if ($dbUrl) {
        $dbopts = parse_url($dbUrl);
        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = ltrim($dbopts["path"],'/');
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    else {
        $dbuser = 'postgres';
        $dbpassword = 'CS313-PHP';
        $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $dbuser, $dbpassword);
    }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if (isset($_POST['username'])) {    
    $username = htmlspecialchars($_POST['username']);
    $_SESSION['username'] = $username;    
}

$stmt = $db->prepare('SELECT password FROM trainers WHERE name = :username');
  $stmt->bindValue(':username', $username);
  $stmt->execute();
  $rows = $stmt->fetch();
  $dbPass = $rows[0];

if (password_verify($_POST['password'], $dbPass))
    $_SESSION[$username]['auth'] = true;
else
    $_SESSION[$username]['auth'] = false;

if ($_SESSION[$username]['auth']){
    header('Location: trainer.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="pokedex.css" />
    <script src="pokedex.js"></script>
</head>
<body>
    <div class="banner">
            <h1>Sorry Team Rocket! Wrong TrainerName or password</h1> <br>
            <h2>click <a href='index.html'>here </a> to try again</h2>
    </div>
</body>
</html