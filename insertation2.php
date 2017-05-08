
<?php

session_start();

$a = $_POST[idd];
$b = $_POST[namer];
$c = $_POST[quantity];


$d = $_SESSION["id"];


$conn = new PDO("mysql:host=localhost;dbname=Ajibola;",
                "root","root");




$conn->query("insert into Plan_details(public_id, Name, days, ud_id) values('$a', '$b', '$c', '$d')");


echo $a;

echo $b;

echo 'Hello';


?>