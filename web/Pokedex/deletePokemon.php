<?php

session_start();
$username = $_SESSION['username'];

try
{
    $dbUrl = getenv('DATABASE_URL');

    if ($dbUrl) {
        $dbopts = parse_url($dbUrl);
        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = ltrim($dbopts["path"],'/');
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    else {
        $dbuser = 'postgres';
        $dbpassword = 'CS313-PHP';
        $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $dbuser, $dbpassword);
    }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if (isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    $sql = 'DELETE FROM pokemon WHERE poke_name = :del';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':del', $delete);
    $success = $stmt->execute();
    if ($success)
        echo "Pokemon deleted<br>";
    else
        echo "Cannot delete active Pokemon<br>";
}

$stmt = $db->prepare('SELECT poke_name, level, type_1, hp, attack, defense, speed FROM pokemon WHERE trainer = :username');
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
    <form action="deletePokemon.php" method="post">
    <table>
        <tr>
            <th>Pokémon</th>
            <th>Type</th>
            <th>HP</th>
            <th>Attack</th>
            <th>Defense</th>
            <th>Speed</th>
            <th>Delete</th>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($rows); $i++) {
            $row = $rows[$i];
            echo "
            <tr>
                <td>$row[poke_name]</td>
                <td>$row[type_1]</td>
                <td>$row[hp]</td>
                <td>$row[attack]</td>
                <td>$row[defense]</td>
                <td>$row[speed]</td>
                <td><input type='radio' name='delete' value=$row[poke_name]></td>
            </tr>";
        }
        ?>
    </table>
    <br>
    <br>
    <button><a href="choosePokemon.php">Cancel</a></button>
    <input type="submit" value="Submit">
    </form>
    
</body>
</html>