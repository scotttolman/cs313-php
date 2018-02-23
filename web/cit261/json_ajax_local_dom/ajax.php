<?php

$jString = $_POST['x'];

try
{
//   $dbuser = 'postgres';
//   $dbpassword = 'CS313-PHP';
//   $db = new PDO('pgsql:host=127.0.0.1;dbname=ajax', $dbuser, $dbpassword);

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$sql = "UPDATE jsontext SET jtext = (:txt)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':txt', $jString);
$stmt->execute();
  
?>