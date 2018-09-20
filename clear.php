<?php 

$path = "./tmp/zip/";
$path1 = "./tmp/file/";
 
ClearOldFIles($path);
ClearOldFIles($path1);


function ClearOldFIles($path='')
{
	$list = scandir($path);
	unset($list[0]);
	unset($list[1]);
	$list = array_values($list);


	var_dump($list);
	$now = new DateTime();
	$timeNow = $now->format('YmdHis');

	foreach ($list as $key => $value) {
		if (file_exists($path.$value)) {
			$dateFile = date("YmdHis.", filectime($path.$value));
			if (($timeNow - $dateFile)>120000) {
				$dateResult = $timeNow - $dateFile;
			 	var_dump("$value -  foi modificado em: " . date ("YmdHis.", filectime($path.$value))."_ DIF: $dateResult");
	 		 	unlink($path.$value); 
			}
		}
	}
}

?>