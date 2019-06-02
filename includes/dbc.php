<?php

function conn(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "fakebook";
    $char = "utf8mb4";
    $dsn = "mysql:host=$host;dbname=$db;charset=$char";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];   

    try{
        $conn = new PDO($dsn, $user, $pass, $opt);
        //echo "Connected successfully";         
    } catch(PDOException $e){
        die($e->getMessage());
    }

    return $conn;
    
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}