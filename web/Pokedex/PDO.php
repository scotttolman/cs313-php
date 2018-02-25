<?php

function typeVStype($t1, $t2) {
  global $db;
  $sql = 'SELECT multiplier FROM type_vs_type WHERE attacker = :attacker AND attacked = :attacked';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':attacker', $t1);
  $stmt->bindValue(':attacked', $t2);
  $res = $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row['multiplier'];
}

?>