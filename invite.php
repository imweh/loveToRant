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
		<meta name="description" content="Speak your mind. Be heard. Listen to others. We all have a need to get things out sometimes. Sometimes what we have to say is good; sometimes it is bad. Sometimes we just need to express things that bother us. LoveToRant.com offers everyone the forum to express themselves." />
		<title>Love To Rant | Invite Friends</title>
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
					<div id="registrationContainer" class="profileContainer">
						<div id="registerError" class="errorBox">&nbsp;</div>
						<div style="position:static; margin:10px 0 5px 10px; width:230px; font-weight: bold; border-bottom:1px solid #666666;">Invite Friends</div>
						<div style="position:static; margin:10px 0 5px 10px;"><label for="name">Your Name:</label><br /><input id="name" name="name" type="text" size="50" maxlength="50" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			    <div style="position:static; margin:0 0 5px 10px;"><label for="email">Your Email:</label><br /><input id="email" name="email" type="text" size="50" maxlength="50" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			    <div style="position:static; margin:0 0 5px 10px;"><label for="friend1">Friend 1 Email:</label><br /><input id="friend1" name="friend1" type="text" size="50" maxlength="50" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			    <div style="position:static; margin:0 0 5px 10px;"><label for="friend2">Friend 2 Email:</label><br /><input id="friend2" name="friend2" type="text" size="50" maxlength="100" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			    <div style="position:static; margin:0 0 5px 10px;"><label for="friend3">Friend 3 Email:</label><br /><input id="friend3" name="friend3" type="text" size="50" maxlength="100" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			    <div style="position:static; margin:0 0 5px 10px;"><label for="friend4">Friend 4 Email:</label><br /><input id="friend4" name="friend4" type="text" size="50" maxlength="100" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			    <div style="position:static; margin:0 0 5px 10px;"><label for="friend5">Friend 5 Email:</label><br /><input id="friend5" name="friend5" type="text" size="50" maxlength="100" class="rantCategoryInput" onkeydown="if (event.keyCode == 13) return invite()" /></div>
        			  
        			    
        			     <div style="position:static; margin:0 0 5px 10px;"><input id="submit" name="submit" type="submit" value="send invites" class="rantCategoryInput" onclick="return invite()" />
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
            <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="js/common.js"></script>
            <?php
            include("includes/analytics.inc");
            ?>
	</body>
</html>
