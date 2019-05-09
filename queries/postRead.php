<?php

$sql = "SELECT * FROM posts ORDER BY post_data DESC";
$stmt = $conn->query($sql);

while($row = $stmt->fetch()){
    
    $u1 = $_SESSION['user'];
    $u2 = $row['author'];
    
    $sql1 = "SELECT * FROM friends 
    WHERE user_one = '$u1' AND user_two = '$u2'
    OR user_one = '$u2' AND user_two = '$u1'";

    $stmt1 = $conn->query($sql1);

    if($stmt1->rowCount() > 0 || $u1 == $u2 || $row['public'] == 1){
        $sub = $row['subject'];
        $cont = $row['post'];
        $d = date(" H:i d-D-Y" , strtotime( $row['post_data']));
        $auth = $row['author'];
        
        require "templates/postForm.php";
    }
}