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

  $start = $from + 1;
  echo "<ol start='$start'>";
  foreach($stmt as $row){    
    echo  "<li>" . $row['code'] . "</li>";  
  }
  echo "</ol>";
}catch(PDOException $e){
  echo $e->getMessage();
}

for($i = 0; $i < $length / 10; $i++){
  $page = 1 + $i; 
  echo "\n<a href='index.php?page=$i'>$page</a>\n";
}





