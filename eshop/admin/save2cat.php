<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
    require "../inc/config.inc.php";
   	
if($_SERVER['REQUEST_METHOD']=='POST'){//check form sent or not
  $title = clearStr($_POST['title']);
  $author = clearStr($_POST['author']);
  $pubyear = clearInt($_POST['pubyear']);
  $price = clearInt($_POST['price']);
}
//echo "$title"."$author"."$pubyear"."$price";//test
if(!addItemToCatalog($title, $author, $pubyear, 
                     $price)){
  echo 'Произошла ошибка при добавлении товара 
                                  в каталог'; }
else{ header("Location: add2cat.php"); 
     exit;
}