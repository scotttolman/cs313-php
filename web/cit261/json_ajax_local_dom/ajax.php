<?php

$jString = $_POST['x'];

try
  {
    $dbuser = 'postgres';
    $dbpassword = 'CS313-PHP';
    $db = new PDO('pgsql:host=127.0.0.1;dbname=ajax', $dbuser, $dbpassword);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
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