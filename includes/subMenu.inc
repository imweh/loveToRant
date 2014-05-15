<?php
	$thisPage = $_SERVER['PHP_SELF'];

	?>
	

<div class="subMenu" id="subMenu">
		Show: 
			<div class="currentShow showDrop">
				<ul>
					<li><a href="#"><?php echo($category)?></a>
						<ul>
							<li><a href="index.php?category=<?php echo($category)?>">All</a></li>
							<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?show=pleased&category=<?php echo($category)?>">Pleased</a></li>
							<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?show=peeved&category=<?php echo($category)?>">Peeved</a></li>
							<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?show=pissed&category=<?php echo($category)?>">Pissed</a></li>
						</ul>
						<img src="images/drop_arrow.png" />
					</li>
				</ul>
			<!-- end menu -->
				</div>
			</div>       
			
