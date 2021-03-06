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

$sql = "SELECT type_name FROM element_types";
$stmt = $db->prepare($sql);
$stmt->execute();
$types = $stmt->fetchall(PDO::FETCH_NUM);

// echo "<pre>" . print_r($types,1) . "</pre>";

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
    <div>
        <h1>Create new Pokémon for the Pokédex</h1>
    </div>
    <div>
        <h3>Stat Points Available: <span id="stat_points">20</span></h3>
        <form action="choosePokemon.php" method="post">
            <table>
                <tr>
                    <td>Pokémon name</td>
                    <td><input type="text" name="pName" id="pName"></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select name="type_1" id="type_1">
                            <?php
                            for ($i = 0; $i < 15; $i++) {
                                $type = $types[$i];
                                echo "<option value= $type[0]>$type[0]</option>";
                                echo "type = $type[0]";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td><input type="number" name="hp" id="hp"></td>
                </tr>
                <tr>
                    <td>Attack</td>
                    <td><input type="number" name="attack" id="attack"></td>
                </tr>
                <tr>
                    <td>Defense</td>
                    <td><input type="number" name="defense" id="defense"></td>
                </tr>
                <tr>
                    <td>Speed</td>
                    <td><input type="number" name="speed" id="speed"></td>
                </tr>
            </table>
            <button><a href="choosePokemon.php">Cancel</a></button>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>