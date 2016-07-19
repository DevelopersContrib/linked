<? include 'header.php'; ?>
<script src="js/owl.carousel.min.js"></script>

<script type="text/javascript">
		$(document).ready(function(){
			var owl = $('.container-feature');
			owl.owlCarousel({
				items:4,
				loop:false,
				nav: true
			});   
		});

</script>

<link rel="stylesheet" href="css/owl.carousel.css">

<style type="text/css">
	.wrap-marketplace-box-item {
		background-color: #fff;
		border-radius: 2px;
		border-top: 1px solid #d9d9d9;
		box-shadow: 0 1px 0 1px #d9d9d9;
		color: #000;
		display: block;
		margin-bottom: 25px;
		padding: 15px;
		text-align: center;
		text-shadow: none;
		word-wrap: break-word;
	}
	.wmbi-img-logo {
		display: block;
		margin-bottom: 15px;
	}
	.wmbi-img-logo img {
		display: inline-block;
		max-height: 60px;
	}
	.btn-group-lg > .btn, .btn-lg {
		border-radius: 6px;
		font-size: 18px;
		line-height: 1.33333;
		padding: 10px 16px;
	}
	.owl-carousel .owl-item{
		padding:10px;
	}
	.wrap-referralprogram-container-1 {
		background-color: #fff;
		padding:50px 0;
	}
	.wrap-referralprogram-container-2 {
		background-color: #fafafa;
		padding:50px 0;
	}
	#rp-unstyled li{
		display: none;
	}
	#rp-unstyled li:first-child {
		display: block;            
	}
	.wrap-discussion-container{
		background-color: #eee;
		padding:50px 0;
	}
	.fb {
		background-color: #3A589B;
	}
	.twitter {
		background-color: #3A589B;
	}
	.linkedin {
		background-color: #1D87BD;
		margin-left: 35px;
	}
	.google {
		background-color: #D6492F;
	}
</style>



<script>
	jQuery(document).ready(function(){
		setInterval(function() {
			var firstLi = $('#rp-unstyled li').first().detach();
			$('#rp-unstyled').append($(firstLi));
		}, 5000);
    });
</script>
		<div class="row">
				<div class="col-lg-12">
					<div class="wrap-padtop-v1 clearfix">
						<div class="row">
							<div class="col-lg-6">								
								<!-- tabs -->
								<div class="tabbable newtemptab">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-cog"></i></a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="one">
											<div class="exerpt-slide">
												<p>
													<?
														if(str_replace(' ','',$description)!='') echo '<div id="content"><p id="makea" style="color: whitesmoke;text-shadow: 1px 1px 5px black;">'.stripslashes($description).'</p>';
													?> 
												</p>
											</div>								
										</div>
										</div>
									</div>
								</div>
								<!-- /tabs -->
							</div>
							<div class="col-lg-6">
								<div class="arrw-rela"><div class="arrw-point-white"></div></div>
								<div class="modal-content form">
									<div class="modal-header">
										<h4 class="modal-title text-black">
											Learn more about Joining our Partner Network.
										</h4>
									</div>
									<div class="modal-body">
										<div class="text-center" id="socials_container"></div>
										<div class="form-group">
											
											<form  id="signupform" action="">
												<div class="input-group input-group-lg">
													<input type="text" id="email" class="form-control" placeholder="Your email...">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-danger">
															<i class="fa fa-edit"></i>
															Sign up now!
														</button>
													</span>
												</div>
												<input type="hidden" id="refid" value="0">
												<input type="hidden" id="domain" value="<?php echo $domain?>">
												<input type="hidden" id="user_ip" value="<?php echo $_SERVER['REMOTE_ADDR']?>">
											</form><!-- /input-group -->
											
										</div>
										<div class="form-group text-right">
											<a href="" class="btn btn-info">
												Sign in
												<i class="fa fa-linkedin-square"></i>
												LinkedIn
											</a>
											<a href="javascript:;" onclick="checkLoginState()" class="btn btn-info fb">
												Sign in
												<i class="fa fa-facebook-square"></i>
												Facebook
											</a>
											<a href="javascript:;" id="googlelogin" class="btn btn-info google">
												Sign in
												<i class="fa fa-google-plus-square"></i>
												Google
											</a>
										</div>
										
										
													<div id="error_message_form">&nbsp;</div>

																<div class="pages hidden" id="pagesubmit">
																
																	
																	<div id="response_wait"><div class="span12" style="width:100%;text-align:center;margin:20px 0 35px 0;color:white;min-height:20px;font-size:18px;" id="loading">Processing . . . Please wait . . .</div></div>
																	 <div class="row-fluid" id="response" style="color: rgb(12, 179, 32);display:none">
																		
																		<div class="span12 text-center"><h3>Thanks, your spot is reserved!</h3> Share <?php echo ucfirst($domain)?> with you friends to move up in line and reserve your username.
																				<br><br>
																				<?if($additional_html != ""):?>
																					<?echo base64_decode($additional_html)?>
																				<?endif;?>
																				
																					<form target="_blank" action="http://www.contrib.com/signup/follow/<?php echo ucfirst($domain)?>" method="post">
																					<input type="hidden" id="pemail" name="email" value=""/>
																				<button class="btn btn-warning">Continue to Follow <?php echo ucfirst($domain)?> Brand</button></form>
																		</div>
																		
																	 
																	 </div><!-- response -->
				
				
				
																					<div id="description">
																						<h3 id="header_text"></h3>
																						<p id="paragraph_text"></p>
																						<p style="color:#000">To share with your friends, click &ldquo;Share&rdquo; and &ldquo;Tweet&rdquo;:</p>
																						<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
																						<br><br>
																						<p> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.socialholdings.com%2F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
																						</p>
																						<div id="sharebuttons"><span id="facebook" style="margin:0 0 10px 60px"></span><span id="twitter"></span></div>
																					</div>
																					<!--<p class="clear" style="text-align: left;">Or copy and paste the following link to share wherever you want!</p>
																								<input id="shareurl" type="text" value="" />
																						-->
																					 <!-- <a class="cs_import">Email To Friends</a>-->

																				</div>
																												
										
										
										
									</div>
									<div class="modal-footer">
										<div class="text-left form-group">
											<a href="/privacy">Privacy Policy</a> 
											<span class="text-black">
												|
											</span> 
											<a href="/terms">Terms and Condition</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- verticals -->
		<?php if (count($related_domains)>0):?>
		<?php $vertical = str_replace('-',' ',ucfirst($related_domains[0]['slug'])) ?>
		<div class="row verb">
			<div class="col-md-8 col-md-offset-2">
				<h2><i class="fa fa-globe"></i>&nbsp; Other Brands On <?php echo $vertical?> Vertical</h2>
				<div class="vertical-list">
					<ul class="list-unstyled">
						<?php foreach ($related_domains as $key=>$val):?>
							<li class="col-md-4 odd"><a href="http://<?php echo $val['domain_name']?>"><i class="fa fa-arrow-right"></i>&nbsp;<?php echo ucfirst($val['domain_name'])?></a></li>
						<?php endforeach;?>	
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-12" style="text-align:center;"><a href="http://www.contrib.com/verticals/news/<?php echo $related_domains[0]['slug']?>" target="_blank" class="btn btn-success">View More</a></div>
			</div>
		</div>
		<?php endif;?>
	</div>
