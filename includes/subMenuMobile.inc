<?php
	$thisPage = $_SERVER['PHP_SELF'];

	?>
	

<div class="subMenu" id="subMenu" style="display:none;">
<div class="typeDrop" id="subMenuChoices" style="z-index:998;">
				<ul>
					<li onclick="return ToggleSubMenu()">Show</li>
					<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?category=<?php echo($category)?>">All</a></li>
					<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?show=pleased&category=<?php echo($category)?>">Pleased</a></li>
					<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?show=peeved&category=<?php echo($category)?>">Peeved</a></li>
					<li><a href="<?php echo($_SERVER["PHP_SELF"])?>?show=pissed&category=<?php echo($category)?>">Pissed</a></li>
				</ul>
			<!-- end menu -->
		</div>
	<!-- category -->
	<?php
	if ($category && $category != ""){
				
					$categoryQuery  = "SELECT categoryName FROM category WHERE status = 'active' ORDER BY categoryName ASC";
						$categoryResult = mysql_query($categoryQuery);
						?>
					<div class="categoryDrop">
									<ul>
										<li onclick="return ToggleSubMenu()">Category</li>
										<li><a href="<?php  echo($_SERVER["PHP_SELF"]."?category=All")?>">All</a></li>
												<?php
												 while($categoryRow = mysql_fetch_array($categoryResult, MYSQL_ASSOC))
													{ 
					?>
												<li><a href="<?php echo($_SERVER["PHP_SELF"]."?show=".$show."&category=".$categoryRow['categoryName'])?>"><?php  echo($categoryRow['categoryName'])?></a></li>
												<?php
												 }
					?>
											
									</ul>
						
								</div>
								
								
				
				<?php
				}
				?>
				
	</div>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="searchForm">
	<div id="searchBox" class="searchBox">
				
				<input type="text" id="searchBoxInput" class="searchBoxInput" name="criteria" placeholder="Search Rants" />
				
				
				</div>
				
	<div id="searchToggle" class="searchToggle">
		<input id="searchBoxSubmit" type="image" src="images/searchButtonGo.png" class="searchBoxSubmit" />
	</div>
	</form>
	<script language="javascript" type="text/javascript">
			$(document).ready(function() {
					previousSearch = "<?php echo($forwardCriteria)?>";
  					$("#searchBoxSubmit").click( function(e) { 
  						if (($("#searchBoxInput").val() == "" && previousSearch == "") || $("#searchBox").css('display') == "none"){
  	  						e.preventDefault();
  	  						toggleSearch();
  						}

  						
  						
  					 } );
  					$("#searchBox").css({"display":"none"});
				});
		</script>