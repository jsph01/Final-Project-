<?php
if (!isset($_GET['id'])) {
    die("No userId provided");
}
include_once "Database.php";

$dbh = new Database(1);

$id = $_GET['id'];
$sql = "SELECT * FROM files WHERE id = $id";
//echo $sql;
$data = $dbh->query($sql)->fetch();
extract($data);

$filename = $name;

header("Content-Type: $type");
header("Content-Length: $size");
header("Content-Disposition: attachment; filename=\"$filename\"");

echo $content;
?>
       
