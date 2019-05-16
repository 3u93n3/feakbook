<?php
session_start();
require "../includes/dbc.php";

$user = $_POST['admin'];
$pass = $_POST['adminPass'];
try{
    $sql = "SELECT * FROM administration WHERE admin = '$user'
    AND admin_pass = '$pass'";
    $stmt = $conn->query($sql);
    if($stmt->rowCount() == 1){
        $_SESSION['admin'] = $user;

        header("Location: index.php?msg=logged in");
    }else{
        header("Location: index.php?msg=no such user");
    }

}catch(PDOException $e){
    echo $e->getMessage();
    echo $e->getFile();
}

