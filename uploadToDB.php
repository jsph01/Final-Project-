<html><head></head>
<?php
	include_once "Database.php";
    $dbh = new Database();
    $status=0;
	if($_FILES['file1']['size'] > 0)
	{
		$fileName = $_FILES['file1']['name'];
		$tmpName  = $_FILES['file1']['tmp_name'];
		$fileSize = $_FILES['file1']['size'];
		$fileType = $_FILES['file1']['type'];
		//echo "uploading: $fileName\n";
		
        $fp = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        $query = "INSERT INTO files (parent_id, name, size, type, parent_type, user_id, use_alias, content, status, uploaded ) " .
                    "VALUES (1, '$fileName', '$fileSize', '$fileType', 1 ,1, 0, '$content', 1,SYSDATE())";
        //echo $query;
		
        $dbh->execute($query);

        $dbh->close();
		
        $fileName = "files/" . $fileName;
        //unlink($fileName);
		//echo "File $fileName Uploaded";
  		move_uploaded_file ($tmpName, $fileName);
        //return 1;
	}
?>
    <body>
        <script type="text/javascript">
			var fileName = "<?php echo $fileName?>";
			//alert("Uploaded: "+fileName);
			window.parent.UploadPic_Callback(fileName);
        </script>
    </body>
</html>