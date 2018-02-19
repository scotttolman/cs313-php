<?php

session_start();
$username = $_SESSION['username'];

try
{
//   $dbuser = 'postgres';
//   $dbpassword = 'CS313-PHP';
//   $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $dbuser, $dbpassword);

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if (isset($_POST['pName'])) {
    $sql = "INSERT INTO pokemon (poke_name, level, trainer, type_1, type_2, hp, attack, defense, speed) VALUES (:pname, 1, :trainer, :t1, :t2, :hp, :att, :de, :sp)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':pname', $_POST['pName']);
    $stmt->bindValue(':trainer', $username);
    $stmt->bindValue(':t1', $_POST['type_1']);
    $stmt->bindValue(':t2', $_POST['type_2']);
    $stmt->bindValue(':hp', $_POST['hp']);
    $stmt->bindValue(':att', $_POST['attack']);
    $stmt->bindValue(':de', $_POST['defense']);
    $stmt->bindValue(':sp', $_POST['speed']);
    $success = $stmt->execute();
    if ($success)
        echo "Pokemon added";
    else
        echo "Error adding Pokemon";
}

$stmt = $db->prepare('SELECT poke_name, level, type_1, type_2, hp, attack, defense, speed FROM pokemon WHERE trainer = :username');
$stmt->bindValue(':username', $username);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo ($rows[0][poke_name]);
// echo "<pre>" . print_r($rows,1) . "</pre>"

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Choose Pokemon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="pokedex.css" />
    <script src="pokedex.js"></script>
</head>
<body>
    <button><a href="createPokemon.php">Create Pokemon</a></button>
    <br>
    <br>
    <br>
    <form action="trainer.php" method="post">
    <table>
        <tr>
            <th>1st</th>
            <th>2nd</th>
            <th>3rd</th>
            <th>Pokémon</th>
            <th>Type</th>
            <th>Type</th>
            <th>HP</th>
            <th>Attack</th>
            <th>Defense</th>
            <th>Speed</th>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($rows); $i++) {
            $row = $rows[$i];
            echo "
            <tr>
                <td><input type='radio' name='first' value= $row[poke_name]></td>
                <td><input type='radio' name='second' value= $row[poke_name]></td>
                <td><input type='radio' name='third' value= $row[poke_name]></td>
                <td>$row[poke_name]</td>
                <td>$row[type_1]</td>
                <td>$row[type_2]</td>
                <td>$row[hp]</td>
                <td>$row[attack]</td>
                <td>$row[defense]</td>
                <td>$row[speed]</td>
            </tr>";
        }
        ?>
    </table>
    <br>
    <br>
    <button><a href="trainer.php">Cancel</a></button>
    <input type="submit" value="Submit">
    </form>
    
</body>
</html>