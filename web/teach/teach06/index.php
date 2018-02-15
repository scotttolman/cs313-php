<?php

try {
$username = 'postgres';
$password = 'CS313-PHP';
$db = new PDO('pgsql:host=127.0.0.1;dbname = scriptures', $username, $password);
}
catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

$stmt = $db->query('SELECT name FROM topic');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<form action="teach06.php" method="POST" >
    Book <input type="text" name="book" id="book"> <br>
    Chapter <input type="text" name="chapter" id="chapter"> <br>
    Verse <input type="text" name="verse" id="verse"> <br>
    Content <textarea name="content" id="content" cols="30" rows="10"></textarea> <br>
    <?php
    foreach ($rows as $r) {
        echo "<input type='checkbox' name='topics[]' id='$r[name]'> $r[name] <br>";
    }
    ?>
    <input type="submit" value="Submit">
</form>