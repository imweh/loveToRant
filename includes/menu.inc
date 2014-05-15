<?php
if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	
	}



	$thisFullPage = $_SERVER['PHP_SELF'];
	$thisPageAsArray =  explode("/", $thisFullPage);
	$thisPage = $thisPageAsArray[count($thisPageAsArray)-1];
	
	?>
	

<div class="menu" id="menu">
				<ul>
					<li><a href="index.php"><img src="images/home_button.png" class="menuButtonImg" /></a></li>
					<li><a href="about.php"><img src="images/about_button.png" class="menuButtonImg" /></a></li>
					<!-- change to my Stuff if logged in-->
					<?php
						if (isset($_SESSION['myUserId'])){
					?>
					<li><a href="myStuff.php"><img src="images/myStuff_button.png" class="menuButtonImg" /></a></li>
					<?php
					}else{
					?>
					<li><a href="register.php"><img src="images/register_button.png" class="menuButtonImg" /></a></li>
					
					<?php
					}?>
					<!-- change to profile if logged in-->
					<?php
						if (isset($_SESSION['myUserId'])){
					?>
					
					<li><a href="index.php?LO=1"><img src="images/logout_button.png" class="menuButtonImg" /></a></li><!-- change to log out if logged in-->
					<?php
					}else{
					?>
					<li><a href="login.php?redirect=<?php echo($_SERVER["PHP_SELF"]) ?>"><img src="images/login_button.png" class="menuButtonImg" /></a></li><!-- change to log out if logged in-->

					
					<?php
					}?>
					<!--<li><a href="rant.php">Rant</a></li>-->
				</ul>
			<!-- end menu -->
			</div>       