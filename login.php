<?php

session_start();

include("includes/siteStatus.inc");
if (isset($_REQUEST['mobile'])&&($_REQUEST['mobile'] == "no")){
		$_SESSION['viewMobile'] = "no";
	}else{
		$_SESSION['viewMobile'] = "yes";
	}




include("includes/connection_LTR.inc");
include("includes/rant.inc");


 	include("includes/mobileCheck.php");

if ($_SESSION['viewMobile'] == "no"){
	$mobile = 0;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
	<?php
			if ($mobile == 1)
			 {
		 ?>
			<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
		<?php
			}
		?>
		<title>Love To Rant | Login</title>
		<?php
					if ($mobile == 1)
			 			{
						?>
						<link href="css/mobile.css" media="screen" rel="stylesheet" type="text/css" />
						<link href="css/menu_m.css" media="screen" rel="stylesheet" type="text/css" /> 
						<?php
						}else{
						?>
						<link href="css/main.css" media="screen" rel="stylesheet" type="text/css" />
						<?php
						}
					?>




		<script type="text/javascript">
			$(document).ready(function() {
                var redirect;
  					<?php
				if (isset($_REQUEST['redirect'])){
				?>
					redirect = "<?php echo(strip_tags($_REQUEST['redirect']))?>";
				<?php
				}else{
				?>
					redirect = "index.php";
				<?php
				}
			?>

				});


		</script>


	</head>
	<body>
		<div id="main" class="main">
				<?php
					if ($mobile == 1)
			 			{
			 			include("includes/topAd_Mobile.inc");
						include("includes/headerMobile.inc");
						}else{
						include("includes/header.inc");
						}
					?>


			<div id="content" class="content">
				
				<?php
					
						if ($mobile != 1)
			 			{
			 			?>
				<div id="contentRight" class="contentRight">
					<?php
						include("includes/sideAds.inc");
					?>
				</div>
				<?php
					
						}
			 			?>
				<div id="contentLeft" class="contentLeft">
					<div class="registrationContainer">
						<div id="loginError" class="loginError">&nbsp;</div>
						<div class="loginInputLine"><label for="theEmail">Email:</label><br /><input id="theEmail" name="theEmail" type="text" size="50" maxlength="100" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) initLogin()" /></div>
            			<div class="loginInputLine"><label for="thePassword">Password:</label><br /><input id="thePassword" name="thePassword" type="password" size="50" maxlength="40" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) initLogin()" /></div>
            			<div class="loginSubmitLine"><input id="theSubmit" name="theSubmit" type="submit" value="login" class="rantCategoryInput" onclick="return initLogin()" /></div>
            			<div class="loginInputLine"><a href="#" onclick="return sendPass()">Forgot Password</a></div>
   				</div>
				
			</div>
			<?php
					if ($mobile == 1)
			 			{
						include("includes/footerMobile.inc");
						}else{
						include("includes/footer.inc");
						}
						
						?>
		</div>
            <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="js/common.js"></script>
            <?php
            include("includes/analytics.inc");
            ?>
	</body>
</html>
