<?php

try{
    $sql = "SELECT * FROM friends WHERE status = 2";
    $stmt = $conn->query($sql);
    
    foreach($stmt as $row){
        if($_SESSION['user'] == $row['user_one'] 
        || $_SESSION['user'] == $row['user_two']){
            
            if($_SESSION['user'] == $row['user_one']){
                echo $row['user_two'] . "<br>";
            }else{
                echo $row['user_one'] . "<br>";
            }
        }
        
    }    
}catch(PDOException $e){
    $_SESSION['msg'] .=  $e->getMessage() . $e->getFile() . "<br>";
}