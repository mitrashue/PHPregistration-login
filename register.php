<?php

include("dbConfig.php");
include("function.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $website_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<!-- top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
    	 <?php 
	 include("header.php");
	 ?>
	 
       <div class="register_account">
          	<div class="wrap">
			
				  <?php
		
		if(isset($_POST['signme']))
		{
			
 
  
			 $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
			 $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
			 $email = mysqli_real_escape_string($con,$_POST['email_address']);
			 $password = mysqli_real_escape_string($con,$_POST['password']);
			 $phone = mysqli_real_escape_string($con,$_POST['phone_number']);
			 $ip = get_client_ip();
		 	 $ua=getBrowser();
	 		 $browser = $ua['name'];
			 $os=$ua['platform'];
			 $date = date("m/d/y");
			 $time =  date("h:i:s a");
			 
   
 
 
$stmt = mysqli_query($con,"INSERT INTO c1(`firstname`, `lastname`, `email`, `phone`,`password`, `ip`, `browser`, `os`,`date`,`time`) 
VALUES('$firstname','$lastname', '$email', '$phone', '$password', '$ip', '$browser', '$os', '$date', '$time')");
   
   
   if(!$stmt)
   {
	   echo mysqli_error($con);
   }
   
   else
   {
	   
	   echo "Sign Up was succesful! ...Redirecting to Login page..";
	   
	  ?>
	  
	  <script>
	  
	 window.setTimeout( function(){ window.location = "login.php";},2000);
	  </script>
	  <?php
	   
   }

	}
		 
		?>
		
		
		
		
    	      <h4 class="title">Create an Account</h4>
    		   <form action="register.php"  method="post">
    			 <div  class="col_1_of_2 span_1_of_2">
						<div><input type="text" value="First Name"  name="firstname"  /> </div>
		    			<div><input type="text" value="Last Name"   name="lastname"      /> </div>
						<div><input type="text" value="Phone Number" name="phone_number" /></div>
		    			<div><input type="mail" placeholder="E-Mail" value=""      name="email_address" size="80" minlength="3" maxlength="24" required />  </div><br>
		    			<div><input type="password" value=""  placeholder="Password"  name="password"  size="80" required   />  </div><br>

				 <div class="text-center" >
		         <input type="submit" name="signme" value="Register" class="grey" /><br/>
				 <p class="terms">By clicking 'Create Account' you agree to the <a href="terms/terms.html" target="_blank">Terms &amp; Conditions</a>.</p>
		         </div>
				 </div>
				 
		         <div class="clear"></div>
		    </form>
    	  </div> 
        </div>
		
	    	 <?php 
	 include("footer.php");
	 ?>
	 
       <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>