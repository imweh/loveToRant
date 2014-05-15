<?php

session_start();


include("../includes/connection_LTR.inc");
include("../includes/user.inc");
include("../includes/rant.inc");
include("../includes/comment.inc");

$action = strip_tags($_REQUEST['action']);
$theId = strip_tags($_REQUEST['theId']);

call_user_func($action, $theId);

function likeRant($theId){
mysql_query("UPDATE rants SET rantLikes=rantLikes + 1 WHERE rantId='$theId'");

}

function dislikeRant($theId){
mysql_query("UPDATE rants SET rantDislikes=rantDisLikes + 1 WHERE rantId='$theId'");

}

function likeComment($theId){
mysql_query("UPDATE comments SET commentLikes=commentLikes + 1 WHERE commentId='$theId'");

}

function dislikeComment($theId){
mysql_query("UPDATE comments SET commentDislikes=commentDislikes + 1 WHERE commentId='$theId'");

}

function addFav($theId){

if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	}
	
mysql_query("INSERT INTO favorites (rantId, userId) VALUES ('$theId', '$myUserId')");

}


function removeFav($theId){

if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	}
	
mysql_query("DELETE FROM favorites WHERE favoriteId = '$theId'");

}

function getUserEdit($theId){

$user = new user();
$query  = mysql_query("SELECT userId, fName, lName,penName, email, updates FROM users WHERE userId = '$theId' LIMIT 1")
		  or die( mysql_error());
		  
			list($user->id, $user->fName, $user->lName, $user->penName, $user->email, $user->updates) = mysql_fetch_row($query);


?>
	
	<div class="profileTitle" >Profile</div>
	<div id="loginError" class="loginError">&nbsp;</div>
		<div class="profileLineContainer">
			<div class="profileLineLeft">
				<label for="fName">First Name:</label><span><input id="fName" name="fName" type="text" size="50" maxlength="50" class="profileInputLeft" value="<?php echo($user->fName)?>" onkeydown="if (event.keyCode == 13) return register()" /></span>
			</div>
			<div class="profileLineRight">
				<label for="lName">Last Name:</label><span><input id="lName" name="lName" type="text" size="50" maxlength="50" class="profileInputRight" value="<?php echo($user->lName)?>" onkeydown="if (event.keyCode == 13) return register()" /></span>
			</div>
		</div>
		<div class="profileLineContainer">
			<div class="profileLineLeft">
				<label for="penName">Pen Name:</label><span><input id="penName" name="penName" type="text" size="50" maxlength="50" class="profileInputLeft" value="<?php echo($user->penName)?>" onkeydown="if (event.keyCode == 13) return register()" /></span>
			</div>
			<div class="profileLineRight">
				<label for="email">Email:</label><span><input id="email" name="email" type="text" size="50" maxlength="100" class="profileInputRight" value="<?php echo($user->email)?>" onkeydown="if (event.keyCode == 13) return register()" /></span>
			</div>
		</div>
		<div class="profileOptInHolder">
			<div class="profileOptInText">
				<div class="profileOptInAnswerInput">
					<input id="updates" name="updates" type="checkbox" value="yes" <?php if ( $user->updates == "yes"){?>checked="checked"<?php } ?> />
				</div>
    			<ul class="profileOptInList">
    				<li><label for="updates">Keep me informed of changes, new features, and updates from LoveToRant.com</label></li>
    			</ul>
			</div>
    	</div>
        			    
        <div class="profileButtonHolder">
        	<input id="submitUpdate" name="submitUpdate" type="submit" value="Update Profile" class="profileButton" onclick="return update()" />
        </div>
		<div class="profileButtonHolder">
			<input id="submitCancel" name="submitCancel" type="submit" value="Cancel" class="profileButton" onclick="window.location.reload()" />
		</div>


<?php

}

function checkDuplicatePenName(){
$theId = $_REQUEST['theId'];
$penName = $_REQUEST['penName'];

$query  = mysql_query("SELECT penName FROM users WHERE (penName ='$penName' AND userId != '$theId') LIMIT 1")
		  or die( mysql_error());
		  
			if (list($duplicatePenName) = mysql_fetch_row($query)){
			
			echo ("That Pen Name is taken. Please choose another!");

			}

	}