</div>
<div class="wrap-discussion-container">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="brdr-lead text-center">
					Latest Contributions
				</h1> <br>
				<script src="http://tools.contrib.com/cwidget?d=<?echo $domain?>&p=ur&c=lc"></script>
			</div>
			<div class="col-md-6">
				<h1 class="brdr-lead text-center">
					Discussions
				</h1> <br>
				<script type="text/javascript" src="http://tools.contrib.com/cwidget/forum?f=all&l=10"></script>
			</div>
		</div>
	</div>
</div>
<div class="wrap-referralprogram-container-2">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="ttle">Follow Linked.com and other great ventures <br> on the Contrib platform. </h1>
				<br><br>
			</div>
			<div class="col-md-12">
				<div class="owl-carousel container-feature">
					<?php foreach ($featuredsite as $featuredsite) { ?>
					   	<div class="wrap-marketplace-box-item">
                            <a class="wmbi-img-logo" href="http://<?php echo $featuredsite['domain_name']; ?>">
                                <?php if(!empty($featuredsite['logo'])):?>
									<img src="<?php echo $featuredsite['logo']; ?>" class="img-responsive" alt="<?php echo $featuredsite['domain_name']; ?>">
								<?php else: ?>
									<img src="https://d2qcctj8epnr7y.cloudfront.net/contrib/logo-contrib-brand2.png" class="img-responsive">
								<?php endif; ?>
                            </a>
                            <h3 class="marg-m-ttlTop text-capitalize wmbi-ttle ellipsis">
                                <?php echo $featuredsite['domain_name']; ?>
                            </h3>
                            <p class="p-marg-btm">
                                Join our exclusive community of like minded people
                            </p>
                            <p>
                                <a target="_blank" href="http://<?php echo $featuredsite['domain_name']; ?>"><?php echo $featuredsite['domain_name']; ?></a>
                            </p>
                            <ul class="list-inline ul-wmbi-zero">
                                <li>
                                    <a class="btn btn-success btn-lg" target="_blank" href="http://<?php echo $featuredsite['domain_name']; ?>">Visit</a>
                                </li>
                                <li>
                                    <a class="btn btn-success btn-lg" target="_blank" href="https://contrib.com/brand/details/<?php echo $featuredsite['domain_name']; ?>">Details</a>
                                </li>
                            </ul>
                        </div>
					<?php }?>		
				</div>
			</div>
		</div>
	</div>
</div> 
<div class="wrap-referralprogram-container-1">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center lead-ttle-top">
				<h1 class="brdr-lead">
					Referral Programs
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul id="rp-unstyled" class="list-unstyled">
					<?php if (count($programs)>0):?>
						<?php foreach ($programs as $key=>$val):?>
							<li>
								<div class="wrap-rp-bx-container text-center">
									<?php echo $val['code']?>
								</div>
							</li>
						<?php endforeach;?>
					<?php endif?>
				</ul>	
			</div>
		</div>
	</div>
</div>

<div class="container-index-wrap">
<div>

<? include_once 'footer.php';?>

<script>

  $(document).ready(function() {

   var docHeight = $(window).height();
   var footerHeight = $('.footer-v1').height();
   var footerTop = $('.footer-v1').position().top + footerHeight;

   if (footerTop < docHeight) {
    $('.footer-v1').css('margin-top', 10+ (docHeight - footerTop) + 'px');
   }
  });
 </script>