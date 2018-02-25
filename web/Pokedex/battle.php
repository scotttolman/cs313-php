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

$stmt = $db->prepare('SELECT badge, pokemon_1, pokemon_2, pokemon_3 FROM trainers WHERE name = :name');
$stmt->bindValue(':name', $username);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$badge = $row['badge'];
$pokemon_1 = $row['pokemon_1'];
$pokemon_2 = $row['pokemon_2'];
$pokemon_3 = $row['pokemon_3'];

$stmt = $db->prepare('SELECT poke_name, level, type_1, hp, attack, defense, speed FROM pokemon WHERE poke_name = :name AND trainer = :trainer');
$stmt->bindValue(':name', $pokemon_1);
$stmt->bindValue(':trainer', $username);
$stmt->execute();
$p1 = $stmt->fetch(PDO::FETCH_NUM);

$stmt = $db->prepare('SELECT poke_name, level, type_1, hp, attack, defense, speed FROM pokemon WHERE poke_name = :name AND trainer = :trainer');
$stmt->bindValue(':name', $pokemon_2);
$stmt->bindValue(':trainer', $username);
$stmt->execute();
$p2 = $stmt->fetch(PDO::FETCH_NUM);

$stmt = $db->prepare('SELECT poke_name, level, type_1, hp, attack, defense, speed FROM pokemon WHERE poke_name = :name AND trainer = :trainer');
$stmt->bindValue(':name', $pokemon_3);
$stmt->bindValue(':trainer', $username);
$stmt->execute();
$p3 = $stmt->fetch(PDO::FETCH_NUM);

$stmt = $db->prepare('SELECT name, pokemon_1, pokemon_2, pokemon_3 FROM trainers');
$stmt->execute();
$profiles = $stmt->fetchAll(PDO::FETCH_NUM);

// echo "<pre>" . print_r($profiles,1) . "</pre>";

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
    <div>
    <button><a href="trainer.php">Trainer page</a></button>
    <button><a href="logout.php">logout</a></button>
    </div>

    <br>
    <br>
    <div class="header"></div>
    <div class="body">
        <div class="trainerInfo">
            <table>
                <?php
                if (!$badge)
                    $badge = 'no';
                echo "
                <tr>
                    <th colspan='8'>$username: $badge badge</th>
                </tr>
                <tr>
                    <th>Pokemon</th>
                    <th>Level</th>
                    <th>Type 1</th>
                    <th>Type 2</th>
                    <th>HP</th>
                    <th>Attack</th>
                    <th>Defense</th>
                    <th>Speed</th>
                </tr>
                <tr>";
                    for ($i = 0; $i < 8; $i++) {
                        echo "<td>$p1[$i]</td>";
                    }
                echo "
                </tr>
                <tr>";
                    for ($i = 0; $i < 8; $i++) {
                        echo "<td>$p2[$i]</td>";
                    }
                echo "
                </tr>
                <tr>";
                    for ($i = 0; $i < 8; $i++) {
                        echo "<td>$p3[$i]</td>";
                    }
                echo "
                </tr>";
                ?>
            </table>
            <br>
            <br>
            <?php
            $cnt = count($profiles);
            for ($i = 0; $i < $cnt; $i++) {
                $profile = $profiles[$i];
                if ($profile[0] != $username) {
                    echo "
                    <table>
                        <tr>
                            <th>$profile[0]</th>
                        </tr>
                        <tr>
                            <td>$profile[1]</td>
                        <tr>                        
                            <td>$profile[2]</td>
                        </tr>
                            <td>$profile[3]</td>
                        </tr>
                    </table>
                    <br>
                    <form action='battling.php' method='post'>
                        <input type='hidden' name='trainer' value=$profile[0]>
                        <input type='submit' value='Battle $profile[0]'>
                    </form>
                    <br><br>";
                }
            }
            ?>
        </div>        
    </div>
</body>
</html>