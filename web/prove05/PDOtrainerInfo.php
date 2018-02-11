<?php

$stmt = $db->prepare('SELECT badge, pokemon_1, pokemon_2, pokemon_3 FROM trainers WHERE name = :name');
$stmt->bindValue(':name', $username);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "$rows[0]['badge']";
echo "$rows[0]['pokemon_1']";
echo "$rows[0]['pokemon_2']";
echo "$rows[0]['pokemon_3']";
$badge = $rows[0]['badge'];
$pokemon_1 = $rows[0]['pokemon_1'];
$pokemon_2 = $rows[0]['pokemon_2'];
$pokemon_3 = $rows[0]['pokemon_3'];

?>