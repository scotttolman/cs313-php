<?php

session_start();

if (isset($_POST['tname'])) {    
    $username = htmlspecialchars($_POST['tname']);  
}
if (isset($_POST['tpassword'])) {
    $password = htmlspecialchars($_POST['tpassword']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
}
    
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

$addUser = $db->prepare("INSERT INTO trainers (name, password, wins) VALUES (:tusername, :tpassword, :wins)");
$addUser->bindParam(':tusername', $username);
$addUser->bindParam(':tpassword', $passwordHash);
$addUser->bindValue(':wins', 0);
$success = $addUser->execute();

header('Location: index.html');
exit();

?>