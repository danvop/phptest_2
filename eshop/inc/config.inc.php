<?php
define('DB_HOST',      'localhost');
define('DB_LOGIN',     'root');
define('DB_PASSWORD',  '');
define('DB_NAME',      'eshop');
define('ORDERS_LOG',   'orders.log');
//connect with database
if(!$link = mysqli_connect(DB_HOST, DB_LOGIN,
                          DB_PASSWORD, DB_NAME)){
  // echo mysqli_connect_errno();
  //echo '<br>';
  echo mysqli_connect_error();
}
$basket = []; //user's basket
$count = 0; //goods count in a basket
basketInit(); //basket creation or reading
