<?php

$user = $_SESSION['user'];
$stmt = $conn->query("SELECT * FROM friends 
WHERE user_one = '$user' 
OR user_two = '$user' ");

while($row = $stmt->fetch()){
    if($row['user_two'] == $user){
        echo $row['user_one'];
        echo "<br>";
    }
    
}