function updateUser($theId){

	$theUser = new user();
	
	$theUser->id = strip_tags($_REQUEST['theId']);
	$theUser->fName = strip_tags($_REQUEST['fName']);
	$theUser->lName = strip_tags($_REQUEST['lName']);
	$theUser->penName = strip_tags($_REQUEST['penName']);
	$theUser->updates = strip_tags($_REQUEST['updates']);
	$theUser->email = strip_tags($_REQUEST['email']);
	$theUser->question = "";
	$theUser->answer = "";

	
$theUser->updateDB();

}

function getChangePass($theId){

?>
	<div id="changePassTitle" class="profileTitle">
		Change Password
	</div>
	<div class="passwordEditLine">
		<label for="password">Current Password:</label>
		<input id="password" name="password" type="password" size="50" maxlength="50" class="profileInputRight" value="" onkeydown="if (event.keyCode == 13) return updatePass()" />
	</div>
	<div class="passwordEditLine">
		<label for="newPassword1">New Password:</label>
		<input id="newPassword1" name="newPassword1" type="password" size="50" maxlength="50" class="profileInputRight" value="" onkeydown="if (event.keyCode == 13) return updatePass()" />
	</div>
	<div class="passwordEditLine">
		<label for="newPassword2">Confirm Password:</label>
		<input id="newPassword2" name="newPassword2" type="password" size="50" maxlength="50" class="profileInputRight" value="" onkeydown="if (event.keyCode == 13) return updatePass()" />
	</div>
	<div class="profileButtonHolder">
		<input id="submitPassWord" name="submitPassword" type="submit" value="Update Password" class="profileButton" onclick="return updatePass()" />
	</div>
	<div class="profileButtonHolder">
		<input id="submitCancel" name="submitCancel" type="submit" value="Cancel" class="profileButton" onclick="window.location.reload()" />
	</div>

<?php
}


function changePass($theId){
	$theUser = new user();
	
	
	$theUser->id = $theId;
	$theUser->password = strip_tags($_REQUEST['newPassword']);
	
	
	$query  = mysql_query("SELECT password FROM users WHERE userId = '$theId' LIMIT 1")
		  or die( mysql_error());
		  
			list($existingPassword) = mysql_fetch_row($query);
			
		if ($existingPassword == strip_tags($_REQUEST['password'])){
			$theUser->changePass();
			?>
			<script language="javascript">
				
				$().ready(function(){
		
		window.location.reload();
		
		
		
		});

</script>

			
			
			<?php
		}else{
		?>
			<script language="javascript">
				$().ready(function(){
					document.getElementById('changePassTitle').style.color = "#ff0000";
			});
			</script>
			Incorrect Existing Password
			
		<?php
		
		}
	

}

function postRant($theId){
	$theRant = new rant();

	
	$theRant->title = htmlentities(strip_tags($_REQUEST['rantTitle']));
	$theRant->type = strip_tags($_REQUEST['rantType']);
	$theRant->category = strip_tags($_REQUEST['rantCategory']);
	$theRant->body = htmlentities(strip_tags($_REQUEST['rantBody']));
	$theRant->name = strip_tags($_REQUEST['name']);
	$theRant->creator = $theId;

	echo($theRant->addToDB());
	
	}
	
	
	function updateRant($theId){
	$theRant = new rant();

	$theRant->id = strip_tags($_REQUEST['rantId']);
	$theRant->title = htmlentities(strip_tags($_REQUEST['rantTitle']));
	$theRant->type = strip_tags($_REQUEST['rantType']);
	$theRant->category = strip_tags($_REQUEST['rantCategory']);
	$theRant->body = htmlentities(strip_tags($_REQUEST['rantBody']));
	$theRant->name = strip_tags($_REQUEST['name']);
	$theRant->creator = $theId;

	echo($theRant->updateDB());
	
	}
	
	function postComment($theId){
	$theComment = new comment();

	
	$theComment->title = htmlentities(strip_tags($_REQUEST['commentTitle']));
	$theComment->rantId = strip_tags($_REQUEST['rantId']);
	$theComment->body = htmlentities(strip_tags($_REQUEST['commentBody']));
	$theComment->name = strip_tags($_REQUEST['name']);
	$theComment->creator = $theId;

	$theComment->addToDB();
	
	}
	
