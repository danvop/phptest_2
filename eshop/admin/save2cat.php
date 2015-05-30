<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/config.inc.php";
    require "../inc/lib.inc.php";
	

function clearStr($data){
  global $link; //need for avaliable $link in function
  return mysqli_real_escape_string($link,
                              trim(strip_tags($data)));
}

if($_SERVER['REQUEST_METHOD']=='POST'){//check form sent or not
  $title = clearStr($_POST['title']);
  $author = clearStr($_POST['author']);
  $pubyear = abs((int)$_POST['pubyear']);
  $price = abs((int)$_POST['price']);
}
//echo "$title"."$author"."$pubyear"."$price";//test
if(!addItemToCatalog($title, $author, $pubyear, 
                     $price)){
  echo 'Произошла ошибка при добавлении товара 
                                  в каталог'; }
else{ header("Location: add2cat.php"); 
     exit;
}