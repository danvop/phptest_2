<?php
function addItemToCatalog($title, $author, $pubyear,
                          $price){
  $sql = 'INSERT INTO catalog (title, author, pubyear,
  price) 
      VALUES (?, ?, ?, ?)';
  global $link;
  if (!$stmt = mysqli_prepare($link, $sql))
    return false;
  mysqli_stmt_bind_param($stmt,"ssii", $title, $author, 
                         $pubyear, $price);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
}

function selectAllItems(){
  global $link;
  $sql = 'SELECT id, title, author, pubyear, price 
  FROM catalog';
  if(!$result = mysqli_query($link, $sql)) 
    return false;
  $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 
  mysqli_free_result($result);
  return $items;
}
