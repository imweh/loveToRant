<?php
session_start();

include("includes/siteStatus.inc");

if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	}

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

if (isset($_REQUEST['editRant'])){
	$editRantId = $_REQUEST['editRant'];
	}

$OkToEdit = false;	
if ($editRantId){

	$query  = mysql_query("SELECT rants.rantId, rants.rantTitle, rants.rantType, rants.rantCategory, rants.rantBody, users.penName FROM rants INNER JOIN users ON users.userId = rants.userId WHERE rants.userId = '$myUserId' AND rants.rantId = '$editRantId' LIMIT 1")
		  or die( mysql_error());
		  
			if(list($rantId, $rantTitle, $rantType, $rantCategory, $rantBody, $penName) = mysql_fetch_row($query)){
			$OkToEdit = true;
			}

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
		<title>Love To Rant | Rant</title>
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
			$(document).ready(function() {
                var myId = "<?php echo($myUserId)?>";
					
				});
				
				
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
			<?php	
				if (isset($_SESSION['myUserId'])){
					$myUserId = $_SESSION['myUserId'];
					
	
	?>
					<div class="profileContainer">
						<div id="loginError" class="loginError">&nbsp;</div>
						<div class="rantInputLine"><label for="rantTitle">Title:</label><br /><input id="rantTitle" name="rantTitle" type="text" size="50" maxlength="100" class="rantTitleInput" onkeydown="if (event.keyCode == 13) postRant()" value="<?php echo($rantTitle)?>" /></div>
            			<div class="rantInputLine">
            				<div class="rantCategoryHolder"><label for="rantCategory">Category:</label>
            				<select id="rantCategory" class="rantCategoryInput">
            					<option value="none">Select One</option>
            						<?php
            						$query  = "SELECT categoryId,categoryName FROM category WHERE status = 'active' ORDER BY categoryName ASC";
						$result = mysql_query($query);
						
	
			
				 while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				 
				 
				 ?>
            						<option value="<?php echo($row['categoryId'])?>"  <?php if ($rantCategory == $row['categoryId']){echo("selected=\"selected\"");}?>><?php echo($row['categoryName'])?></option>
            			<?php
            			}
            			?>		
            				</select>
            			</div>
            			
            			
            			<div class="rantTypeHolder">
            			<label for="rantType">Type:</label>
                            <select id="rantType" class="rantTypeInput">
            					<option value="none">Select One</option>
            					<option value="2"  <?php if ($rantType == "2"){echo("selected=\"selected\"");}?>>Peeved</option>
            					<option value="3"  <?php if ($rantType == "3"){echo("selected=\"selected\"");}?>>Pissed</option>
            					<option value="1"  <?php if ($rantType == "1"){echo("selected=\"selected\"");}?>>Pleased</option>
            				</select>
            			</div>
            			</div>
            			
            			<div class="rantInputLine"><label for="rantBody">Rant:</label><br /><textarea id="rantBody" name="rantBody" class="rantBodyInput" onkeydown="if (event.keyCode == 13) postRant()"> <?php echo($rantBody)?></textarea></div>
            			<div class="rantInputLine">
            			<div class="rantInputLine"><label for="name">Pen Name:</label><br /><?php echo($_SESSION['myPenName'])?><input id="name" name="name" type="hidden" size="25" maxlength="25" class="rantPenNameInput" onkeydown="if (event.keyCode == 13) postRant()" value="<?php echo($_SESSION['myPenName'])?>" /></div>
            			<?php
            			if ($editRantId){
            			?>
            			<input type="hidden" id="rantId" name="rantId" value="<?php echo($rantId)?>" />
            			<div class="rantInputLine"><input id="theSubmit" name="theSubmit" type="submit" value="Edit Rant" class="profileButton" onclick="return updateRant()" /></div>
            			<?php
            			}else{
            			?>
            			<div class="rantInputLine"><input id="theSubmit" name="theSubmit" type="submit" value="Post Rant" class="profileButton" onclick="return postRant()" /></div>
            			<?php
            			}
            			?>
            			
   				</div>
   				<?php
						}else{
						?>
						
						
						
						<div class="profileContainer">
						
							<p>
								You must be logged in to post a rant. If you are already registered, <a href="login.php?redirect=rant.php" target="_self">click here</a> to log in. Otherwise, <a href="register.php?redirect=rant.php" target="_self">click here</a> to register.
							</p>
						
							<p style="font-size: 12px; margin-top: 50px;">
							<span style="font-weight: bold;">Why do we ask that you register and log in to post at loveToRant.com?</span><br />
							We want your experience here to be the best it can. To keep solicitation and spam posts to a minimum we require registration before posting. Registering is quick and easy, and we will never share any of you information without your consent. To view our complete privacy notice <a href="privacy.php" target="_self">click here</a>.
							</p>
						
						
						
						</div>
						
						
						
						
						<?php
						}
						?>
				
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
