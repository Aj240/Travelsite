<?php

session_start();

$b = $_GET[id];
$c = $_GET[userId];
$d = $_SESSION["id"];



//$conn = new PDO ("mysql:host=localhost;dbname=Ajibola", "root","root");//

 $conn = new PDO("mysql:host=localhost;dbname=Ajibola;",
                "root","root");

if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {

//$conn = mysql_connect("mysql:host=localhost;dbname=Ajibola", "root", "root");//


$result = $conn->query("select * from Plan_details where days = '$b' AND ud_id = '$d'");

//$result2 = $conn->query("SELECT * FROM sc_users WHERE username = '$uname'");//

$row = $result->fetch();

//$row1 = $result2->fetch();//



while($row) {


echo "<div class='result'>";
echo "<p class='name_2'>$row[Name] </br>";
echo "</p>";
echo "<p>Hours:</p><form> <input type='number' name='quantity' class='timing'
   min='0' max='24' step='1' value='1'></form>";
   
   echo "</div>";

$row = $result->fetch();

}

}




else {
 
 
 echo "<p> Please register an account - its quick</p>";
 echo "<p> Already a user? login here!</p>";
 
}
    
   /* $result = $conn->query("select * from Plan_details where days = '$b'");

//$result2 = $conn->query("SELECT * FROM sc_users WHERE username = '$uname'");//

$row = $result->fetch();

//$row1 = $result2->fetch();//



while($row) {


echo "<p class='result'>";
echo "Location: $row[Name] </br>";
echo "</p>";

$row = $result->fetch();

} */
    
    






?>