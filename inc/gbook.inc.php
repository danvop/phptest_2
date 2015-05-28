<?php
/* Основные настройки */
define('DB_HOST',       'localhost');
define('DB_LOGIN',		'root');
define('DB_PASSWORD',	'');
define('DB_NAME',		'gbook');
if($link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME)){
 // echo mysqli_connect_errno();
  //echo '<br>';
  echo mysqli_connect_error();
}

function clearStr($data){
  global $link; //need for useing in function
  return mysqli_real_escape_string($link, trim(strip_tags($data)));
}

/* Сохранение записи в БД */
if($_SERVER['REQUEST_METHOD']=='POST'){//check form sent or not
  $name = clearStr($_POST['name']);
  $email = clearStr($_POST['email']);
  $msg = clearStr($_POST['msg']);
  $sql = "INSERT INTO msgs(name, email, msg)
          VALUES(?,?,?)";
  //
  $stmt = mysqli_prepare($link, $sql);
  mysqli_stmt_bind_param($stmt,"sss",$name,$email, $msg);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close;
  //mysqli_query($link, $sql) or die(mysqli_error($link));
  mysqli_close($link);
  header('Location: '.$_SERVER['REQUEST_URI']);
  exit;
}

/*  записи в БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */

/* Вывод записей из БД */
?>