<?php 
	
	require_once("config.php");
	$con = new Connect();
	$zip = new  ZipArchive();
	$dirZipName= "./tmp/zip/";
	$fileExtractName= "./tmp/file/";
	$id = $_GET['id'];
	$fileGET = $_GET['filename'];
	$indexFile = $_GET['indice'];
	$ext = pathinfo($fileGET , PATHINFO_EXTENSION);
	$fileTmpName= "TMP__".$id."__".time();
	

	$sth = $con->access()->prepare("SELECT * FROM arquivo WHERE id = :ID");
 	$sth->bindValue(":ID",$id);
 	$result = $sth->execute();
 	$result = $sth->fetch(\PDO::FETCH_ASSOC);
 	if ($result) {
 		
        $data = $result['FILE'];
        $file = "TMP_".$id."__".time().".zip";
        $rote = $dirZipName.$file;

		$data64 = base64_decode($data);

		file_put_contents($dirZipName.$file, base64_decode($data));


		if( $zip->open( $rote )  === true){		    
	        $file = ($zip->getNameIndex($indexFile));
	        $state = ($zip->statName($indexFile));
     		$zip->extractTo($fileExtractName.$fileTmpName, array($fileGET));
			$zip->close();
		}

		$findFile = $fileExtractName.$fileTmpName;
		
		$quoted = sprintf('"%s"', addcslashes(basename($file), '"\\'));
		$size   = filesize($file);

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $quoted); 
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . $size);
 	
 	}
 	else {
 		echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                <div class='alert alert-danger'>
                    <strong>Erro!</strong>
                </div>";
 	}