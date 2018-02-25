<?php

session_start();
$username = $_SESSION['username'];

include('PDO.php');

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

$rival = $_POST['trainer'];
echo "<button><a href='trainer.php'>Trainer Page</a></button><br><br>";
echo "++++++++++++++++++++++++<br>";
echo "   You are battling $rival<br>";
echo "++++++++++++++++++++++++<br>";

// get trainers pokemon & badge
$sql = 'SELECT badge, pokemon_1, pokemon_2, pokemon_3 FROM trainers WHERE name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $username);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$badge = $row['badge'];
$trainer_p1 = $row['pokemon_1'];
$trainer_p2 = $row['pokemon_2'];
$trainer_p3 = $row['pokemon_3'];

// get rivals pokemon & badge
$sql = 'SELECT badge, pokemon_1, pokemon_2, pokemon_3 FROM trainers WHERE name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $rival);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$badge = $row['badge'];
$rival_p1 = $row['pokemon_1'];
$rival_p2 = $row['pokemon_2'];
$rival_p3 = $row['pokemon_3'];

// get trainers 1st pokemon
$sql = 'SELECT * FROM pokemon WHERE poke_name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $trainer_p1);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$t[1][0] = $row['poke_name'];
$t[1][1] = $row['hp'];
$t[1][2] = $row['attack'];
$t[1][3] = $row['defense'];
$t[1][4] = $row['speed'];
$t1_type_1 = $row['type_1'];

// get trainers 2nd pokemon
$sql = 'SELECT * FROM pokemon WHERE poke_name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $trainer_p2);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$t[2][0] = $row['poke_name'];
$t[2][1] = $row['hp'];
$t[2][2] = $row['attack'];
$t[2][3] = $row['defense'];
$t[2][4] = $row['speed'];
$t2_type_1 = $row['type_1'];

// get trainers 3rd pokemon
$sql = 'SELECT * FROM pokemon WHERE poke_name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $trainer_p3);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$t[3][0] = $row['poke_name'];
$t[3][1] = $row['hp'];
$t[3][2] = $row['attack'];
$t[3][3] = $row['defense'];
$t[3][4] = $row['speed'];
$t3_type_1 = $row['type_1'];

// get rivals 1st pokemon
$sql = 'SELECT * FROM pokemon WHERE poke_name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $rival_p1);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$r[4][0] = $row['poke_name'];
$r[4][1] = $row['hp'];
$r[4][2] = $row['attack'];
$r[4][3] = $row['defense'];
$r[4][4] = $row['speed'];
$r1_type_1 = $row['type_1'];

// get rivals 2nd pokemon
$sql = 'SELECT * FROM pokemon WHERE poke_name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $rival_p2);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$r[5][0] = $row['poke_name'];
$r[5][1] = $row['hp'];
$r[5][2] = $row['attack'];
$r[5][3] = $row['defense'];
$r[5][4] = $row['speed'];
$r2_type_1 = $row['type_1'];

// get rivals 3rd pokemon
$sql = 'SELECT * FROM pokemon WHERE poke_name = :name';
$stmt = $db->prepare($sql);
$stmt->bindValue(':name', $rival_p3);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$r[6][0] = $row['poke_name'];
$r[6][1] = $row['hp'];
$r[6][2] = $row['attack'];
$r[6][3] = $row['defense'];
$r[6][4] = $row['speed'];
$r3_type_1 = $row['type_1'];

// get type vs type multipliers
$vs[1][4] = typeVStype($t1_type_1, $r1_type_1);
$vs[1][5] = typeVStype($t1_type_1, $r2_type_1);
$vs[1][6] = typeVStype($t1_type_1, $r3_type_1);

$vs[2][4] = typeVStype($t2_type_1, $r1_type_1);
$vs[2][5] = typeVStype($t2_type_1, $r2_type_1);
$vs[2][6] = typeVStype($t2_type_1, $r3_type_1);

$vs[3][4] = typeVStype($t3_type_1, $r1_type_1);
$vs[3][5] = typeVStype($t3_type_1, $r2_type_1);
$vs[3][6] = typeVStype($t3_type_1, $r3_type_1);

$vs[4][1] = typeVStype($r1_type_1, $t1_type_1);
$vs[4][2] = typeVStype($r1_type_1, $t2_type_1);
$vs[4][3] = typeVStype($r1_type_1, $t3_type_1);

$vs[5][1] = typeVStype($r2_type_1, $t1_type_1);
$vs[5][2] = typeVStype($r2_type_1, $t2_type_1);
$vs[5][3] = typeVStype($r2_type_1, $t3_type_1);

$vs[6][1] = typeVStype($r3_type_1, $t1_type_1);
$vs[6][2] = typeVStype($r3_type_1, $t2_type_1);
$vs[6][3] = typeVStype($r3_type_1, $t3_type_1);

$w = 1; // tt
$x = 4; // rr
$y = 4; // tv1
$z = 1; // rv1



