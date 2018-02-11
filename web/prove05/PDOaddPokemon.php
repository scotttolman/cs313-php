<?php

$addPokemon = $db->prepare("INSERT INTO pokemon (poke_name, type_1, type_2, hp, attack, defense, speed, move_1, move_2, move_3, move_4) VALUES (:poke_name, :type_1, :type_2, :hp, :attack, :defense, :speed, :move_1, :move_2, :move_3, :move_4)");
$addPokemon->bindParam(':poke_name', $poke_name);
$addPokemon->bindParam(':type_1', $type_1);
$addPokemon->bindParam(':type_2', $type_2);
$addPokemon->bindParam(':hp', $hp);
$addPokemon->bindParam(':attack', $attack);
$addPokemon->bindParam(':defense', $defense);
$addPokemon->bindParam(':speed', $speed);
$addPokemon->bindParam(':move_1', $move_1);
$addPokemon->bindParam(':move_2', $move_2);
$addPokemon->bindParam(':move_3', $move_3);
$addPokemon->bindParam(':move_4', $move_4);
$addPokemon->execute(); 

?>