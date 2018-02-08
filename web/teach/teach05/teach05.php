<?php

$book = $_POST['book'];

try{
    $user = 'postgres';
    $password = '';
    $db = new PDO('pgsql:host=127.0.0.1;dbname=scriptures', $user, $password);
} catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

foreach ($db->query('SELECT * FROM scripture WHERE book = ' . $book) as $row)
{
  echo '<strong>Book</strong> - ' . $row['book'];
  echo '<strong>Chapter</strong> - ' . $row['chapter'];
  echo '<strong>Verse</strong> - ' . $row['verse'];
  echo '<strong>Content</strong> - ' . $row['content'];
  echo '<br/>';
}

?>