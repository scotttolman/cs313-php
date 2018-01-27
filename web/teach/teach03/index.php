<html>
<body>

<form action="teach03.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Major:<br>

<?php

$majors = array("Computer Science", "Web Design and Development", 
"Computer Information Technology", "Computer Engineering");

for ($i = 0; $i < count($majors); $i++) {
echo "<input type='radio' name='major' value='$majors[$i]'>$majors[$i]<br>";
}

?>

Which of these continents have you been to?<br>
<input type="checkbox" name="visit[]" value="NA">North America<br>
<input type="checkbox" name="visit[]" value="SA">South America<br>
<input type="checkbox" name="visit[]" value="Eu">Europe<br>
<input type="checkbox" name="visit[]" value="As">Asia<br>
<input type="checkbox" name="visit[]" value="Au">Australia<br>
<input type="checkbox" name="visit[]" value="Af">Africa<br>
<input type="checkbox" name="visit[]" value="An">Antarctica<br>
Comments: <input type="text" name="comments">
<input type="submit">
</form>

</body>
</html>