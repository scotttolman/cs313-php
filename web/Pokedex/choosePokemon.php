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

if (isset($_POST['pName'])) {
    $pts = 20;
    $pts -= $_POST['hp'];
    $pts -= $_POST['attack'];
    $pts -= $_POST['defense'];
    $pts -= $_POST['speed'];
    if ($pts >= 0) {
        $sql = "INSERT INTO pokemon (poke_name, level, xp, lvl_up, trainer, type_1, hp, attack, defense, speed, stat_points) VALUES (:pname, 1, 10, 21, :trainer, :t1, :hp, :att, :de, :sp, :pts)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':pname', $_POST['pName']);
        $stmt->bindValue(':trainer', $username);
        $stmt->bindValue(':t1', $_POST['type_1']);
        $stmt->bindValue(':hp', $_POST['hp']);
        $stmt->bindValue(':att', $_POST['attack']);
        $stmt->bindValue(':de', $_POST['defense']);
        $stmt->bindValue(':sp', $_POST['speed']);
        $stmt->bindValue(':pts', $pts);
        $success = $stmt->execute();
        if ($success)
            echo "Pokemon added";
        else
            echo "Something went wrong";
    }
    else{
        echo "You spent more Stat Points than you have!";
    }
    
}


if (isset($_POST['pkName'])) {
    $pts = $_POST['pts'];
    $pts -= $_POST['hp'];
    $pts -= $_POST['attack'];
    $pts -= $_POST['defense'];
    $pts -= $_POST['speed'];
    if ($pts >= 0) {
        $sql = 'UPDATE pokemon SET stat_points = :pts, hp = :hp, attack = :att, defense = :de, speed = :sp WHERE poke_name = :pname';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':pname', $_POST['pkName']);
        $stmt->bindValue(':hp', $_POST['hp']);
        $stmt->bindValue(':att', $_POST['attack']);
        $stmt->bindValue(':de', $_POST['defense']);
        $stmt->bindValue(':sp', $_POST['speed']);
        $stmt->bindValue(':pts', $pts);
        $success = $stmt->execute();
        if ($success)
            echo "Upgraded $_POST[pkName]";
        else
            echo "Something went wrong";
    }
    else{
        echo "You spent more Stat Points than you have!";
    }
}

$stmt = $db->prepare('SELECT poke_name, level, type_1, hp, attack, defense, speed, stat_points FROM pokemon WHERE trainer = :username');
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
    <button><a href="upgradable.php">Upgrade Pokemon</a></button>
    <button><a href="deletePokemon.php">Delete Pokemon</a></button>
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
            <th>HP</th>
            <th>Attack</th>
            <th>Defense</th>
            <th>Speed</th>
            <th>Stat Pts<th>
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
                <td>$row[hp]</td>
                <td>$row[attack]</td>
                <td>$row[defense]</td>
                <td>$row[speed]</td>
                <td>$row[stat_points]</td>
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