<div class="rantOuter">
						<div class="rantInner">
							<div class="rantTitleAndType">
								<div class="rantTitle">
									<?php echo($rants->title);?>
								</div>
								<div class="rantCategory">
									Category: <?php echo($rants->category);?>
								</div>
								<div class="rantType">
									<?php echo($rants->type);?>
								</div>
							</div>
							
							<?php
							 if (strpos($thisPage, "fullRant")!== false){ 
							$rantBodyClass = "rantBodyExpanding";
							}else{
							$rantBodyClass = "rantBody";
							}
							?>
							<h2 class="<?php echo($rantBodyClass)?>">
								<?php echo($rants->body);?>
							</h2>
							<div class="rantMoreAndComment">
								<div class="rantMore">
									
										<?php if ($myUserId == $rants->creator){
										?>
										<a href="rant.php?editRant=<?php echo($rants->id)?>">Edit</a> | 
										<?php } ?>
										
										<?php
							 if (strpos($thisPage, "fullRant")!== false){ 
							 ?>
							
							<?php
							}else{
							?>
							<a href="fullRant.php?rantId=<?php echo($rants->id)?>" target="_self">More</a>
							<?php
							}
							?>
										
								</div>

					
							</div>
					
						</div>
						<div class="rantOptionBox">
								<div class="likes" title="like"><a href="#" onclick="return increment('likeRant', '<?php echo($rants->id)?>')"><img src="images/happyIcon.png" class="likesImg" /></a><div><?php echo($rants->likes);?></div></div>
								<div class="dislikes" title="dislike"><a href="#" onclick="return increment('dislikeRant', '<?php echo($rants->id)?>')"><img src="images/angryIcon.png" class="dislikesImg" /></a><div><?php echo($rants->dislikes);?></div></div>
								<div class="commentCount"><a href="fullRant.php?rantId=<?php echo($rants->id)?>" target="_self">Comments:</a> <span><?php echo($commentCount['numOfComments']);?></span></div>
								<div class="addToFavsLink options">
									<ul>
										<li><a href="#">Options</a>
											<ul>
												<?php
													if (isset($_SESSION['myUserId'])){
												?>
												
												<li><a href="#" onclick="return increment('addFav', '<?php echo($rants->id)?>')">Favorite</a></li>
												<?php
													}
												?>
												<li><a href="http://www.zazzle.com/lovetorant?rf=238769169370653841" target="_blank">Buy Merch</a></li>
												<li><a href="#" onclick="return increment('flag', 'rant_<?php echo($rants->id)?>')">Flag as inappropriate</a></li>
												<li><a href="fullRant.php?rantId=<?php echo($rants->id)?>" target="_self">Details</a></li>
											</ul>
										</li>
									</ul>
						
								</div>
								<?php
								if ($mobile != 1)
			 						{
									?>
								<div class="shareThis1">
									<!-- AddThis Button BEGIN -->
										<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4dced07976f63f37" addthis:url="http://www.lovetorant.com/fullRant.php?rantId=<?php echo($rants->id)?>" addthis:title="<?php echo($rants->title);?>"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
										<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
										<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dced07976f63f37"></script>
									<!-- AddThis Button END -->
								</div>
								<?php
								}else{
									?>
								<div class="shareThis1">
								<!-- AddThis Button BEGIN -->
								<div class="addthis_toolbox addthis_default_style ">
								<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=pedicoats" class="addthis_button_compact">Share</a>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dced07976f63f37"></script>
								<!-- AddThis Button END -->
								</div>	
								<?php
								}
									?>				
						</div>
								
									<div class="postedOn">
									on <?php echo($formattedCreatedDate) ?>
									</div>
									<div class="postedGroup">
									<div class="postedBy">
									posted by: <a href="penNameList.php?author=<?php echo($rants->creator)?>"><?php echo($authorPenName) ?></a>
									</div>
								</div>

					</div>
