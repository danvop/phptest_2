<?php
function clearStr($data){
  global $link; //need for avaliable $link in function
  return mysqli_real_escape_string($link,
                              trim(strip_tags($data)));
}
function clearInt($data){
  return abs((int)$data);
}
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
function saveBasket(){
  global $basket;
  $basket = base64_encode(serialize($basket));//base64_encode need for safety
  setcookie('basket', $basket, 0x7FFFFFFF);
}
function basketInit(){
  global $basket, $count;
  if(!isset($_COOKIE['basket'])){
    $basket = ['orderid' => uniqid()];
    saveBasket();
  }else{ 
    $basket = unserialize(base64_decode($_COOKIE['basket']));
    $count = count($basket) -1;//minus 'orderid'
  }
}
function add2Basket($id){
  global $basket;
  $basket[$id] = 1;
  saveBasket();
}