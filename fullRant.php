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
		

 	include("includes/mobileCheck.php");

if ($_SESSION['viewMobile'] == "no"){
	$mobile = 0;
}

				
$rantId = strip_tags($_REQUEST['rantId']);
include("includes/connection_LTR.inc");
include("includes/rant.inc");
include("includes/comment.inc");

$titleQuery  = mysql_query("SELECT rants.rantTitle, rants.rantBody FROM rants  WHERE rants.rantId = '$rantId' LIMIT 1")
						  or die( mysql_error());
		  
			list($rantTitle, $rantBody) = mysql_fetch_row($titleQuery);
			
			$line=$rantBody;
if (preg_match('/^.{1,128}\b/s', $rantBody, $match)) // 128 chars max plus ...read more for a max of 140 for twitter
{
    $line=$match[0]."...Read More";
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

		<title>Love To Rant | <?php echo($rantTitle) ?></title>
		<meta name="description" content="<?php echo($line) ?>" />
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
  					var myId = "<?php if (isset($_SESSION['myUserId'])){ echo($_SESSION['myUserId']); } ?>";
					var rantId =  "<?php echo($rantId) ?>";
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


					
					
						$query  = "SELECT rants.rantId, rants.rantTitle, type.typeName, category.categoryName, rants.rantBody, rants.name, rants.rantDate, rants.rantStatus, rants.rantLikes, rants.rantDislikes, rants.userId, users.penName FROM rants INNER JOIN type ON type.typeId = rants.rantType INNER JOIN category ON category.categoryId = rants.rantCategory INNER JOIN users ON users.userId = rants.userId WHERE rants.rantId = '$rantId' ORDER BY rants.rantDate DESC, rants.rantId DESC LIMIT 1";
						$result = mysql_query($query);
						$rants = new rant();
	
			
				 while($row = mysql_fetch_array($result, MYSQL_ASSOC))
					{ 
					
					$rants->id = $row['rantId'];
					$rants->title = $row['rantTitle'];
					$rantsTypeName = $row['typeName'];
					$rantsCategoryName = $row['categoryName'];
					$rants->type = $row['typeName'];
					$rants->category = $row['categoryName'];
					$rants->body = $row['rantBody'];
					$rants->createdDate = $row['rantDate'];
					$rants->status = $row['rantStatus'];
					$rants->likes = $row['rantLikes'];
					$rants->dislikes = $row['rantDislikes'];
					$rants->creator = $row['userId'];
					//put div here
					
					$authorPenName = $row['penName'];
					
					$formattedCreatedDate = $rants->createdDate;
					$formattedCreatedDate = strtotime($formattedCreatedDate);
					$formattedCreatedDate = date("m/d/Y @ g:i a",$formattedCreatedDate);	
					
					
					$countResult = mysql_query("SELECT COUNT(*) AS numOfComments FROM comments WHERE rantId ='$rants->id'") or
						die(mysql_error());
							$commentCount = mysql_fetch_array($countResult);
						
					include("includes/rantBox.inc");					
					
					
					
					}
					
					
					?>
					<div class="basicTitle">Comments</div>
					
					
					<!-- comments start here -->
					<?php
	 $sql  = "SELECT Count(*) FROM comments WHERE commentStatus = 'A' AND rantId='$rantId'";
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

					
					
						$commentQuery  = "SELECT comments.commentId, comments.rantId, comments.commentTitle, comments.commentBody,comments.name, comments.commentDate, comments.commentLikes, comments.commentDislikes, comments.userId FROM comments WHERE comments.commentStatus = 'A' AND comments.rantId='$rantId' ORDER BY comments.commentDate DESC, comments.commentId DESC LIMIT $offset, $rowsperpage";
						$commentResult = mysql_query($commentQuery);
						$comment = new comment();
	
			
				 while($commentRow = mysql_fetch_array($commentResult, MYSQL_ASSOC))
					{ 
					
					$comment->id = $commentRow['commentId'];
					$comment->rantId = $commentRow['rantId'];
					$comment->title = $commentRow['commentTitle'];
					$comment->body = $commentRow['commentBody'];
					$comment->name = $commentRow['name'];
					$comment->commentDate = $commentRow['commentDate'];
					$comment->likes = $commentRow['commentLikes'];
					$comment->dislikes = $commentRow['commentDislikes'];
					$comment->creator = $commentRow['userId'];
					$formatedCommentDate = $comment->commentDate;
					$formatedCommentDate = strtotime($formatedCommentDate);
					$formatedCommentDate = date("m/d/y \@ g:i a",$formatedCommentDate);

						
					?>
				
					<div class="commentOuter">
						<div class="rantInner">
							<div class="commentName">
									<?php echo($comment->name);?> says:
								</div>
								
							<div class="commentDate">
									<?php echo($formatedCommentDate);?>
								</div>

								
								
							<div class="rantTitleAndType">
								<div class="rantTitle">
									<?php echo($comment->title);?>
								</div>
							</div>
							<div class="rantBodyExpanding">
								<?php echo($comment->body);?>
							</div>
							
					
						</div>
						<div class="rantOptionBox">
								<div class="commentLikes"><a href="#" onclick="return increment('likeComment', '<?php echo($comment->id)?>')"><img src="images/happyIcon.png" class="likesImg" alt="Happy Icon" /></a><div><?php echo($comment->likes);?></div></div>
								<div class="commentDislikes"><a href="#" onclick="return increment('dislikeComment', '<?php echo($comment->id)?>')"><img src="images/angryIcon.png" class="dislikesImg" alt="Angry Icon" /></a><div><?php echo($comment->dislikes);?></div></div>
								
								
						</div>
					
					</div>
					
					
					
					<?php
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
					
					
					<!-- comments end here -->
					<div class="commentsContainer">
						<?php	
							if (isset($_SESSION['myUserId'])){
								$myUserId = $_SESSION['myUserId'];
					?>
						<div id="loginError" class="loginError">&nbsp;</div>
						<div class="rantInputLine"><label for="commentTitle">Title:</label><br /><input id="commentTitle" name="rantTitle" type="text" size="50" maxlength="100" class="rantTitleInput" onkeydown="if (event.keyCode == 13) postRant()" /></div>

						<div class="rantInputLine"><label for="commentBody">Comment:</label><br /><textarea id="commentBody" name="rantBody" class="rantBodyInput" onkeydown="if (event.keyCode == 13) postRant()"></textarea></div>
            			<div class="rantInputLine">
            			<div class="rantInputLine"><label for="name">Pen Name:</label><br /><?php echo($_SESSION['myPenName'])?><input id="name" name="name" type="hidden" size="25" maxlength="25" class="rantPenNameInput" onkeydown="if (event.keyCode == 13) postRant()" value="<?php echo($_SESSION['myPenName'])?>" /></div>
            			
            			<div class="rantInputLine"><input id="theSubmit" name="theSubmit" type="submit" value="Post Comment" class="profileButton" onclick="return postComment()" /></div>

					
					<?php	
						}else{
						
						?>
						<!-- this is if user is not logged in -->
						<p>
								You must be logged in to post a rant. If you are already registered, <a href="login.php?redirect=fullRant.php?rantId=<?php echo($rantId)?>" target="_self">click here</a> to log in. Otherwise, <a href="register.php?redirect=fullRant.php?rantId=<?php echo($rantId)?>" target="_self">click here</a> to register.
							</p>
						
							<p style="font-size: 12px; margin-top: 50px;">
							<span style="font-weight: bold;">Why do we ask that you register and log in to post at loveToRant.com?</span><br />
							We want your experience here to be the best it can. To keep solicitation and spam posts to a minimum we require registration before posting. Registering is quick and easy, and we will never share any of you information without your consent. To view our complete privacy notice <a href="privacy.php" target="_self">click here</a>.
							</p>
							
						
						<?php
						
						}
					?>
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
