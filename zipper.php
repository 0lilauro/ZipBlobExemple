<?php 
	set_time_limit(12000);
	require_once("config.php");
	$con = new Connect();
	$zip = new  ZipArchive();
	var_dump($_REQUEST);
	var_dump($_FILES);
	function partArray($files){
		if (isset($files)) {
			$nameKeys = array_keys($_FILES['arquivo']);
			$simple = $nameKeys[0];
			$filesNum = count($_FILES['arquivo'][$simple]);
			$arrayFiles = array();

			$tempArray = array();
			foreach ($nameKeys as $key => $value) {
				$tempArray[$value]="";
			}	

			for ($i=0; $i < $filesNum ; $i++) { 
				array_push($arrayFiles, $tempArray);
			}
			for ($i=0; $i < $filesNum; $i++) { 
				foreach ($files as $key => $value) {
					$arrayFiles[$i][$key] = $value[$i];
				}
			}
			return $arrayFiles;
		}
		else {
			return null;	
		}
	}

	$Files = partArray($_FILES['arquivo']);
	var_dump($Files);

	$fileName = time()."zipFiles".count($Files).".zip";
	$tmpName = time()."zipFiles".count($Files);
	$dirZipName= "./tmp/zip/";
	$dirFileName= "./tmp/file/";
	
	if (isset($Files) && ($zip->open( $dirZipName.$fileName , ZipArchive::CREATE )  === true)) {

		foreach ($Files as $key => $arq) {
			$pathInfoFIle = $arq['name'];
			$ext = pathinfo($pathInfoFIle, PATHINFO_EXTENSION);
			$basename = pathinfo($pathInfoFIle, PATHINFO_BASENAME);
			$nameTmpArq = $tmpName."__".time()."__".$key."__.".$ext;
			$finalNameArq = $basename;
			if (move_uploaded_file($arq['tmp_name'], $dirFileName.$nameTmpArq)) {
				$zip->addFile(  $dirFileName.$nameTmpArq , $finalNameArq );
			}
		}
	    
	}
	$zip->close();
	if (file_exists($dirZipName.$fileName)) {
		$tamanhoImg = filesize($dirZipName.$fileName); 
        // $data = addslashes(file_get_contents($dirZipName.$fileName)); 
        $sqlimage =base64_encode(file_get_contents($dirZipName.$fileName)); 	
        // $sqlimage = addslashes(fread(fopen($dirZipName.$fileName, "r"), $tamanhoImg)); 
		var_dump($sqlimage);
	}

 	$sth = $con->access()->prepare("insert into arquivo values(null,default,:VALUE);");
 	// $sth = $con->access()->prepare("select id from arquivo;");
 	$sth->bindValue(":VALUE",$sqlimage);
 	$result = $sth->execute();

 	if ($result) {
 		echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                <div class='alert alert-success'>
                    <strong>Sucessfull!</strong>
                </div>";
 	}
 	else {
 		echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                <div class='alert alert-danger'>
                    <strong>Erro!</strong>
                    <pre>
                        ".$e."
                    </pre>
                </div>";
 	}


