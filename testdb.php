<?php
	$db_username = 'vh3384_testuser';
	$db_password = 'Test1234!';
	$db_name     = 'vh3384_test';

	// Connect to the database
	$link = mysql_connect('localhost', $db_username, $db_password);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}

	// Select the database
	mysql_select_db($db_name , $link);

	// Create the table
	$result = mysql_query('CREATE TABLE IF NOT EXISTS temporarytable123(id INT NOT NULL AUTO_INCREMENT, '.
	                      'PRIMARY KEY(id), firstname VARCHAR(30), lastname VARCHAR(30))',$link);
	if(!$result) {
		die('Create table Error: '.mysql_error());
	}

	// Insert some data
	$result = mysql_query('INSERT INTO temporarytable123 (firstname, lastname) VALUES '.
	                      '(\'Fred\', \'Flinstone\')');
	if(!$result) {
		die('Insert failed: '.mysql_error());
	}
	$result = mysql_query('INSERT INTO temporarytable123 (firstname, lastname) VALUES '.
	                      '(\'Wilma\', \'Flinstone\')');
	if(!$result) {
		die('Insert failed: '.mysql_error());
	}

	// Select some data
	$result = mysql_query('SELECT id,firstname,lastname FROM temporarytable123');
	if(!$result) {
		die('Select failed: '.mysql_error());
	}

	// Print it
	while($row=mysql_fetch_row($result)) {
		echo $row[0]." ".$row[1]." ".$row[2]."<BR>\n";
	}

	// Remove some data
	$result = mysql_query('DELETE FROM temporarytable123 WHERE firstname=\'Fred\'');
	if(!$result) {
		die('Delete failed: '.mysql_error());
	}

	// Drop table
	$result = mysql_query('DROP TABLE temporarytable123');
	if(!$result) {
		die('Drop failed: '.mysql_error());
	}

	// Close connection
	mysql_close($link);
?>
