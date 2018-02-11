<?php

$stmt = $db->prepare('SELECT password FROM trainers WHERE name = :name');
$stmt->bindValue(':name', $username, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$pwd = $rows[0]['password'];

?>

