<?php

$conn = "";

function conn(){
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'fakebook'; 
    $char = 'utf8mb4';
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    $dsn = "mysql:host=$host;dbname=$db;charset=$char";

    try{
        $pdo = new PDO($dsn, $user, $pass, $opt);
    }catch(PDOException $e){
        die('This is error --> ' . $e->getMessage());
    }
    return $pdo;
};


if($conn){
    return $conn;
}else{
    $conn = conn();
}

function sanitize_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}