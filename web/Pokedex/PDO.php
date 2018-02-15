<?php

function db_connect() {
  try
  {
    $dbuser = 'postgres';
    $dbpassword = 'CS313-PHP';
    $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $dbuser, $dbpassword);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $db;
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}

function getPassword() {
  $stmt = $db->prepare('SELECT password FROM trainers WHERE name = :username');
  $stmt->bindValue(':username', $username);
  $stmt->execute();
  $rows = $stmt->fetch();
  return $rows;
}

function addUser() {
  $addUser = $db->prepare("INSERT INTO trainers (name, password) VALUES (:tusername, :tpassword)");
  $addUser->bindParam(':tusername', $username);
  $addUser->bindParam(':tpassword', $password);
  $addUser->execute();
}
 
function getTrainerInfo() {
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
  return $rows;
}

function getPokemon() {
  $stmt = $db->prepare('SELECT * FROM pokemon WHERE pokemon_name = :pokemon_name');
  $stmt->bindValue(':pokemon_name', $pokemon_name);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addPokemon() {
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
}

function getMoves() {
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
}

function addMove() {
  $addMove = $db->prepare("INSERT INTO moves (move_name, element, power) VALUES (:move_name, :element, :power)");
  $addMove->bindParam(':move_name', $move_name);
  $addMove->bindParam(':element', $element);
  $addMove->bindParam(':power', $power);
  $addMove->execute();
}
?>