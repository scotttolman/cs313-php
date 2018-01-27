<?php
session_start(); //must be first thing on page
//$_SESSION['name'] = 'Alex'; -- an example of session access


$MD = $_POST["_MD"];
$FB = $_POST["_FB"];
$WG = $_POST["_WG"];
$TB = $_POST["_TB"];
$PB = $_POST["_PB"];
$GB = $_POST["_GB"];
$UB = $_POST["_UB"];
$MB = $_POST["_MB"];

echo "Cart Page. MD = $MD";

echo 
"$MD
<br>
$FB
<br>
$WG
<br>
$TB
<br>
$PB
<br>
$GB
<br>
$UB
<br>
$MB";

?>