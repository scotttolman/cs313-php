<html>
<body>

<?php

$name = $_POST["name"];
$email = $_POST["email"];
$major = $_POST["major"];
$comments = $_POST["comments"];
$visit = $_POST["visit"];

$sites = array("NA"=>"North America", "SA"=>"South America", "Eu"=>"Europe", 
"As"=>"Asia", "Au"=>"Austrailia", "Af"=>"Africa", "An"=>"Antarctica");

echo "Your name is $name.<br>
<a href='mailto:$email'>$email</a><br>
Your major is $major<br>
Comments:<br>
$comments <br>
You have visited the following continents:<br>";
foreach ($sites as $k=>$v) {
    if (array_key_exists($k, $sites)) {
        echo "$v<br>";
    }
}
?>

</body>
</html>