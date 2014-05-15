<div id="header" class="header">
				<div id="logo" class="logo">
					<a href="http://www.lovetorant.com" target="_self"><img src="images/LTR_Logo_mobile.png" class="logoImg" /></a>
				</div>
				
				<?php
				include("includes/menuMobile.inc");
				
				
				?>
				<div id="addThisBar" class="addThisBar">
					<!-- start ranting badge -->
					<div class="startRantingButtonHolder">
					<a href="rant.php" class="startRantingButtonImg"><img src="images/startRant_button.png" /></a>
					</div>
					<!-- Invite Friends badge -->
					<div class="inviteButtonHolder">
					<a href="invite.php" class="inviteButtonImg"><img src="images/invite_button.png" /></a>
					</div>
					<!-- AddThis Button BEGIN -->
					<div class="shareButtonHolder">
					<a class="addthis_counter addthis_pill_style"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dced07976f63f37"></script>
					<!-- AddThis Button END -->
					<?php
					if ($thisPage == "index.php" || $thisPage == "myRants.php"){
					?>
					<!-- Sort badge -->
					<div class="sortButtonHolder">
					<a href="#" class="sortButtonImg" onclick="return ToggleSubMenu()"><img src="images/sort_button.png" /></a>
					</div>
					<?php
					}
					?>
				</div>
				<?php
				if ($thisPage == "index.php" || $thisPage == "myRants.php"){
				include("includes/subMenuMobile.inc");
				}
				?>
				
				
					
				</div>
				
				
							</div>