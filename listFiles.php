<html><head><title>My Files</title>
<script>
	function getFile(id)
	{
		alert(id);
		window.open ("download.php?id="+id, "hiddenFrame");
	}
</script>
</head>
<body>
<table border='1'>
<a href='upload.html'>Upload File</a>
<tr><th>Name</th><th>Size</th><th>Uploaded</th></tr>

<?php
	include_once "Database.php";

	$dbh = new Database();

	$stmt = $dbh->query ("SELECT id, name, size, uploaded FROM files ORDER BY name");
	echo "";
	$ct = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$id=$row['id'];
		$name=$row['name'];
		$size=$row['size'];
		$uploaded=$row['uploaded'];
		echo "<tr><td><a href='javascript:getFile($id)'>$name</a></td><td>$size</td><td>$uploaded</td></tr>";
		++$ct;
	}
	$dbh->close();
	echo "</table><p>Total Files: $ct</p>";
?>


<iframe src="about:blank" name="hiddenFrame" width=0 height=0 frameborder=0></iframe>

</body>
</html>