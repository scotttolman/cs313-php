<?php

$stmt = $db->prepare('SELECT * FROM pokemon WHERE pokemon_name = :pokemon_name');
$stmt->bindValue(':pokemon_name', $pokemon_name);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
