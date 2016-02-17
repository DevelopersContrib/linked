<?php include 'header.php'; ?>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('#next-email').click(function(event){
			var sEmail = $('#emailadd').val();
				if($.trim(sEmail).length == 0){
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Please enter your email address.');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
					}else if(validateEmail(sEmail)) {
						$('.emailadd-msg').removeClass("help-block");
						$('.emailadd-msg').text('');
						$('input[name=emailadd]').parents('.form-group').removeClass("has-error");
						flagEmail = true;
					}else{
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Please enter valid email address.');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
					}
			if (flagEmail==true){
				// $_SESSION['varname'] = $var_value;
				var sEmail = $('#emailadd').val();
				document.cookie = sEmail;
				window.location.href = 'signup.php', sEmail ;
			};	
		});
		function validateEmail(sEmail) {
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (filter.test(sEmail)){
				 return true;
			}
			else{
			return false;
			}
		}
	});
</script>
	<body>
		<div class="section-1">
			<div class="overlaydot"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-linked4.png" alt="">
					</div>
					<div class="col-md-7">
						<h1 class="fnt-600 ttle">Welcome to Linked.com</h1>
						<p class="desc">
							Linking people, skills and opportunities to create the worlds largest crowd commerce business creation system. Join us today!
						</p>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" class="form-control input-lg" placeholder="Email Address" name="emailadd" id="emailadd" />
									<small class="emailadd-msg"></small>
								</div>
								<div class="form-group">
									<a href="#" class="btn btn-success btn-lg text-uppercase btn-block" id="next-email">get started</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-2 ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Linked.com <strong>Opportunity</strong></h1>
						<div class="insurance-line">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="line3"></div>
							<div class="line2"></div>
							<div class="line1"></div>
						</div>
						<p class="sub-ttle">
							We envision people around the world with complementary skills, passion, time <br>and resources coworking online with targeted premium assets just like Linked.com.
						</p>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<div class="tablist-container">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified nav-tabs-cust" role="tablist">
								<li role="presentation" class="active">
									<a href="#people" aria-controls="people" role="tab" data-toggle="tab">
										People
									</a>
								</li>
								<li role="presentation">
									<a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">
										Jobs
									</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="people">
									<ul class="list-unstyled">
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">jamal</span>
													from
													<span class="text-capitalize fnt-600">india</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">jeiseun</span>
													from
													<span class="text-capitalize fnt-600">philippines</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">lucille</span>
													from
													<span class="text-capitalize fnt-600">jakarta</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">andrie</span>
													from
													<span class="text-capitalize fnt-600">miami</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">larry</span>
													from
													<span class="text-capitalize fnt-600">germany</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">stephen</span>
													from
													<span class="text-capitalize fnt-600">brazil</span>
												</h4>
											</a>
										</li>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="jobs">
									<ul class="list-unstyled">
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">bcontent.com</span>
													needs
													<span class="text-capitalize fnt-600">Bcontent.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">matchallenge.com</span>
													needs
													<span class="text-capitalize fnt-600"> Matchchallenge.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">ministryfund.com</span>
													needs
													<span class="text-capitalize fnt-600"> Ministryfund.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">hedgebank.com</span>
													needs
													<span class="text-capitalize fnt-600"> Hedgebank.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">vegasloft.com</span>
													needs
													<span class="text-capitalize fnt-600"> Vegasloft.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">recruitchannel.com</span>
													needs
													<span class="text-capitalize fnt-600"> Hedgebank.com Co-founder</span>
												</h4>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7 media-container">
						<div class="wrap-media-bg">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/icon-50x50-contrib-market2.png" />
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading fnt-700">Contrib Marketplace</h4>
									Browse Jobs, Ideas and Micro Tasks.
								</div>
							</div>
						</div>
						<div class="wrap-media-bg">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/icon-50x50-contrib-contribute2.png" />
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading fnt-700">Contribute</h4>
									Contribute using your skills, services, apps and/or capital. 
								</div>
							</div>
						</div>
						<div class="wrap-media-bg">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/icon-50x50-contrib-money2.png" />
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading fnt-700">Earn Equity</h4>
									Get equity for your hard work and be the next success story!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-3">
			<div class="overlaydot"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Follow Linked.com and other great ventures <br> on the Contrib platform. </h1>
						<br><br>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel container-feature">
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://socialid.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-socialid-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://socialid.com/">
											<h3 class="fnt-300">socialid.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-socialid.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            socialid
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://socialid.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://consultants.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-consultants-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://consultants.com/">
											<h3 class="fnt-300">consultants.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-consultants.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            consultants
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://consultants.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://talentdirect.com/">
											<img src="http://d2qcctj8epnr7y.cloudfront.net/uploads/browser-tda.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://talentdirect.com/">
											<h3 class="fnt-300">talentdirect.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-talentdirect.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            talentdirect
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://talentdirect.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://mergers.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-mergers-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://mergers.com/">
											<h3 class="fnt-300">mergers.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-mergers.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            mergers
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://mergers.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://www.referrals.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-referrals-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://www.referrals.com/">
											<h3 class="fnt-300">referrals.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-referrals.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            referrals
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://www.referrals.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://ifund.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-ifund-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://ifund.com/">
											<h3 class="fnt-300">ifund.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-ifund.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            ifund
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://ifund.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://ifund.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-handyman-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://handyman.com/">
											<h3 class="fnt-300">handyman.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-handyman.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            handyman
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://handyman.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://ifund.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-contrib-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://contrib.com/">
											<h3 class="fnt-300">contrib.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-contrib.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            contrib
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://contrib.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-4">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Linked.com <strong>Team</strong></h1>
						<div class="insurance-line">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="line3"></div>
							<div class="line2"></div>
							<div class="line1"></div>
						</div>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<p class="sub-ttle">
									Linked.com is a bit different than most startups. We are small, diverse team working remotely and<br> loving what we do.  We only cowork with others who also have this same passion.
								</p>
								<p class="sub-ttle">
									Linked.com seeks to contract and hire the best people and then trust them: it's the thinking  behind<br> the work at their own time policy. 
								</p>
								<p class="sub-ttle">
									The Linked.com team loves building things and focus on being the most productive individual, not<br> the amount of time spent in the office. We put a lot of effort into making Linked.com a fun place <br>to work for people who like getting things done. So if you're game with this then enter  your email<br> address and be a part of the global team. 
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-5">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wrap-ecorp-container">
						<div class="row">
							<div class="col-md-4">
								<img style="margin-top:-50px;" class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-ecorp2.png" alt="">
							</div>
							<div class="col-md-8 ecorp-desc">
								<h1 class="ttle">About <strong>Linked.com</strong></h1>
								<br>
								<p>
									Linked.com Platform is part of the Global Ventures Network.
								</p>
								<p>
									Founded in 1996, Global Ventures is the worlds largest virtual Domain Development Incubator on the planet.
								</p>
								<p>
									We create and match great domain platforms with talented people, applications and resources to build successful, value driven, web-based businesses. Join the fastest growing Virtual Business Network and earn Equity and Cowork with other great people making a difference.
								</p>
								<p>
									<a href="" class="btn btn-primary btn-lg text-uppercase">
										Learn about this site
									</a>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-12 wrap-apply-container">
						<script type="text/javascript" src="http://tools.contrib.com/contactform?d=<?echo $info['domain']?>&f=staffing"></script>
					</div>
					<div class="col-md-12 wrap-inquire-container">
						<script type="text/javascript" src="http://tools.contrib.com/contactform?d=<?echo $info['domain']?>"></script>
					</div>
				</div>
			</div>
		</div>
<?php include 'footer.php';?>