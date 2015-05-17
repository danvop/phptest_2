<pre>
<?php
$link = mysqli_connect('localhost', 'root', '', 'web');
$sql = 'SELECT * FROM teachers';
mysqli_query($link, "SET NAMES 'cp1251'");
//echo $sql;
$res = mysqli_query($link, $sql) or die(mysqli_error($link));
mysqli_close($link);

//var_dump($res);
while($row = mysqli_fetch_array($res))
	echo $row['name'].'<br>';//print_r($row);
?>