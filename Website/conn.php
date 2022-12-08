<?php
$servername = "localhost";
$username = "root";
$password = (string) NULL;
$dbname = "Elternsprechtag";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
?>