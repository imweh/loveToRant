<?php

session_start();

include("includes/siteStatus.inc");


if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	}else{
	header('Location:http://www.lovetorant.com');
	die();
	}

				
if (isset($_REQUEST['show'])&&($_REQUEST['show'] != "")){
			$show = strip_tags($_REQUEST['show']);
			$filter = " AND type.typeName = '".$show."'";
			$showLabel = ucwords(strip_tags($_REQUEST['show']));
		}else{
			$show = "";
			$filter = "";
			$showLabel = "All";	
		}
		
		
if (isset($_REQUEST['category'])&&($_REQUEST['category'] != "")&&($_REQUEST['category'] != "All")){
			$category = strip_tags($_REQUEST['category']);
			$categoryFilter = " AND category.categoryName = '".strip_tags($_REQUEST['category'])."'";
		}else{
			$category = "All";
			$categoryFilter = "";
		}

if (isset($_REQUEST['criteria'])&&($_REQUEST['criteria'] != "")){
	$forwardCriteria = 	$_REQUEST['criteria'];			
	$criteria =  "AND ((rants.rantTitle LIKE '%".strip_tags($_POST['criteria'])."%') ";
	$criteria .=  "OR (rants.rantBody LIKE '%".strip_tags($_POST['criteria'])."%') ";
	$criteria .=  "OR (users.penName LIKE '%".strip_tags($_POST['criteria'])."%'))";
	
	
	}else{
	$forwardCriteria = "";
	$criteria ="";
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
		<title>Love To Rant | Climb On Your Soapbox And Speak Your Mind</title>
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
				
					<?php
	  $sql  = "SELECT Count(*) FROM rants INNER JOIN type ON type.typeId = rants.rantType INNER JOIN category ON category.categoryId = rants.rantCategory INNER JOIN users ON users.userId = rants.userId  WHERE rants.userId = '$myUserId' AND rantStatus = 'A'  $categoryFilter $filter $criteria ";
	$countResult = mysql_query($sql);
		  
	$r = mysql_fetch_row($countResult);
		  	
	$numrows = $r[0];
	

				
					
// number of rows to show per page
	$rowsperpage = 10;
	if ($mobile == 1){
		$rowsperpage = 3;
		}

// find out total pages
$totalpages = ceil($numrows / $rowsperpage);
//echo($numrows);
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

					
					
						$query  = "SELECT rants.rantId, rants.rantTitle, type.typeName, rants.rantBody, rants.name, rants.rantDate, rants.rantStatus, rants.rantLikes, rants.rantDislikes, rants.userId, users.penName, category.categoryName FROM rants INNER JOIN type ON type.typeId = rants.rantType INNER JOIN category ON category.categoryId = rants.rantCategory INNER JOIN users ON users.userId = rants.userId WHERE rants.userId = '$myUserId' AND rants.rantStatus = 'A' $categoryFilter $filter $criteria ORDER BY rants.rantDate DESC, rants.rantId DESC LIMIT $offset, $rowsperpage";
						$result = mysql_query($query);
						$rants = new rant();
	
			$i=1;
				 while($row = mysql_fetch_array($result, MYSQL_ASSOC))
					{ 
					
					if ($mobile == 1 && ($i % 3) == 0) {
					include("includes/textAd_Mobile.inc");
					}
					$rants->id = $row['rantId'];
					$rants->title = $row['rantTitle'];
					$rants->type = $row['typeName'];
					$rants->category = $row['categoryName'];
					$rants->body = $row['rantBody'];
					$rants->createdDate = $row['rantDate'];
					$rants->status = $row['rantStatus'];
					$rants->likes = $row['rantLikes'];
					$rants->dislikes = $row['rantDislikes'];
					$rants->creator = $row['userId'];
					
					$authorPenName = $row['penName'];

					$formattedCreatedDate = $rants->createdDate;
					$formattedCreatedDate = strtotime($formattedCreatedDate);
					$formattedCreatedDate = date("m/d/Y \a\t g:i a",$formattedCreatedDate);

					$countResult = mysql_query("SELECT COUNT(*) AS numOfComments FROM comments WHERE rantId ='$rants->id'") or
						die(mysql_error());
							$commentCount = mysql_fetch_array($countResult);
						
					include("includes/rantBox.inc");
					
					$i++;
					}
					
					
					?>
					<div class="mainPagination">
					<?php
					if ($currentpage > 1) {
					?><a href="<?php echo($_SERVER['PHP_SELF'])?>?currentpage=<?php echo($currentpage-1)?>&show=<?php echo($show)?>&category=<?php echo($category)?>&criteria=<?php echo($$forwardCriteria)?>" target="_self">Previous</a>
					<?php
					}
					if ($currentpage > 1 && $totalpages > 1 && $currentpage < $totalpages) {
					?>
					&nbsp;|&nbsp;
					<?php
					}
					if (($totalpages > 1) && ($currentpage < $totalpages)) {
					?><a href="<?php echo($_SERVER['PHP_SELF'])?>?currentpage=<?php echo($currentpage+1)?>&show=<?php echo($show)?>&category=<?php echo($category)?>&criteria=<?php echo($$forwardCriteria)?>" target="_self">Next</a>
					<?php
					}?>	
						
						
						   
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
