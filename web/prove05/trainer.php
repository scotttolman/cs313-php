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

$stmt = $db->prepare('SELECT * FROM :element_types');
$stmt->bindValue(':element_types', 'element_types');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r)
{
    foreach($r as $rs)
    {
        echo '$rs <br>';
    }
}




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
    <a href="createPokemon.php">Create Pokemon</a>
    <a href="choosePokemon.php">Choose Pokemon</a>
    <div class="header"></div>
    <div class="body">
        <div class="trainerInfo">
            <h2>Trainer name: <span id="trainerName"><?php echo '$username'; ?></span></h2><br>
            <h3>Badge: <span id="trainerBadges"><?php echo '$badge'; ?></span></h3><br>
            <h3>First Pokémon: <span id="pokemon1"><?php echo '$pokemon_1'; ?></span></h3><br>
            <h3>Second Pokémon: <span id="pokemon2"><?php echo '$pokemon_2'; ?></span></h3><br>
            <h3>Third Pokémon: <span id="pokemon3"><?php echo '$pokemon_3'; ?></span></h3><br>
        </div>        
    </div>
</body>
</html>


