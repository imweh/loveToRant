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
		
		<title>Love To Rant | Register</title>
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
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
		<script type="text/javascript">
				</script>
		<?php
						include("includes/analytics.inc");
					?>
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
					<div class="profileContainer">
						<div id="registerError" class="errorBox">&nbsp;</div>
						<div class="profileTitle" >Register</div>
						<div class="registrationMessage">Only your pen name will be displayed. Your first name, last name, and email address will not be disclosed on the site.</div>
						<div class="loginInputLine"><label for="fName">First Name:</label><br /><input id="fName" name="fName" type="text" size="50" maxlength="50" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return register()" /></div>
        			    <div class="loginInputLine"><label for="lName">Last Name:</label><br /><input id="lName" name="lName" type="text" size="50" maxlength="50" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return register()" /></div>
        			    <div class="loginInputLine"><label for="penName">Pen Name:</label><br /><input id="penName" name="penName" type="text" size="50" maxlength="50" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return register()" /></div>
        			    <div class="loginInputLine"><label for="email">Email:</label><br /><input id="email" name="email" type="text" size="50" maxlength="100" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return register()" /></div>
        			    <div class="loginInputLine"><label for="password">Password:</label><br /><input id="password" name="password" type="password" size="50" maxlength="40" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return register()" /></div>
        			    <div class="loginInputLine"><label for="password2">Confirm Password:</label><br /><input id="password2" name="password2" type="password" size="50" maxlength="40" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return register()" /></div>
        			   <div class="profileOptInHolder">
			<div class="profileOptInText">
				<div class="profileOptInAnswerInput">
					<input id="updates" name="updates" type="checkbox" value="yes" />
				</div>
    			<ul class="profileOptInList">
    				<li><label for="updates">Keep me informed of changes, new features, and updates from LoveToRant.com</label></li>
    			</ul>
			</div>
    	</div>
        			     <div class="profileButtonHolder"><input id="submit" name="submit" type="submit" value="register" class="profileButton" onclick="return register()" />
					</div>
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
	</body>
</html>
