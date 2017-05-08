<?php

session_start();

$a = $_POST[loc];
$b = $_POST[days];
$c = $_SESSION["id"];




$conn = new PDO("mysql:host=localhost;dbname=Ajibola;",
                "root","root");




$conn->query("insert into plan_details2(location, days, U_id, Name) values('$a', '$b', '$c', 'plan_$a')");


echo $a;

echo $b;

echo $c;

echo 'Hello';


?>