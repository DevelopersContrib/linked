<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
		$('.wrap-index2').css({'min-height': (($(window).height()))+'px'});
			$(window).resize(function(){
			$('.wrap-index2').css({'min-height': (($(window).height()))+'px'});
			});
		
		$('#email').click(function(){
			$(this).attr("placeholder","");
		});
		
	   var domain_name = $('#domain_name').val();
	
		getsocial(domain_name,'fb','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/1396251686_facebook_circle_color.png');
		getsocial(domain_name,'twitter','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/1396251704_twitter_circle_color.png');
		getsocial(domain_name,'gplus','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/gplus.png');
	
		
       $('#pagesubmit').hide();
       $('#pagesubmit').removeClass('hidden');
       $('#signupform').submit(function(){
			 
			var email = $('#email').val();
			var user_ip = $('#user_ip').val();
			var indexof = email.indexOf("@");
			var name = email.slice(0,indexof);
			var domain = $('#domain').val(); 
			
           if(email==''){
                alert('Email is Required.');
                $('#email').focus();
                return false;
            }else if(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(email)==false){
                alert('Please enter a valid email address.');
                $('#email').focus();
                                return false;

            }else{
		      // alert('Thanks');
			//DOMAINDI LEADS		
			jQuery.ajax({
  			       type: "post",url: "http://www.contrib.com/forms/saveleads",
  			         data: {'email':email, 'domain':domain,'user_ip':user_ip},
  				         success: function(res){
					console.log(res.success);
					$('#error_message_form').addClass('text-warning');
					$('#error_message_form').html("Processing, please wait..");
					console.log(res);
					  
					$("#loading").hide();
					
					if(res.success=='success'){
						// $("#signupform").hide();	
						// $('#response_wait').show();
						// $("#pagesubmit").slideDown('normal');
												 window.location.href = 'thanks';

						// $('#pemail').val(email);
						// $('#response').css('display','block');
						// $('#error_message_form').hide();

				}else{
						console.log("FALSE 2");
						$('#error_message_form').removeClass('text-warning');
						$('#error_message_form').addClass('text-danger');
						$('#error_message_form').html(res.success+'<br><br>');
				}
                  
                }});	
								
				// SALESFORCE LEAD
				$.post("http://www.manage.vnoc.com/salesforce/addlead",
				{
					 'firstName':name,
					 'lastName':name,
					 'title':'',
					 'email':email,
					 'phone':'',
					 'street':'',
					 'city':'',
					 'country':'',
					 'state':'',
					 'zip':'',
					 'domain':domain,
					 'form_type':'Contrib Lead Template'
					 
				},function(data2){
						console.log(data2);
					}
				);	
						return false;
			}
       });

    });

	

function getsocial(domain_name,social,icon_src){
	
	$.getJSON('http://manage.vnoc.com/socialmedia/getDomainSocialsAPI/'+domain_name+'/'+social,function(data){
					var socialdata = data[0];
					if(socialdata.error == true){
						//do nothing
					}else if(socialdata.profile_url == ""){
						//do nothing
					}else if(socialdata.profile_url == "null" || socialdata.profile_url == null){
						//do nothing
					}else{
						$('#socials_container').append('&nbsp;<a href="'+socialdata.profile_url+'"><img src="'+icon_src+'" height="40px"></a>&nbsp;');
					}		
	});
}
	
</script>


