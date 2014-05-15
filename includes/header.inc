<div id="header" class="header">
				<div id="logo" class="logo">
					<a href="http://www.lovetorant.com" target="_self"><img src="images/main_Logo.png" class="logoImg" /></a>
				</div>
				<div id="tagline" class="tagline">
					<img src="images/main_tag.png" class="taglineImg" />
				</div>
				<?php
				include("includes/menu.inc");
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
					
				</div>
				
				<?php
				
				if ($thisPage == "index.php" || $thisPage == "myRants.php"){
				 include("includes/subMenu.inc");
				
				
				if ($category && $category != ""){
				
					$categoryQuery  = "SELECT categoryName FROM category WHERE status = 'active' ORDER BY categoryName ASC";
						$categoryResult = mysql_query($categoryQuery);
						
	
			
				
				?>
				<div id="categoryBox" class="categoryBox">
					Category: 
					
					<div class="currentCategory categoryDrop">
									<ul>
										<li><a href="#"><?php echo($category)?></a>
											<ul>
												<li><a href="<?php echo($_SERVER["PHP_SELF"]."?category=All")?>">All</a></li>
												<?php
												while($categoryRow = mysql_fetch_array($categoryResult, MYSQL_ASSOC))
													{ 
					?>
												<li><a href="<?php echo($_SERVER["PHP_SELF"]."?category=".$categoryRow['categoryName'])?>"><?php echo($categoryRow['categoryName'])?></a></li>
												<?php
												}
					?>
											</ul>
											<img src="images/drop_arrow.png" />
										</li>
										
									</ul>
						
								</div>
								
								
				</div>
				<?php
				}
				}
				?>
				<div id="searchBox" class="searchBox">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="searchForm">
				<input type="text" class="searchBoxInput" name="criteria" placeholder="Search Rants" />
				<input type="image" src="images/search_button.png" class="searchBoxSubmit" />
				</form>
				</div>
			</div>