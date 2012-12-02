<?php

include 'db.php';

$name = $_POST["name"];
$city = $_POST["city"];
$nation = $_POST["nation"];
$lat = $_POST["lat"];
$long = $_POST["long"];
$hospital_type = $_POST["hospital_type"];
$ambulance = $_POST["ambulance"];
$operatingblock = $_POST["operatingblock"];
$c4d = $_POST["c4d"];
$sizeofcatarea = $_POST["sizeofcatarea"];
$type = $_POST["type"];
$nurse = $_POST["nurse"];
$doctor = $_POST["doctor"];
$midwife = $_POST["midwife"];

function controllaCheckBox ($par)
{
	if ($par==NULL) return 0;
	else 1; 
}

$query = "INSERT INTO hmap.hospital (city, nation, hospital_type, hospital_name, longitude, latitude, ambulance, operating_block, CD4_testing, area_size, permission, nurse, doctor, midwife) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?)";

if($name == "" || $name == NULL)
{
	header("Location: gestione.php?s=err"); 
	die('none');
}

			$stmt = mysqli_stmt_init($dbi);
        	if(mysqli_stmt_prepare($stmt, $query))
        	{
        		    mysqli_stmt_bind_param($stmt, "sssssiiiisiiii", $city, $nation, $hospital_type, $name, $long, $lat, controllaCheckBox ($ambulance), controllaCheckBox ($operatingblock), controllaCheckBox ($c4d), $sizeofcatarea, $type, controllaCheckBox ($nurse), controllaCheckBox ($doctor), controllaCheckBox ($midwife)); 
        			mysqli_stmt_execute($stmt);
        
        			if(mysqli_stmt_affected_rows($stmt) > 0)
                    {
                    		  header("Location: gestione.php?s=ok"); 
                    }
                    else 
                    {
                    		  header("Location: gestione.php?s=err"); 
                    }        
                    mysqli_close($dbi);
                    mysqli_stmt_close($stmt);
        	} 
        	else 
        	{ 
        		echo "errore query";
        	}
            

?>
