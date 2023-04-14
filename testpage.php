<?php
include "./controller/updateInfo.php";
session_start();
var_dump($_SESSION['data']);
echo "<br>";
echo "<br>";
echo "<br>";
var_dump(getUser($_SESSION['data']['username']))

?>