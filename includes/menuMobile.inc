<?php
if (isset($_SESSION['myUserId'])){
	$myUserId = $_SESSION['myUserId'];
	
	}

	$thisFullPage = $_SERVER['PHP_SELF'];
	$thisPageAsArray =  explode("/", $thisFullPage);
	$thisPage = $thisPageAsArray[count($thisPageAsArray)-1];
	
	?>		
<div class="menuButton" id="menuButton" onclick="return ToggleMenu()">SHOW MENU
<div class="menu" id="menu" style="display: none; z-index:1000;">

				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<?php
						if (isset($_SESSION['myUserId'])){
					?>
					<li><a href="myStuff.php">My Stuff</a></li>
					<?php
						}else{
					?>

					<li><a href="register.php">Register</a></li>
					<?php
						}
						if (isset($_SESSION['myUserId'])){
					?>
					
					<li><a href="index.php?LO=1">Log Out</a></li>
					<?php
						}else{
					?>
					
					<li><a href="login.php?redirect=<?php echo($_SERVER["PHP_SELF"]) ?>">Log In</a></li>
					<?php
						}
					?>
					
					<li><a href="rant.php">Rant</a></li>
				</ul>
			<!-- end menu -->
			</div>
</div>      