<style>
	/* Dark Footer */
	.footer-dark-1,.footer-dark-2{
		line-height: 20px;
	}
	.footer-dark-1 .text-g1,.footer-dark-2 .text-g1{
		color: #ccc;
	}
	.footer-dark-1 .f-a-links a,.footer-dark-2 .f-a-links a{
		color: #ccc;
	}
	.footer-dark-1 .f-a-links a:hover, .footer-dark-2 .f-a-links a:hover{
		color: #e1e1e1;
		text-decoration: none;
	}
	.footer-dark-1{
		color: #fff;
		padding: 25px 0 10px;
		background-color: #333;
	}
	.footer-dark-1 h3{
		margin-top: 0;
	}
	.fnt-bold{
		font-weight: bold;
	}
	.footer-dark-2{
		color: #fff;
		padding: 25px 0;
		background-color: #222;
	}
	.footer-dark-2 ul.list-inline{
		margin-bottom: 0;
	}
	.socials-ul li{
		padding-right: 0;
		padding-left: 0;
	}
	/* Black B */
	.footer-dark-1.footer-dark-b-1{
		background-color: #020202;
	}
	.footer-dark-2.footer-dark-b-2{
		background-color: #0e0e0e;
	}


	/* For Social Media Style Brand Details */
	/* Wrapper */
	.icon-button {
		border-radius: 0.6rem;
		cursor: pointer;
		display: inline-block;
		font-size: 2.0rem;
		height: 3rem;
		line-height: 3rem;
		position: relative;
		text-align: center;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		width: 3rem;
	}

	/* Circle */
	.icon-button span {
		border-radius: 0;
		display: block;
		height: 0;
		left: 50%;
		margin: 0;
		position: absolute;
		top: 50%;
		-webkit-transition: all 0.3s;
		-moz-transition: all 0.3s;
		-o-transition: all 0.3s;
		transition: all 0.3s;
		width: 0;
	}
	.icon-button span {
		width: 3rem;
		height: 3rem;
		border-radius: 0.6rem;
		margin: -1.5rem;
	}
	.twitter span {
		background-color: #4099ff;
	}
	.facebook span {
		background-color: #3B5998;
	}
	.google-plus span {
		background-color: #dd4b39;
	}
	.youtube span {
		background-color: #bb0000;
	}
	.pinterest span {
		background-color: #cb2027;
	}
	.angellist span {
		background-color: #000;
	}
	.github span {
		background-color: #000;
	}
	.linkedin span {
		background-color: #007bb6 ;
	}
	.tumblr span {
		background-color: #36465d ;
	}
	.foursquare span {
		background-color: #0072b1 ;
	}

	/* Icons */
	.icon-button i {
		background: none;
		color: white;
		height: 3rem;
		left: 0;
		line-height: 3rem;
		position: absolute;
		top: 0;
		width: 3rem;
		z-index: 10;
	}
	/* For Image iCons */
	.social-img-icon-a{
		border-radius: 0.6rem;
		display: block;
		height: 30px;
		overflow: hidden;
		width: 30px;
	}
	.social-img-icon-a img{
		height: 30px;
	}
</style>
</div>
		<div class="footer-v1" style="display:none">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-4">
							
								&copy; <?php echo $domain?>
							
						</div>
						<div class="col-lg-8">
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
									<li><a href="/fund">Fund our ventures</a></li>
									<li><a href="/developers">Developers</a></li>
									<li><a href="/terms">Terms</a></li>
									<li><a href="/privacy">Privacy</a></li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div>
					</div>
          	<div class="col-lg-12 text-center">
            <?php echo $footer_banner?>
            </div>
				</div>
			</div>
		</div>

		<div class="footer-dark-1 footer-dark-b-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<h3 class="fnt-bold text-uppercase">
									<?php echo $domain?>
								</h3>
								<p>
									is a new business model, Technology, and Solution targeting the premium domain channel with a fast, affordable, high quality business creation and management platform. 
								</p>
							</div>
							<div class="col-md-3">
								<h3 class="fnt-bold text-uppercase">
									get started
								</h3>
								<ul class="list-unstyled f-a-links">
									<li>
										<a class="text-capitalize" href="/partners">
											Partner With Us
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/staffing">
											Apply Now
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/referral">
											Referral
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/fund">
											Fund
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/developers">
											Developers
										</a>
									</li>
								</ul>
							</div>
							<div class="col-md-3">
								<h3 class="fnt-bold text-uppercase">
									company
								</h3>
								<ul class="list-unstyled f-a-links f-a-links-mrgBtm">
									<li>
										<a class="text-capitalize" href="/about">
											About Us
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/terms">
											Terms
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/privacy">
											Privacy
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/contact">
											Contact Us
										</a>
									</li>
								</ul>
							</div>
							<div class="col-md-3">
								<h3 class="fnt-bold text-uppercase">
									partners
								</h3>
								<p>
									<a href="http://www.rackspace.com">
										<img src="http://c15162226.r26.cf2.rackcdn.com/Rackspace_Cloud_Company_Logo_clr_300x109.jpg" alt="Rackspace" title="Rackspace" style="height:45px;">
									</a>
								</p>
								<h3 class="fnt-bold text-uppercase">
									Socials
								</h3>
								<ul class="list-inline socials-ul">
									<li>
										<a href="http://twitter.com/linkeddotcom" class="icon-button twitter" title="twitter">
											<i class="fa fa-twitter"></i>
											<span></span>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/linkedcom" class="icon-button facebook" title="facebook">
											<i class="fa fa-facebook"></i>
											<span></span>
										</a>
									</li>
									<li>
										<a href="https://plus.google.com/+Linkedcom" class="icon-button google-plus" title="google-plus">
											<i class="fa fa-google-plus"></i>
											<span></span>
										</a>

									</li>
									<li>
										<a href="http://www.pinterest.com/linkedcom/" class="icon-button pinterest" title="pinterest">
											<i class="fa fa-pinterest"></i>
											<span></span>
										</a>
									</li>
									<li>
										<a href="http://www.linkedin.com/company/linked-com" class="icon-button linkedin" title="linkedin">
											<i class="fa fa-linkedin"></i>
											<span></span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-dark-2 footer-dark-b-2">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 f-a-links">
								&copy; <?php echo $domain?>. All Rights Reserved.
							</div>
							<div class="col-md-6">
								<ul class="list-inline text-right f-a-links">
									<li>
										<a class="text-capitalize" href="/about">
											<i class="fa fa-bookmark-o"></i>
											About us
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/terms">
											<i class="fa fa-book"></i>
											Terms
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/privacy">
											<i class="fa fa-cube"></i>
											privacy
										</a>
									</li>
									<li>
										<a class="text-capitalize" href="/contact">
											<i class="fa fa-phone-square"></i>
											contact us
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


