<?php
session_start();
$logMeIn = strip_tags($_REQUEST['logMeIn']);
?>


<?php
if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
?>


<script language="javascript">
				
				$().ready(function(){
		alert("You are already logged in!");
		window.location = "myStuff.php";
		
		
		
		});

</script>
<?php



}else if ($logMeIn == "1"){
	include("../includes/connection_LTR.inc");
	
	$myEmail = strip_tags($_REQUEST['myEmail']);
	$myPassword = strip_tags($_REQUEST['myPassword']);
	
	if (isset($_REQUEST['redirect'])){
	$redirect = strip_tags($_REQUEST['redirect']);
	
	}else{
	$redirect = "index.php";
	
	}

	
	
	$query  = mysql_query("SELECT userId, fName, lName,penName, email, password, status FROM users WHERE email = '$myEmail' LIMIT 1")
		  or die( mysql_error());
		  
			list($userId, $fName, $lName,$penName, $email, $password, $status) = mysql_fetch_row($query);
			
			//if password is correct and status is active set sessions varbiables
			if($password == $myPassword && $status == "active"){
				$_SESSION['myUserId']= $userId;
				$_SESSION['myfName']= $fName;
				$_SESSION['mylName']= $lName;
				$_SESSION['myPenName']= $penName;
				$myUserId = $userId;
?>
<script language="javascript">
				
				$().ready(function(){
		
		window.location = "<?php echo($redirect) ?>";
		
		
		
		});

</script>
<?php
			}else if($status == "inactive" || $status == "closed"){
			///your account has not been activated. please activate it.	
			?>
<script language="javascript">
				
$().ready(function(){
		
		alert("Your account is <?php echo($status);?>. Please contact us for further assistance.");
		window.location = "about.php";
		
		
		
		});
</script>



<?php


			}else if($password != $myPassword){
			//wrong password...try again	
			
echo("Incorrect Email or Password"); 
		


			}
			
			
}else{
	
	echo("An unknown error occurred"); 
		
}
?>

