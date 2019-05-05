<?php
$user = $_SESSION['user'];

if(isset($_GET['friend'])){    
    $sql1 = "INSERT INTO friends(user_one, user_two, status) 
    VALUES(:u_1, :u_2, 1)";

    $stmt = $conn->prepare($sql1);
    $stmt->bindParam(':u_1', $_SESSION['user']);
    $stmt->bindParam(':u_2', $_GET['friend']);



$stmt->execute();
}

$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);
while($row = $stmt->fetch()){
    $friend =  $row['userName'];

    $stmt2 = $conn->query("SELECT * FROM friends 
    WHERE user_one = '$user' AND user_two = '$friend'
    OR user_two = '$user' AND user_one = '$friend'");

    if($stmt2->rowCount() == 0){
        if($friend !== $user){
            echo $friend;
            echo "<a href='friends.php?friend=$friend'> invite </a> <br />";
        }
    }
     
}




