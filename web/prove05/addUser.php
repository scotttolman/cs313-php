<?php
try
{
  $dbuser = 'postgres';
  $dbpassword = 'CS313-PHP';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $dbuser, $dbpassword);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$addUser = $db->prepare("INSERT INTO trainers (name, password) VALUES (:tusername, :tpassword)");
$addUser->bindParam(':tusername', $username);
$addUser->bindParam(':tpassword', $password);
$addUser->execute(); 
?>


