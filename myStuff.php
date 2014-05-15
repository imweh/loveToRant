<?php
session_start();

include("includes/siteStatus.inc");


include("includes/connection_LTR.inc");
include("includes/rant.inc");
include("includes/user.inc");


if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	}else{
	header('Location:http://www.lovetorant.com');
	die();
	}

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

		<title>Love To Rant | My Stuff</title>
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
						$getUser = new user();
						$query  = mysql_query("SELECT userId, fName, lName,penName, email, updates FROM users WHERE userId = '$myUserId' LIMIT 1")
						  or die( mysql_error());
		  
			list($getUser->id, $getUser->fName, $getUser->lName, $getUser->penName, $getUser->email, $getUser->updates) = mysql_fetch_row($query);

					?>
				<div id="contentLeft" class="contentLeft">
				
					
					<div id="profileContainer" class="profileContainer">
						<div class="profileTitle" >Profile</div>
						<div id="loginError" class="loginError">&nbsp;</div>
						<div class="profileLineContainer">
							<div class="profileLineLeft">
								<span>First Name:</span><span><?php echo($getUser->fName)?></span>
							</div>
							<div class="profileLineRight">
								<span>Last Name:</span><span><?php echo($getUser->lName)?></span>
							</div>
						</div>
						<div  class="profileLineContainer">
							<div class="profileLineLeft">
								<span>Pen Name:</span><span><?php echo($getUser->penName)?></span>
							</div>
							<div class="profileLineRight">
								<span>Email:</span><span><?php echo($getUser->email)?></span>
							</div>
						</div>
						
						<div class="profileOptInHolder">
							<div class="profileOptInText">
								<div class="profileOptInAnswer">
									<?php echo($getUser->updates)?> -
								</div>
								Keep me informed of changes, new features, and updates from LoveToRant.com
							</div>
						</div>
        			    
        				<div class="profileButtonHolder">
        					<input id="submitEdit" name="submitEdit" type="submit" value="Edit Profile" class="profileButton" onclick="return edit()" />
           				</div>
        				
        				<div class="profileButtonHolder">
        					<input id="submitChangePW" name="submitChangePW" type="submit" value="Change Password" class="profileButton" onclick="return changePass()" />
        				</div>
				
				</div>
				
								
					<!-- start favs -->
				
				<div class="profileContainer"> 
				<p><a href="myRants.php" target="_self">View Rants I&apos;ve Posted</a></p>

				<p>My Favorites</p>
						</div>  
							
					<?php
	 $sql  = "SELECT Count(*) FROM favorites WHERE userId = '$myUserId'";
	$countResult = mysql_query($sql);
		  
	$r = mysql_fetch_row($countResult);
		  	
	$numrows = $r[0];
	

				
					
// number of rows to show per page
$rowsperpage = 10;

// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

				$query  = 	"SELECT favoriteId, rantId FROM favorites WHERE userId = '$myUserId' ORDER BY dateEntered DESC LIMIT $offset, $rowsperpage";
					
						
						$result = mysql_query($query);
						
	
			$i=1;
				 while($row = mysql_fetch_array($result, MYSQL_ASSOC))
					{ 
					
					$thisRantId = $row['rantId'];
					$thisFavId = $row['favoriteId'];
					$rants = new rant();						
				$favQuery  = mysql_query("SELECT rants.rantId, rants.rantTitle, category.categoryName, type.typeName, rants.rantBody, rants.name, rants.rantDate, rants.rantStatus, rants.rantLikes, rants.rantDislikes, rants.userId, users.penName FROM rants INNER JOIN type ON type.typeId = rants.rantType INNER JOIN category ON category.categoryId = rants.rantCategory INNER JOIN users ON users.userId = rants.userId WHERE rants.rantId = '$thisRantId' LIMIT 1")
						  or die( mysql_error());
		  
			list($rants->id, $rants->title,$rantsCategoryName, $rantsTypeName, $rants->body, $rants->name, $rants->createdDate, $rants->status, $rants->likes, $rants->dislikes, $rants->creator, $authorPenName) = mysql_fetch_row($favQuery);
					
					
				$formattedCreatedDate = $rants->createdDate;
					$formattedCreatedDate = strtotime($formattedCreatedDate);
					$formattedCreatedDate = date("m/d/Y @ g:i a",$formattedCreatedDate);	
					

					
					$countResult = mysql_query("SELECT COUNT(*) AS numOfComments FROM comments WHERE rantId ='$rants->id'") or
						die(mysql_error());
							$commentCount = mysql_fetch_array($countResult);
					
					if ($mobile == 1 && ($i % 3) == 0) {
					include("includes/textAd_Mobile.inc");
					}
						
					include("includes/rantBox.inc");
					
					$i++;
					}
					
					
					?>
					<div class="mainPagination">
					<?php
					if ($currentpage > 1) {
					?><a href="<?php echo($_SERVER['PHP_SELF'])?>?currentpage=<?php echo($currentpage-1)?>" target="_self">Previous</a>
					<?php
					}
					if ($currentpage > 1 && $totalpages > 1 && $currentpage < $totalpages) {
					?>
					&nbsp;|&nbsp;
					<?php
					}
					if (($totalpages > 1) && ($currentpage < $totalpages)) {
					?><a href="<?php echo($_SERVER['PHP_SELF'])?>?currentpage=<?php echo($currentpage+1)?>" target="_self">Next</a>
					<?php
					}?>	
						
						
						   
					</div>

					
					
					
					
					
					<!-- End favs -->   
				
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
