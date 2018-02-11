<?php

$addUser = $db->prepare("INSERT INTO trainers (name, password) VALUES (:tusername, :tpassword)");
$addUser->bindParam(':tusername', $username);
$addUser->bindParam(':tpassword', $password);
$addUser->execute(); 

?>


