<?php

session_start();
$username = $_SESSION['username'];
$poke_name = $_POST['poke_name'];

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

$sql = "SELECT * FROM pokemon WHERE poke_name = :poke_name";
$stmt = $db->prepare($sql);
$stmt->bindValue(':poke_name', $poke_name);
$stmt->execute();
$pk = $stmt->fetch(PDO::FETCH_ASSOC);

// echo "<pre>" . print_r($types,1) . "</pre>";

$pts = $pk['stat_points'];
$total_pts = $pts + $pk[hp] + $pk[attack] + $pk[defense] + $pk[speed];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Pokémon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="pokedex.css" />
    <script src="pokedex.js"></script>
</head>
<body>
    <?php
    echo "
    <div>
        <h1>Upgrade $pk[poke_name]</h1>
        <h3>Stat Points Available: $pts</h3>
    </div>
    <div>
        <form action='choosePokemon.php' method='post'>
            <table>
                <tr>
                    <td>Pokémon name</td>
                    <td><input type='text' name='pkName' id='pkName' value=$pk[poke_name]></td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td><input type='number' name='hp' id='hp' value=$pk[hp]></td>
                </tr>
                <tr>
                    <td>Attack</td>
                    <td><input type='number' name='attack' id='attack' value=$pk[attack]></td>
                </tr>
                <tr>
                    <td>Defense</td>
                    <td><input type='number' name='defense' id='defense' value=$pk[defense]></td>
                </tr>
                <tr>
                    <td>Speed</td>
                    <td><input type='number' name='speed' id='speed' value=$pk[speed]></td>
                </tr>
            </table>
            <input type='hidden' name='pts' value=$total_pts>
            <button><a href='choosePokemon.php'>Cancel</a></button>
            <input type='submit' value='Submit'>
        </form>
    </div>";
    ?>
</body>
</html>