<?php

try{
    $sql = "SELECT * FROM friends";
    $stmt = $conn->query($sql);
    
    foreach($stmt as $row){
        if($row['status'] == 1){
            if($row['user_two'] == $_SESSION['user']){
                $friend = $row['user_one'];
                echo $row['user_one'] . "| <a href='queries/confirm.php?user=$friend'>Confirm</a> " 
            . "| <a href='queries/reject.php?user=$friend'>Reject</a><br>";
            }
        }
    }
}catch(PDOException $e){
    $_SESSION['msg'] =  $e->getMessage() . " -> From received <br>";
}