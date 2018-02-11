<?php

$addMove = $db->prepare("INSERT INTO moves (move_name, element, power) VALUES (:move_name, :element, :power)");
$addMove->bindParam(':move_name', $move_name);
$addMove->bindParam(':element', $element);
$addMove->bindParam(':power', $power);
$addMove->execute(); 

?>