<?
    session_start();    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {
            include 'db.php';
    
            $nome = $_POST["username"];     
            $hash = sha1($_POST["password"]);
            
            include 'check.php';
    
            //$nome =secureSQL( $_POST["username"]);     
            //$hash =secureSQL($_POST["password"]);
            
            $query = "SELECT username FROM volontario WHERE username = ? and password = ?";			
            
            try
            {
	        	$stmt = mysqli_stmt_init($dbi);
	        	if(mysqli_stmt_prepare($stmt, $query))
	        	{
	        		    mysqli_stmt_bind_param($stmt, "ss", $nome, $hash); 
	        			mysqli_stmt_execute($stmt);
	        
	        			mysqli_stmt_bind_result($stmt, $nome);
	        			  
	                    if(!mysqli_stmt_fetch($stmt))
	                    {
	                        $_SESSION['login'] = "no";
	                    }
	                    else 
	                    {
		                    $_SESSION['login'] = "ok";
		                    $_SESSION["nome"] = $nome;

		                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=gestione.php">'; 
	                    }	
	                    
	                    mysqli_close($dbi);
	                    mysqli_stmt_close($stmt);
	        	}
        	}
        	catch (Exception $e) 
        	{
        	}
 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
		    <meta charset="utf-8">
		    <title>Hmap - Granular Health Map - Join us</title>
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
		    
		     <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
	        <link href='http://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
    
  </head>

  <body>
  	
    <div class="container">
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
		    				<li><a href="index.php" id="homeMenu"> <img src="img/1354366054_pushpin-1.png"> &nbsp; home</a></li>
		    				<li><a href="#"> <img src="img/1354396892_comment.png"> &nbsp; join with us</a></li>
		    				<li><a href="index.php" id="searchMenu"> <img src="img/1354397038_magnifying-glass.png">&nbsp; search</a></li>
	    				</ul>
	    		</div>

    		</div>
    		
		    
		     <div class="row" style="margin-top: 40px;">               
		            <div class="span12">
		                 <?
				               if($_SESSION["login"] == "no")
				               {
				                   echo '    <div class="alert alert-error">
				                                Dati non validi
				                                </div>';
				               }
				               else 
				               {
				                   if($_SESSION["login"] == "ok")
				                   {
				                       echo '    <div class="alert alert-success">
				                                    Perfetto operazione andata a buon fine!
				                                    </div>';
				                      
				                         echo '<META HTTP-EQUIV="Refresh" Content="0; URL=gestione.php">'; 

				                   }
				                   else 
				                   {
				                        if($_SESSION["registrato"])
				                        {
					                        echo '<div class="alert alert-success">
					                        			Done! Welcome! Please log in =)
					                        		</div>';
				                        }
				                        
				                        
				                        echo '    <div class="alert">
				                                    You need to autenticate yourself!. <br/>
				                                    Insert your <b>username</b> and <b>password</b>.
				                                    </div>';
				                   }
				               }
		                  ?>
		            </div>
			 </div>                   
          
		    
		    <div class="row" style="margin-bottom: 60px;">
		    	<div class="span12">
						 <ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#register">Register</a></li>
							<li><a href="#login">Login</a></li>
						</ul>
						 
						<div class="tab-content">
							<div class="tab-pane active" id="login">
									<div class="row" style="margin-top: 40px;">
								              <div class="span2">
								                   &nbsp
								               </div>
								               
								              <div class="span4">
								                   <h2 class="title"><img src="img/login.png"> &nbsp; Login</h2>
								                   <p class="testo-home"> Inserisci nome e passoword per accedere al pannello 
								                   di controllo del sito. 
								                   Ogni tentativo fallito verrà comunicato all'amministratore di sistema.
								                    </p>
								              </div>
								            
								            <div class="span4" style="padding-top: 45px;">
								                 <form name="frm-login" action="join.php" method="POST">
								                            Nome utente: <br/>
								                        <input type="text" name="username" value="" class="testo"><br>
								                        Password: </br>
								                        <input type="password" name="password" value="" class="testo"><br><br>
								                        <input type="submit" class="btn btn-primary" value="Login">
								                 </form>
								            </div>
								            
								            <div class="span2">
								                   &nbsp
								            </div>
								       </div>
							</div>
							<div class="tab-pane" id="register">
									<div class="row" style="margin-top: 40px;">
								              <div class="span2">
								                   &nbsp
								               </div>
								               
								              <div class="span4">
								                   <h2 class="title"><img src="img/login.png"> &nbsp; Register</h2>
								                   <p class="testo-home"> Inserisci nome e passoword per accedere al pannello 
								                   di controllo del sito. 
								                   Ogni tentativo fallito verrà comunicato all'amministratore di sistema.
								                    </p>
								              </div>
								            
								            <div class="span4" style="padding-top: 45px;">
								                 <form name="frm-login" action="register.php" method="POST">
								                         Nome utente: <br/>
								                        <input type="text" name="username" value="" class="testo"><br>
								                        
								                        Password: </br>
								                        <input type="password" name="password" value="" class="testo"><br>
								                        
								                        Mail: </br>
								                        <input type="text" name="mail" value="" class="testo"><br><br>
								                        
								                        <input type="submit" class="btn btn-primary" value="Register">
								                 </form>
								            </div>
								            
								            <div class="span2">
								                   &nbsp
								            </div>
								      </div>											
							</div>

					  </div>
		    	</div>
		    </div>
          
			
			
	
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/bootstrap.js"></script>
     <script src="js/jquery-cookie.js"></script>
     <script src="js/join.js"></script>

  </body>
</html>
