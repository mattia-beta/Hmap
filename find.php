<?php

	error_log("CITTA -> " . $_POST['city'] . " ,  STATO -> " .  $_POST['nation']);

	
	if(isset($_POST["city"]) && isset($_POST["nation"]))
	{
	    
	    include 'db.php';
	
		$citta = $_POST['city'];
		$nazione = $_POST['nation'];
			
		$query = "SELECT * FROM hmap.hospital, hmap.htype where city = '$citta' AND nation = '$nazione' AND htype.ID_htype = hmap.hospital.hospital_type";
		
		if(isset($_POST["s"]))
		{
			$query = "SELECT * FROM hmap.hospital";
		}


		$result = mysql_query($query);
		
		$y = 0;
		$vett = array();
		
		if($result != NULL)
		{
			while($row = mysql_fetch_row($result))
			{
					$ospedale = array();
			
			 		$num_of_fields = mysql_num_fields($result);
			 		
					for( $i = 0; $i < $num_of_fields; $i++)
					{
						$ospedale[mysql_field_name($result,$i)] = $row[$i];
					}
			
					$vett[] = $ospedale;
			
					next($row);
					$y++;
			}
		}
		else
		{
			$vett[] = array('status' => 'nothing found');
		}
	}
	else
	{
		$vett[] = array('error' => 'wrong post value');
	}
	
	echo json_encode($vett);

?>
