<?php

try{
    
    $loggUser = $_SESSION['user'] ;

    $sql = "SELECT userName FROM users";
    $stmt = $conn->query($sql);

    foreach($stmt as $row){
        $user = $row['userName'];
        $result = $conn->query("SELECT * FROM friends 
        WHERE user_one = '$user' AND user_two = '$loggUser' 
        OR  user_one = '$loggUser' AND user_two = '$user'");
        if($result->rowCount() == 0){
            if($loggUser != $user){
                echo $user . "|" . "<a href='queries/invite.php?invite=$user'>Invite</a><br>";
            }
        }
    } 
}catch(PDOException $e){
    $_SESSION['msg'] =  $e->getMessage() . " -> From users <br>";
}