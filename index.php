<!DOCTYPE html>
<html lang="en">
  <head>
		    <meta charset="utf-8">
		    <title>Hmap - Granular Health Map</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <meta name="description" content="">
		    <meta name="author" content="mattia" >
		
		    <!-- Le styles -->
		    <link href="css/bootstrap.css" rel="stylesheet">
		    <link href="css/style.css" rel="stylesheet">
		    <link href="css/bootstrap-responsive.css" rel="stylesheet">
		    <link href="css/legend.css" rel="stylesheet">
		
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
	        
	        <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
	        <link href='http://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
    
  </head>

  <body>

  <div class="container">
    
		    <!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="modal-titolo">Modal header</h3>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="sx">
							<img src="img/hospital.png" title="" alt="">
						</div>
						
						<div>
								<table border="0" id="modal-item">
								</table>
						</div>
					</div>				
			    </div>
				
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
			</div>
    
    
    		<div class="row" id="menu">
	    		<div class="span3">
	    			<center>
	    				<!-- <span class="aitch">H</span>
	    				<span class="logo">map</span> -->
	    				
	    				<img src="img/eli.png">
	    			</center>
	    		</div>
	    		
	    		<div class="span9">
	    				<ul>
		    				<li><a href="#" id="homeMenu"> <img src="img/1354366054_pushpin-1.png"> &nbsp; home</a></li>
		    				<li><a href="join.php"> <img src="img/1354396892_comment.png"> &nbsp; join with us</a></li>
		    				<li><a href="#" id="searchMenu"> <img src="img/1354397038_magnifying-glass.png">&nbsp; search</a></li>
	    				</ul>
	    		</div>

    		</div>
    		
    		<div class="row" id="main">
    		
	    		<div class="span4 hide" id="search">
			    			
			    			<span class="title">Search</span> <br><br>
			    			
			    			<span id="search-text">
				    			Here you can find what you want.. you can find what you want
				    			you can find what you want.
				    		</span>
			    			
			    			<div id="search-form">
				    			<label>Nation</label>
					    		<input type="text" id="nation" name="nation"/>
					    		
					    		<label>City</label>
					    		<input type="text" id="city" name="city"/>
					    		
					    		<br/><br/>
					    		<a class="btn btn-primary" id="do-find">find</a> &nbsp;
					    		<a class="btn" id="do-show-all">show all</a>
			    			</div>
				    		
	    		</div>
	    		
	    		<div class="span5" id="presentation">
	    				<span id="pres-text">
		    				On this page you can search for the nearest 
							hospital to you and have addictional 
							informations about the four different levels of
							 health system in your zone. We developed 
							this web application even to allow you contri
							bute to define as best as possible our health s
							ystem.
	    				</span>
	    				
	    				<center>
	    					<img src="img/ambulance.png" title="" alt="">
	    				</center>
	    				
	    				<center>
	    					<span class="title">Welcome to Hmap!</span>
	    				</center>
	    				
	    				<center>
		    				<a class="btn btn-warning" href="join.php">Collaborate</a>
	    				</center>


	    		</div>
	    			    		
	    		<div class="span6" id="maps">
	    				<div id="demoMap"></div>
						<script src="http://www.openlayers.org/api/OpenLayers.js"></script>		
						
						<div id="legend">
							<p>Map's legend:</p>
							<ul>
							<li><img src="img/a_h.png"/> Advanced Hospital</li>
							<li><img src="img/b_h.png"/> Basic Hospital</li>
							<li><img src="img/h_p.png"/> Health Post</li>
							<li><img src="img/h_h.png"/> Health Hut</li>
							</ul>
						</div>
	    		</div>

    		</div>
    				
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/bootstrap.js"></script>
     <script src="js/jquery-cookie.js"></script>
     <script src="js/ui.js"></script>

  </body>
</html>
