<?php

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

$sql = 'SELECT jtext FROM jsontext';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
echo "$rows[jtext]";
// echo "Hey";
// echo "<pre>" . print_r($rows,1) . "</pre>";
  
?>