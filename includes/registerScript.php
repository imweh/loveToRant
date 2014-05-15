<?php
session_start();



	include("../includes/connection_LTR.inc");
	include("../includes/user.inc");
	
	$theUser = new user();
	
	$theUser->fName = strip_tags($_REQUEST['fName']);
	$theUser->lName = strip_tags($_REQUEST['lName']);
	$theUser->penName = strip_tags($_REQUEST['penName']);
	$theUser->updates = strip_tags($_REQUEST['updates']);
	$theUser->email = strip_tags($_REQUEST['email']);
	$theUser->password = strip_tags($_REQUEST['password']);
	$theUser->admin = "no";
	$theUser->status = "active";
	
	$query  = mysql_query("SELECT userId FROM users WHERE email = '$theUser->email' LIMIT 1")
		  or die( mysql_error());
		  
			list($userId) = mysql_fetch_row($query);
	
	if ($userId){
	?>
		<script language="javascript">
				
	$().ready(function(){
		
		alert("An account already exists with that email address");
		
		});
</script>
	
	
	<?php
	}else{
	
	
	if (isset($_REQUEST['redirect'])){
	$redirect = strip_tags($_REQUEST['redirect']);
	
	}else{
	$redirect = "index.php";
	
	}
	
	
		$theUser->addToDB();
		
		
		$subject = "Thank you for registering at LoveToRant.com"; //subject
	
	$header = "From: no_reply@lovetorant.com \r\n Reply-To: no_reply@lovetorant.com \r\n"; //optional headerfields
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
			
			include("../includes/emailRegistrationTemplate.inc");
			
			ini_set('sendmail_from', 'no_reply@lovetorant.com');
				
			mail($theUser->email, $subject, $mailTemplate, $header);



		$loginQuery  = mysql_query("SELECT userId, fName, lName,penName FROM users WHERE email = '$theUser->email' LIMIT 1")
		  or die( mysql_error());
		  
			list($userId, $fName, $lName,$penName) = mysql_fetch_row($loginQuery);
			//if password is correct and status is active set sessions vabiables and save drink to faves
				$_SESSION['myUserId']= $userId;
				$_SESSION['myfName']= $fName;
				$_SESSION['mylName']= $lName;
				$_SESSION['myPenName']= $penName;
				
?>
<script language="javascript">
				
				$().ready(function(){
		
		window.location = "<?php echo($redirect) ?>";
		
		
		
		});

</script>
<?php
			}
?>

