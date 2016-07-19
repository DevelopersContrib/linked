
<? include_once 'header.php'; ?>

<style>
.thanks-container {
	background: none repeat scroll 0px 0px rgba(0, 0, 0, 0.7);
	padding: 10px 40px 100px;
	border-radius: 3px;
	margin-bottom: 100px;
}
</style>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="thanks-container">
					<img src="https://s3.amazonaws.com/assets.zipsite.net/icons/icon-thankyou-800x400.png" style="height:200px; margin:0 auto;">
					<h2>for signing up!</h2>
					<hr>
						<?if($additional_html != ""):?>
							<?echo base64_decode($additional_html)?>
						<?endif;?>
					<p>Thanks, your spot is reserved!</h3> Share <?php echo ucfirst($domain)?> with you friends to move up in line and reserve your username.</p>
					<!-- 					<a href="/" class="btn btn-warning">Back to Homepage</a> -->
					<!-- <div id="description">
																						<h3 id="header_text"></h3>
																						<p id="paragraph_text"></p>
																						<p style="color:#000">To share with your friends, click &ldquo;Share&rdquo; and &ldquo;Tweet&rdquo;:</p>
																						<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
																						<br><br>
																						<p> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.socialholdings.com%2F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
																						</p>
																						<div id="sharebuttons"><span id="facebook" style="margin:0 0 10px 60px"></span><span id="twitter"></span></div>
					</div>	 -->
					<form method="post" action="http://www.contrib.com/signup/follow/<?php echo $domain?>" target="_blank">
									<input type="hidden" value="jin@mailinator.com" name="email" id="pemail">
									<button class="btn btn-warning">Continue to Follow <?php echo $domain ?> Brand</button></form>
									<br>
						  <div id="social">
																<table style="border:0px;width:100%;">
																	<tr>
																		<td valign='top' style='width:15%;'>
																			<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
																			<script type="IN/Share" data-url="http://www.linked.com"></script>
																		</td>
																		<td valign='top' style='width:85%;'>

																			<!-- AddThis Button BEGIN -->
																			<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
																			<a class="addthis_button_preferred_1"></a>
																			<a class="addthis_button_preferred_2"></a>
																			<a class="addthis_button_preferred_3"></a>
																			<a class="addthis_button_preferred_4"></a>
																			<a class="addthis_button_compact"></a>
																			<a class="addthis_counter addthis_bubble_style"></a>
																			</div>
																			<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
																			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-517895f814f07260"></script>
																			<!-- AddThis Button END -->
																		</td>    
																	</tr>
																</table>
															  </div>	
		</div>
			</div>
		</div>
	</div>

<? include_once 'footer.php';?>