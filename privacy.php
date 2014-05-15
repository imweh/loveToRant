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
		<title>Love To Rant | Privacy Policy</title>
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
				
				<div class="privacyContainer">
				
					
					<div class="privacyHeading">Disclaimer</div>
					<div class="privacyBody">
						Any views or opinions expressed herein are solely those of the author and do not necessarily represent those of LoveToRant.com or its representatives. This site has been created for the purpose of providing entertainment to visitors. It is not intended to provide any advice or guidance of any kind.
					</div>
					
					<div class="privacyHeading">Our Privacy Policy</div>
					<div class="privacyBody">
						Any personal information that you may share with LoveToRant.com is kept absolutely private. Neither your name nor anything about you is sold or shared with any other company or agency. Users will never be implicitly added to any marketing lists. Users subscribe to mailing lists by clicking on a checkbox in a form that clearly states what the checkbox means. The User has the right to opt-in or opt-out at any time.</div>
						
					<div class="privacyBody">
						LoveToRant.com may collect personally identifiable information from Users in a variety of ways, including through online forms or other instances where Users are invited to volunteer such information. LoveToRant.com may also collect information about how Users use our Web site, for example, by tracking the number of unique views received by the pages of the Web site or the domains from which Users originate. We may use "cookies" to track how Users use our Web site. A cookie is a piece of software that a Web server can store on the Users’ PC and use to identify the User should they visit the Web site again. While not all of the information that we collect from Users is personally identifiable, it may be associated with personally identifiable information that Users provide us through our Web site.
					</div>
					
					<div class="privacyHeading">Questions</div>
					<div class="privacyBody">
						Users may direct questions concerning this Privacy Policy by email to info@lovetorant.com
					</div>
				
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
						
						?>		</div>
	</body>
</html>