function flag($theId){

$importantPieces = explode("_", $theId);

$theType = $importantPieces[0];
$theId = $importantPieces[1];


$recipient = "bill@liamedward.com";

$subject = "Love To Rant post reported"; //subject
	
$header = "From:no_reply@lovetorant.com\r\n"."Reply-To:no_reply@lovetorant.com"; //optional headerfields

$message = "A post has been flagged by a user as inappropriate.\r\n"."to view it click the following link. http://www.lovetorant.com/php/viewPost.php?id=$theId&type=$theType";
	
	

		ini_set('sendmail_from', 'no_reply@lovetorant.com');

		if (mail($recipient, $subject, $message, $header)){
		echo("Thank you for your report. We will look into it");
		}else{		
		echo("An error occurred. Your report was not sent");
		}




}	

function sendUserPass(){
$theAddress = $_REQUEST['myEmail'];
	$query  = mysql_query("SELECT email, password FROM users WHERE email = '$theAddress' LIMIT 1")
		  or die( mysql_error());
		  
			if(list($email, $password) = mysql_fetch_row($query)){
			
			//if email is found sent a notice
			$message = "Your password for LoveToRant.com is: $password";

			$recipient = "$email";

			$subject = "Password from LoveToRant.com"; //subject
		
			$header = "From: no_reply@lovetorant.com \r\n Reply-To: no_reply@lovetorant.com"; //optional headerfields



				ini_set('sendmail_from', 'no_reply@lovetorant.com');
				
				mail($recipient, $subject, $message, $header); //mail command :)
				
				echo("An email has been sent to the supplied address");
				
				}else{
				echo("Email Address Not Found");
				}	
		
}

function sendFeedback(){
	$theAddress = $_REQUEST['myEmail'];
	$theName = $_REQUEST['myName'];
	$theComment = $_REQUEST['myComments'];

			$message = "$theName ($theAddress) wrote \r\n $theComment";

			$recipient = "info@lovetorant.com";

			$subject = "Feedback from LoveToRant.com"; //subject
		
			$header = "From: no_reply@lovetorant.com \r\n Reply-To: no_reply@lovetorant.com"; //optional headerfields


				ini_set('sendmail_from', 'no_reply@lovetorant.com');
				
				if (mail($recipient, $subject, $message, $header)){ //mail command :)
				
				echo("Thank you for your submission. Your feedback is important to us. Someone will respond to your message as soon as possible.");
				
				}else{
				echo("An Error Occurred");
				}	
		
}

function inviteFriends(){
	$myName = $_REQUEST['myName'];
	$myEmail = $_REQUEST['myEmail'];
	$myFriend1 = $_REQUEST['myFriend1'];
	$myFriend2 = $_REQUEST['myFriend2'];
	$myFriend3 = $_REQUEST['myFriend3'];
	$myFriend4 = $_REQUEST['myFriend4'];
	$myFriend5 = $_REQUEST['myFriend5'];
	
	$friends = array($myFriend1,$myFriend2,$myFriend3,$myFriend4,$myFriend5);
	
	
	
	$subject = "An invitation to LoveToRant.com from $myName"; //subject
	
	$header = "From: invite@lovetorant.com \r\n Reply-To: invite@lovetorant.com \r\n"; //optional headerfields
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$invitationStatus = "";
	
	foreach ($friends as $aFriend){
		if ($aFriend && $aFriend != ""){
			
			//check for previous optout
			$query  = mysql_query("SELECT email FROM inviteOptOuts WHERE email = '$aFriend' LIMIT 1")
		  or die( mysql_error());
		  
			list($optOutEmail) = mysql_fetch_row($query);
			
			// check for already registered
			$query2  = mysql_query("SELECT email FROM users WHERE email = '$aFriend' LIMIT 1")
		  or die( mysql_error());
		  
			list($registeredEmail) = mysql_fetch_row($query2);	
					
			include("../includes/emailInviteTemplate.inc");
			
			ini_set('sendmail_from', 'no_reply@lovetorant.com');
				
				if ($optOutEmail && $optOutEmail == $aFriend){
				$invitationStatus .= "$aFriend - has previously requested not to receive invitations <br />";
				}else if ($registeredEmail && $registeredEmail == $aFriend){
				$invitationStatus .= "$aFriend - is already registered at LoveToRant.com <br />";
				}else if (mail($aFriend, $subject, $mailTemplate, $header)){
				mysql_query("INSERT INTO invites (sender, senderEmail, invitedEmail) VALUES ('$myName', '$myEmail', '$aFriend')");

				$invitationStatus .= "$aFriend - has been invited to www.LoveToRant.com <br />";
				}else{
				$invitationStatus .= "$aFriend - has NOT been invited to www.LoveToRant.com due to an error <br />";
				}
		}
	}
	echo($invitationStatus);
}
?>
