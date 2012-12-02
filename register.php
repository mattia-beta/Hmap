<?php

include "db.php";

session_start();

//nome password mail
$user = $_POST['username'];
$password = sha1($_POST['password']);
$mail = $_POST['mail'];


$query = "INSERT INTO volontario (username, password, mail) VALUES (?, ?, ?)";			
        
    $stmt = mysqli_stmt_init($dbi);
    
	if(mysqli_stmt_prepare($stmt, $query))
	{
		    mysqli_stmt_bind_param($stmt, "sss", $user, sha1($password), $mail); 
			mysqli_stmt_execute($stmt);

			if(mysqli_stmt_affected_rows($stmt) > 0)
            {
            		  header("Location: join.php?s=ok");
            		  $_SESSION["registrato"] = "si";
            }
            else 
            {
            		  header("Location: join.php?s=err"); 
            }        
            mysqli_close($dbi);
            mysqli_stmt_close($stmt);
	} 
	else 
	{ 
		echo "errore query";
	}

?>