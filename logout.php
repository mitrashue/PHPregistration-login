<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>


		 <div class="copy">
       	   <div class="wrap">
       	   	  <p><h1>Thanks for stopping by</h1></p>
			   <p><?= 'You have been logged out!'; ?></p>
			   <br><br>
			  <a href="index.php"><button class="button button-block"/>Home</button></a>
       	   </div>
       	 </div>
     
	
	
</body>
</html>
