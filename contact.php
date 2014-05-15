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
					<div id="feedBackContainer" class="profileContainer">
						<div id="registerError" class="errorBox">&nbsp;</div>
						<div class="contactMessage">
							<p><span>CONTACT Us</span></p>
							<p>We always look forward to hearing feedback. Please feel free to drop us a note. We welcome your comments, and will answer any questions as quickly as possible.</p>
							
							<p>Emails of solicitation, however, are not appreciated and WILL NOT be answered.</p>

</div>


<!-- contact form 1 -->
<div class="contactFormOuter">
       
        <form action="contact.php" method="post" id="send mail">
        <div class="contactGroup">
        <div class="contactNameBox">
			<label for="name" class="contactNameLabel">Name:</label>
			<div class="contactNameInput"><input type="text" size="23" maxlength="45" id="name" name="name" value="" /></div>
		</div>
		 <div class="contactEmailBox">
			<label for="email" class="contactEmailLabel">Email:</label>
			<div class="contactEmailInput"><input type="text" size="23" maxlength="35" id="email" name="email" value="" /></div>
		</div>
		</div>
		<div class="contactCommentsBox">
			<label for="comments" class="contactCommentsLabel">Comments/Questions</label>
			<div class="contactCommentsInput"><textarea id="comments" name="comments" class="commentsTextInput" ></textarea></div>
		</div>
		<div class="contactSubmit"><input type="submit" value="Send" onclick="return sendFeedback()" /><input type="hidden" name="sendMessage" value="1" /></div>
		</form>



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
