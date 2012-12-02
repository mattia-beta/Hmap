<?
	
	$db = mysql_connect('host', 'user', 'password', 'database'); 
	$dbi = @mysqli_connect('host', 'user', 'password', 'database'); 

	if (mysqli_connect_error()) 
	{
		die('Could not connect to the database'); 
	}
	
?>