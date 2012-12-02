<?
		session_start();
		if($_SESSION["login"] != "ok")
		{
			header("Location: join.php");
		}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
		    <meta charset="utf-8">
		    <title>Hmap - Insert data</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <meta name="description" content="">
		    <meta name="author" content="mattia" >
		
		    <!-- Le styles -->
		    <link href="css/bootstrap.css" rel="stylesheet">
		    <link href="css/style.css" rel="stylesheet">
		    <link href="css/bootstrap-responsive.css" rel="stylesheet">
		
		    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		    <!--[if lt IE 9]>
		      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		    <![endif]-->
		
		    <!-- Le fav and touch icons -->
		    <link rel="shortcut icon" href="ico/favicon.ico">
		    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
		    
		    <script src="js/jquery.js"></script>
	        <script src="js/code.js"></script>
	        <script> click_attivi = true;</script>
    
  </head>

  <body>
  	
    <div class="container">
    		<div class="row" id="menu">
	    		<div class="span3">
	    			<center>
	    				<img src="img/eli.png">
	    			</center>
	    		</div>
	    		
	    		<div class="span9">
	    				<ul>
		    				<li><a href="index.php"> <img src="img/1354366054_pushpin-1.png"> &nbsp; home</a></li>
		    				<li><a href="join.php"> <img src="img/1354396892_comment.png"> &nbsp; join with us</a></li>
		    				<? if($_SESSION['login']=="ok")echo '<li><a href="logout.php" id="searchMenu"><img src="img/out.png"> &nbsp; Logout</a></li>' ?>	    				</ul>
	    		</div>

    		</div>
    		
    		
    		<div class="row" style="margin-top:40px;">
	    			<div class="span12">
		    			    <? if(isset($_GET["s"]) && $_GET["s"] == "ok"): ?>
		    					 <div class="alert alert-success">
				                         Ho fatto ho fatto =)
				                 </div>
				            <? endif ?>
				            
				            <? if(isset($_GET["s"]) && $_GET["s"] == "err"): ?>
				            	  <div class="alert alert-error">
				                         Compila tutto prima di submittare roba
				                  </div>			
				           <? endif ?>
	    			</div>
    		</div>
    		
    		
    		<div class="row" id="main">
    		
	    		<div class="span5" id="search">
	    				
	    				<span class="title">Hi <? echo $_SESSION["nome"];?> </span>
	    		
			    		<form id="insert" action="check_insert.php" method="POST" style="margin-top: 30px;">
			    			<label>Name</label>
				    		<input type="text" id="name" name="name"/>
				    		
				    		<label>City</label>
				    		<input type="text" id="city" name="city"/>

				    		<label>Nation</label>
				    		<input type="text" id="nation" name="nation"/>

				    		<label>Latitude  <span style="padding-left: 45px;"></span> Longitude 
				    		<small>(decimal degree representation)</small></label>
				    		
				    		<input type="text" id="lat" name="lat" style="width:80px;" />
				    		<input type="text" id="long" name="long" style="width:80px;"/>

				    		<label>Hospital type</label>
					    	<select name="hospital_type" required>
								<option value ="1" selected>Basic Hospital</option>
								<option value ="2">Advanced Hospital</option>
								<option value ="3">Health Post</option>
								<option value ="4">Health Hut</option>
							</select>

							<br />
							<br />
				    		<label>Ambulance
				    		<input type="checkbox" value="0" id="ambulance" name="ambulance"/>
				    		</label>

				    		<br />
				    		<label>Operating Block
				    		<input type="checkbox" id="operatingblock" name="operatingblock"/>
				    		</label>

				    		<br />
				    		<label>CD4 testing
				    		<input type="checkbox" id="cd4" name="cd4"/>
				    		</label>	

				    		<br />
				    		<label>Size of catchment area</label>
				    		<input type="number" id="sizeofcatarea" name="sizeofcatarea"/>

				    		<label>Type</label>
					    	<select name="type" required>
								<option value ="public" selected>Public</option>
								<option value ="private">Private</option>
							</select>

							<br />
				    		<label>Nurse
				    		<input type="checkbox" id="nurse" name="nurse"/>
				    		</label>

				    		<br />
				    		<label>Doctor
				    		<input type="checkbox" id="doctor" name="doctor"/>
				    		</label>

				    		<br />
				    		<label>Midwife
				    		<input type="checkbox" id="midwife" name="midwife"/>
				    		</label>
				    		
				    		
				    		<br/><br/>
				    		<input class="btn btn-primary" value="Add hospital" type="submit">
			    		</form>
	    		</div>
    		
	    			    		
	    		<div class="span6" id="maps">
	    				<div id="demoMap"></div>
						<script src="http://www.openlayers.org/api/OpenLayers.js"></script>					    		
	    		</div>

    		</div>
    				
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/bootstrap.js"></script>
     <script src="js/jquery-cookie.js"></script>

  </body>
</html>
