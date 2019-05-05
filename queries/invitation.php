<?php

//user invite friend 
//echo $_GET['friend'] . "<br />" . $_SESSION['user'];




$sql1 = "INSERT INTO friends(user_one, user_two, status) 
VALUES(:u_1, :u_2, 1)";

$stmt = $conn->prepare($sql1);
$stmt->bindParam(':u_1', $_SESSION['user']);
$stmt->bindParam(':u_2', $_GET['friend']);



$stmt->execute();