<!-- new footer-->
<div class="footer-top" style="display:none;">
	<div class="container">
		<div class="border row">
		  <div class="border col-md-3">
			<h3><?php echo $domain?></h3>
			<p>is a proud venture of Global Ventures, LLC. Join our network of performance based companies using <?php echo $domain?>.</p>
		  </div>
		  <div class="border col-md-3">
			<h3>Get Started</h3>
			<ul class="list-unstyled">
				<li><a href="/partners">Partner With Us</a></li>
				<li><a href="/staffing">Apply Now</a></li>
				<li><a href="/referral">Referral</a></li>
				<li><a href="/fund">Fund</a></li>
				<li><a href="/developers">Developers</a></li>
			</ul>
		  </div>
		  <div class="border col-md-3">
			<h3>Company</h3>
			<ul class="list-unstyled">
				<li><a href="/about">About Us</a></li>
				<li><a href="/terms">Terms</a></li>
				<li><a href="/privacy">Privacy</a></li>
				<li><a href="/contact">Contact Us</a></li>
			</ul>
		  </div>
		  <div class="border col-md-3">
			<h3>Partners</h3>
				<a href=""><img src="http://c15162226.r26.cf2.rackcdn.com/Rackspace_Cloud_Company_Logo_clr_300x109.jpg" style="height:45px;"></a>
			<h3>Social</h3>
			<ul class="list-inline socials-ul">
											<li>
												<a title="facebook" class="icon-button facebook" href="#">
													<i class="fa fa-facebook-square"></i>
													<span></span>
												</a>
											</li>
											<li>
												<a title="google-plus" class="icon-button google-plus" href="#">
													<i class="fa fa-google-plus-square"></i>
													<span></span>
												</a>
											</li>
											<li>
												<a title="youtube" class="icon-button youtube" href="#">
													<i class="fa fa-youtube-square"></i>
													<span></span>
												</a>
											</li>
											<li>
												<a title="linkedin" class="icon-button linkedin" href="#">
													<i class="fa fa-linkedin-square"></i>
													<span></span>
												</a>
											</li>
			</ul>
		  </div>
		</div>
	</div>
</div>
<div class="footer-bottom" style="display:none;">
	<div class="container">
		<div class="border row">
		  <div class="border col-md-6">&copy; <?php echo $domain?>. All Rights Reserved.</div>
		  <div class="border col-md-6">
			  <ul class="list-inline">			
				<li><a href="/about"><i class="fa fa-bookmark-o"></i> About Us</a></li>
				<li><a href="/terms"><i class="fa fa-book"></i> Terms</a></li>
				<li><a href="/privacy"><i class="fa fa-cube"></i> Privacy</a></li>
				<li><a href="/contact"><i class="fa fa-phone-square"></i> Contact Us</a></li>
			  </ul>
		  </div>
		</div>
	</div>
</div>
<!-- new footer-->		

	</div>
  
 <!-- <div id="beforeyougo" style="display:none;" class="glue_popup">
 	<div class="glue_close" onclick="$.glue_close()">X</div>
 	<div class="glue_content">
 		<div class="wrap-pageExit-container wpec-1 wpec-item">
 			<div class="wrap-pageExit-left">
 				<h3 class="ttle">Welcome to <span class="text-capitalize"><?php echo $domain?></span></h3>
 				<p class="sub-ttle">We have been Acquired by Referrals.com.</p>
 				<p class="sub-ttle">
 					<a href="http://www.referrals.com" class="btn btn-danger btn-lg">
 						Check it out!
 					</a>
 				</p>
 			</div>
 		</div>
 	</div>
 </div> -->
<script src="<?php echo $base_url?>js/jquery.glue.min.js"></script>
<script>
	/*$(document).ready(function(){
		$.glue({
			layer: '#beforeyougo',
			maxamount:1
		});
	});*/
</script>
</body>
</html>