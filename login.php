<?
    session_start();    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {
            include 'db.php';
    
            $nome = $_POST["username"];     
            $hash = sha1($_POST["password"]);
            
            $query = "SELECT username FROM volontario WHERE username = ? and password = ?";			
        
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
	                      
	                    mysqli_close($db);
                    	mysqli_stmt_close($stmt);
        	
	                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=gestione.php">'; 
                    }	
        	}
            
        	mysqli_close($db);
        	mysqli_stmt_close($stmt);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Capelli D'Angelo - Accedi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="mattia" >

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
  </head>

  <body>


<?php include 'sito.php'?>
    <?php include 'menu.php';?>

    <div class="container">

        <div class="row" style="margin-top: 40px;">
        <div class="span1">
                   &nbsp
               </div>
               
            <div class="span10">
                 <?
               if($_SESSION["login"] == "no")
               {
                   echo '    <div class="alert alert-error">
                                Nome utente o password errati.
                                </div>';
               }
               else 
               {
                   if($_SESSION["login"] == "ok")
                   {
                       echo '    <div class="alert alert-success">
                                    Dati corretti! Accesso in corso!
                                    </div>';
                   }
                   else 
                   {
                        echo '    <div class="alert">
                                    Per accedere a questa pagina è necessario autenticarsi. <br/>
                                    Inserire <b>nome</b> e <b>password</b>.
                                    </div>';
                   }
               }
          ?>
            </div>
            
            <div class="span1">
                   &nbsp
               </div>

      </div>          
          
      <div class="row" style="margin-top: 40px;">
              <div class="span2">
                   &nbsp
               </div>
               
            <div class="span4">
                   <h2><img src="img/login.png"> &nbspAccedi</h2>
                   <p class="testo-home"> Inserisci nome e passoword per accedere al pannello di controllo del sito. 
                        Ogni tentativo fallito verrà comunicato all'amministratore di sistema.
                    </p>
            </div>
            
            <div class="span4">
                 <form name="frm-login" action="login.php" method="POST">
                            Nome utente: <br/>
                        <input type="text" name="username" value="" class="testo"><br>
                        Password: </br>
                        <input type="password" name="password" value="" class="testo"><br>
                        <input type="submit" value="Login">
                 </form>
            </div>
            
            <div class="span2">
                   &nbsp
            </div>
      </div>

      <hr>

      <footer>
        <p><?php echo Testo("footer");?></p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-alert.js"></script>

  </body>
</html>
