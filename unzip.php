<?php 
	require_once("config.php");
	$con = new Connect();
	$zip = new  ZipArchive();
	$dirZipName= "./tmp/zip/";
	$id = 37;

	$sth = $con->access()->prepare("SELECT * FROM arquivo WHERE id = :ID");
 	$sth->bindValue(":ID",$id);
 	$result = $sth->execute();
 	$result = $sth->fetch(\PDO::FETCH_ASSOC);
 	if ($result) {
 		echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                <div class='alert alert-success'>
                    <strong>Sucessfull!</strong>
                </div>";
        $data = $result['FILE'];
        var_dump($data);
        $file = "TMP_".$id."__".time().".zip";
        $rote = $dirZipName.$file;

		$data64 = base64_decode($data);

		file_put_contents($dirZipName.$file, base64_decode($data));


		if( $zip->open( $rote )  === true){
		    var_dump($zip);
		    for ($i = 0; $i < $zip->numFiles; $i++) {
	        	$file = ($zip->getNameIndex($i));
	        	echo "<a href='./downZip.php?id=".$id."&filename=".$file."'>".$file."</a></br>";
     		}
			$zip->close();
		}
 	
 	}
 	else {
 		echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                <div class='alert alert-danger'>
                    <strong>Erro!</strong>
                </div>";
 	}