
<div class="footer">
	<p>&copy; 2011 - <?php echo date("Y"); ?> LoveToRant.com | <a href="privacy.php" target="_self">Privacy Policy</a> | <a href="contact.php" target="_self">Contact Us</a>
	<?php
	if (isset($_SESSION['viewMobile']) && $_SESSION['viewMobile'] == "no"){
	?>
	 | <a href="<?php echo($_SERVER['PHP_SELF'])?>?mobile=yes" target="_self">View Mobile Site</a>
	<?php
}
?>
	</p>
	
	
	<p>Site designed and created by Liam Edward Creative | <a href="http://www.liamedward.com">www.LiamEdward.com</a></p>
	
</div>