<?php
require "../includes/dbc.php";


function rnd(){
  $chars= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $chLen = strlen($chars);
  $code = "";
  for($i = 0; $i < 8; $i++){
    $code .= $chars[mt_rand(0, $chLen - 1)];
  }

  return $code;
}

// $_SESSION['code'] = rnd();

try{
  $code = rnd();
  $sql = "INSERT INTO codes (code) VALUE ('$code')";
  $conn->exec($sql);

}catch(PDOException $e){
  echo $e->getMessage(); 
}

header("Location: index.php");