<?
if(file_exists('log/'.PATH_LOG)){
	$log = file('log/'.PATH_LOG);
	if(is_array($log)){
		echo '<ol>';
		foreach($log as $line){
			list($dt, $page, $ref) = explode('|', $line);
			$dt = date('d-m-Y H:i:s', $dt);
			echo <<<LINE
			<li>
				$dt: $ref --> $page
			</li>
LINE;
		}
		echo '</ol>';
	}
}