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

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];
$topics = $_POST['topics'];

// The SQL statement
$sql = 'INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';

// Create the prepared statement
$stmt = $db->prepare($sql);

$stmt->bindValue(':book', $book);
$stmt->bindValue(':chapter', $chapter);
$stmt->bindValue(':verse', $verse);
$stmt->bindValue(':content', $content);

$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 313 06</title>
</head>
<body>
<?php
    echo '<ul>';
    echo '<li>'.$book.'</li>';
    echo '<li>'.$chapter.'</li>';
    echo '<li>'.$verse.'</li>';
    echo '<li>'.$content.'</li>';
    echo '<li>'.$rows[name].'</li>';
    echo '</ul>';
?>   
</body>
</html>
