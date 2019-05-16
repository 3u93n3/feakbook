<?php

try{
  $amount = 10;
  if(isset($_GET['page'])){
    $from = $_GET['page'] * 10;
  }else{
    $from = 0;
  }
  $sql = "SELECT * FROM codes LIMIT $from, $amount";
  $stmt = $conn->query($sql);
  $length =  $conn->query("SELECT * FROM codes")->rowCount();
  echo $length . "<br>";
  foreach($stmt as $row){
    // print_r($row);
    echo $row['code_id'] . " --> " . $row['code'];
    echo "<br>";
  }
}catch(PDOException $e){
  echo $e->getMessage();
}

for($i = 0; $i < $length / 10; $i++){
  $page = 1 + $i; 
  echo "\n<a href='index.php?page=$i'>$page</a>\n";
}





