<?php
	$result = 0; //  answers count variable
	if(isset($_SESSION['test'])){
	//read answers from ini-file to array
	$answers = parse_ini_file("answers.ini");
	//pass through and search right answers
	foreach($_SESSION['test'] as $value){
		if(array_key_exists($value,$answers))
		//count right answers
		$result += (int)$answers[$value];
	}
	//clean session data
	session_destroy();
	}
?>
<table width="100%">
	<tr>
		<td align="left">
		<p>Ваш результат: <?= $result?> из 30</p>
		</td>
	</tr>
</table>