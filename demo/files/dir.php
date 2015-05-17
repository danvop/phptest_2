<pre>
<?php
print_r(scandir('.'));
exit;
$dir = opendir('.');
while($name = readdir($dir)){
	if($name == '.' or $name == '..')
		continue;
	if(is_dir($name))
		echo '<b>['.$name.']</b><br>';
	else
		echo $name.'<br>';
}	
closedir($dir);
?>