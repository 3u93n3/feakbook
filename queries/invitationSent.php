<?php

try{
    $sql = "SELECT * FROM friends ";
    $stmt = $conn->query($sql);
    
    foreach($stmt as $row){
        if($row['user_one'] == $_SESSION['user']){
            echo $row['user_two'] . "<br>";
        }
        
    }


}catch(PDOException $e){
    $_SESSION['msg'] .=  $e->getMessage() . $e->getFile() . "<br>";
}