<?php
session_start();

include("includes/siteStatus.inc");

if (isset($_REQUEST['mobile'])&&($_REQUEST['mobile'] == "no")){
		$_SESSION['viewMobile'] = "no";
	}else{
		$_SESSION['viewMobile'] = "yes";
	}
	

 	include("includes/mobileCheck.php");

if ($_SESSION['viewMobile'] == "no"){
	$mobile = 0;
}


include("includes/connection_LTR.inc");
include("includes/rant.inc");
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
		<title>Love To Rant | About</title>
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
					<div class="aboutContainer">
						<p>
							<span style="font-weight:bold;">rant</span>: <span style="font-style:italic;">-verb</span> - to speak or declaim extravagantly or violently; talk in a wild or vehement way; rave (from dictionary.com)
						</p>
						<p>
							We all have a need to get things out sometimes. Sometimes what we have to say is good; sometimes it is bad. Sometimes we just need to express things that bother us.
						</p>
						
						<p>
							LoveToRant.com offers everyone the forum to express themselves.
						</p>
						
						<p>
							Speak your mind. Be heard. Listen to others.
						</p>
						
						<p>
							Think of it as self therapy!
						</p>
						
						<p>
							Sign up for an account to save your favorite rants to view later. Have a rant you really like? Have it made into a t-shirt or a mug.
						</p>
						
						<p>
							Remember, freedom of expression is a powerful thing. Please be mindful of what you are writing as well as what you are reading. Although there are no specific rules at LoveToRant.com, if you see something you feel is really offensive, please let us know. We will evaluate it and take action if we feel it is necessary. Keep in mind that everyone&apos;s opinion of acceptable and offensive is different. Any views or opinions expressed herein are solely those of the author and do not necessarily represent those of LoveToRant.com or its representatives.
						</p>

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