function battle ($t, $t_hp, $t_at, $t_df, $t_sp, $tvr, $r, $r_hp, $r_ar, $r_df, $r_sp, $rvt) {
    if ($t_sp >= $r_sp) {
        $winner = attack($t, $t_hp, $t_at, $t_df, $t_sp, $tvr, $r, $r_hp, $r_ar, $r_df, $r_sp, $rvt);
    }
    else {
        $winner = attack($r, $r_hp, $r_ar, $r_df, $r_sp, $rvt, $t, $t_hp, $t_at, $t_df, $t_sp, $tvr);
    }
    if ($winner == $t) {
        echo "<br>--------------------------";
        echo "<br>$r is KO'd<br>$t is the winner<br>";
        echo "--------------------------<br><br>";
    }
    elseif ($winner == $r) {
        echo "<br>--------------------------";
        echo "<br>$t is KO'd<br>$r is the winner<br>";
        echo "--------------------------<br><br>";
    }
    else {
        echo "@@@  What a terrible failure  @@@";
    }
    return $winner;
}

function attack($t, $t_hp, $t_at, $t_df, $t_sp, $tvr, $r, $r_hp, $r_at, $r_df, $r_sp, $rvt) {
    while ($t_hp > 0 && $r_hp > 0) {
        $damage =  0;
        $damage = (($t_at * $tvr) - ($r_df * 0.5));
        if ($damage <= 0 && $tvr > 0)
            $damage = 1;
        if ($damage < 0)
            $damage = 0;
        echo "<br>$t does $damage damage to $r!<br>";
        $r_hp -= $damage;
        if ($r_hp <= 0)
            break;
        $damage =  0;
        $damage = (($r_at * $rvt) - ($t_df * 0.5));
        if ($damage <= 0 && $tvr > 0)
            $damage = 1;
        if ($damage < 0)
            $damage = 0;
        echo "<br>$r does $damage damage to $t!<br>";
        $t_hp -= $damage; 
    }
    if ($t_hp > 0 && $r_hp <= 0) {
        return $t;
    }
    elseif ($t_hp <= 0 && $r_hp > 0) {
        return $r;
    }
    else {
        return null;
    }
    
}
$finished = false;
while ($finished == false) {
    $tt = $t[$w];
    $rr = $r[$x];
    $tvr = $vs[$w];
    $rvt = $vs[$x];
    
    echo "--------------------------";
    echo "<br>-You choose $tt[0]";
    echo "<br>-$rival chooses $rr[0]";
    echo "<br>--------------------------<br>";
    
    echo "<br><br>
    ~~~~~~~~~~~~<br>
    ~~~Battle!!~~~<br>
    ~~~~~~~~~~~~<br>";

    $won = battle($tt[0], $tt[1], $tt[2], $tt[3], $tt[4], $tvr[$x], $rr[0], $rr[1], $rr[2], $rr[3], $rr[4], $rvt[$w]);
    
    $sql = 'SELECT xp, lvl_up, level, stat_points FROM pokemon WHERE poke_name = :poke_name';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':poke_name', $won);
    $success = $stmt->execute();
    if ($success) {
        echo "Stat grab successful";
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    else {
        echo "XP select failed";
    }

    $xp;

    if ($won == $tt[0]) {
        $xp = $row['xp'] + $tt[1];
        $w++;
    }
    elseif ($won == $rr[0]) {
        $xp = $row['xp'] + $rr[1];
        $x++;
    }
    else {
        echo "error with winner increment";
    }

    $lvl_up = $row['lvl_up'];
    $level = $row['level'];
    $pts = $row['stat_points'];

    while ($xp > $lvl_up) {
        echo "
        <br>  ^^^^^^^^^^^^^^^^^^^<br>
        ^^ $won leveled up! ^^
        <br>  ^^^^^^^^^^^^^^^^^^^<br>
        ";
        $level++;
        $pts += 3;
        $up = 10;
        $add = 10;
        for ($i = 1; i < $level; $i++){
            $add *= 1.03;
            $up += $add;
        }
        $lvl_up = $up;
    }


    $sql = 'UPDATE pokemon SET xp = :xp, lvl_up = :lvl_up, level = :level, stat_points = :pts WHERE poke_name = :poke_name';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':poke_name', $won);
    $stmt->bindParam(':xp', $xp);
    $stmt->bindParam(':lvl_up', $lvl_up);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':pts', $pts);
    $success = $stmt->execute();
    if ($success) {
        echo "Pokemon stats updated";
    }
    else {
        echo "Pokemon stats update failed";
    }

    
    if ($w > 3 && $x < 7) {
        $finished = true;
        echo "<br>*****************************";
        echo "<br>***** You are the winner!!! *****";
        echo "<br>*****************************";

        $sql = 'UPDATE trainers SET wins = wins + 1 WHERE name = :name';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $username);
        $success = $stmt->execute();
        if (!$success) {
            echo "Wins update failed";
        }
  
    }
    if ($w < 4 && $x > 6) {
        $finished = true;
        echo "<br>*****************************";
        echo "<br>* You lost...Keep training hard. *";
        echo "<br>*****************************";

        $sql = 'UPDATE trainers SET wins = wins + 1 WHERE name = :name';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $rival);
        $success = $stmt->execute();
        if (!$success) {
            echo "Wins update failed";
        }
    }
}



echo "<br><br><button><a href='trainer.php'>Trainer Page</a></button>";

?>