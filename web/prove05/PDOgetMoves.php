<?php

$stmt = $db->prepare('SELECT move_name, element, power FROM moves');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_NUM);
$moves;
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < $rows.count(); $j++) {
        global $moves;
        $moves[$j] = rows[$j][$i];
    }
}

?>