<?php

session_start();
$username = $_SESSION['username'];

try
{
  $dbuser = 'postgres';
  $dbpassword = 'CS313-PHP';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $dbuser, $dbpassword);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

// echo "<pre>" . print_r($_POST,1) . "</pre>";

if (isset($_POST['first'])) {
    $updatePokemon = $db->prepare("UPDATE trainers SET pokemon_1 = :first WHERE name = :username");
    $updatePokemon->bindParam(':username', $username);
    $updatePokemon->bindParam(':first', $_POST['first']);
    $updatePokemon->execute();
}

if (isset($_POST['second'])) {
    $sql = "UPDATE trainers SET pokemon_2 = :second WHERE name = :username";
    $updatePokemon = $db->prepare($sql);
    $updatePokemon->bindParam(':username', $username);
    $updatePokemon->bindParam(':second', $_POST['second']);
    $updatePokemon->execute();
}

if (isset($_POST['third'])) {
    $updatePokemon = $db->prepare("UPDATE trainers SET pokemon_3 = :third WHERE name = :username");
    $updatePokemon->bindParam(':username', $username);
    $updatePokemon->bindParam(':third', $_POST['third']);
    $updatePokemon->execute();
}

$stmt = $db->prepare('SELECT badge, pokemon_1, pokemon_2, pokemon_3 FROM trainers WHERE name = :name');
$stmt->bindValue(':name', $username);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$badge = $row['badge'];
$pokemon_1 = $row['pokemon_1'];
$pokemon_2 = $row['pokemon_2'];
$pokemon_3 = $row['pokemon_3'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trainer Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="pokedex.css" />
    <script src="pokedex.js"></script>
</head>
<body>
    <button><a href="choosePokemon.php">Choose Pokemon</a></button>
    <div class="header"></div>
    <div class="body">
        <div class="trainerInfo">
            <h2>Trainer name: <span id="trainerName"><?php echo $username; ?></span></h2><br>
            <h3>Badge: <span id="trainerBadges"><?php echo $badge; ?></span></h3><br>
            <h3>First Pokémon: <span id="pokemon1"><?php echo $pokemon_1; ?></span></h3><br>
            <h3>Second Pokémon: <span id="pokemon2"><?php echo $pokemon_2; ?></span></h3><br>
            <h3>Third Pokémon: <span id="pokemon3"><?php echo $pokemon_3; ?></span></h3><br>
        </div>        
    </div>
</body>
</html>


