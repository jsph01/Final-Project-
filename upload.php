<html><head></head>
<?php
    $status=0;
	if( $_FILES['file1']['size'] > 0)
	{
		extract( $_POST );
		$fileName = $_FILES['file1']['name'];
		$tmpName  = $_FILES['file1']['tmp_name'];
		$fileSize = $_FILES['file1']['size'];
		$fileType = $_FILES['file1']['type'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));

		fclose($fp);
        $fileName = "files/" . $fileName;
        //unlink($fileName);
  		move_uploaded_file ($tmpName, $fileName);
        $status=1;
	}
?>
    <body>
		<p>File Uploaed!</p>
    </body>
</html>