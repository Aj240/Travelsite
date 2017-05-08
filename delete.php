<?php

session_start();

$a = $_GET[name];
$b = $_GET[id];
$c = $_SESSION["id"];




$conn = new PDO("mysql:host=localhost;dbname=Ajibola;",
                "root","root");




$conn->query("DELETE FROM plan_details WHERE Name = '$a' AND days = '$b' AND ud_id= '$c'");