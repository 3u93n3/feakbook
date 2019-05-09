<?php

$sql = "SELECT * FROM posts";
$stmt = $conn->query($sql);

$sql1 = "SELECT * FROM friends 
WHERE user_one = ':user_1' AND user_two = ':user_2'
OR user_one = ':user_2' AND user_two = ':user_1'";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':user_1', $u1);
$stmt1->bindParam(':user_2', $u2);


while($row = $stmt->fetch()){
    $u1 = $_SESSION['user'];
    $u2 = $row['author'];
    $stmt1->execute();

    echo $stmt1->rowCount() . " -> " . $u1 . " -> " . $u2 . "<br />";

    if($stmt1->rowCount() > 0){
        $sub = $row['subject'];
        $con = $row['post'];
        $d = $row['post_data'];
        echo "<h3>$sub</h3>";
        echo date("d, D, Y " , strtotime($d));
        echo "<p>$con<p>";    
    }

    // if($row['public'] != 0){
        
    // }
    
}