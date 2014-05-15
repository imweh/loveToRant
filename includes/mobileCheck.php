 <?php
 session_start();
 require_once 'includes/mdetect.php'; // The classes
 
 $setFull = $_GET['setFull'];
 
 if ($setFull == 1){
 
 $_SESSION['full'] = 1;
 
 }else{
 
 $_SESSION['full'] = 0;
 
 }
 
 if (isset($_SESSION['full'])){
 	$full = $_SESSION['full'];
 }else{
 	$full = 0;
 }
 
 $uagent_obj = new uagent_info();
 

 // does all the phone I target at once.
 $bunchesOfMobile = $uagent_obj->DetectTierIphone();
 
 if ($bunchesOfMobile == 1 && $full != 1)
 {
 $mobile = 1;
 
 $logo = "mobileLogo.png";
 $tweetie = "mobileTweetie.png";
 }else{
 $logo = "mainLogo.png";
 $tweetie = "tweetie.png";
 }

?>
