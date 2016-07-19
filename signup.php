<?php include 'header.php';?>
<style type="text/css">

	.working {
    background: #FFF url("images/ajax-loader.gif") no-repeat scroll right center !important;
    padding-right: 2px;
	}

	#particles-js {
		  position: absolute;
		  width: 100%;
		  height: 100%;
		  background-image: url("");
		  background-repeat: no-repeat;
		  background-size: cover;
		  background-position: 50% 50%;
	}

	#imagepreview label {
		    position: absolute;
		    z-index: 5;
		    opacity: 0.8;
		    cursor: pointer;
		    background-color: #bdc3c7;
		    width: 200px;
		    height: 50px;
		    font-size: 20px;
		    line-height: 50px;
		    text-transform: uppercase;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    margin: auto;
		    text-align: center;
	  }

	  #image_preview{
	  		padding-bottom:100px;
	  }

	  .index2{
		position:relative;
		z-index:100;"
	  }

	  .save{
	     
	     margin-left: 180px;
	  	 margin-top: 30px;
	  	 margin-bottom:30px;
	  }
	  .thanks-container {
	background: none repeat scroll 0px 0px rgba(0, 0, 0, 0.7);
	padding: 10px 40px 100px;
	border-radius: 3px;
	margin-bottom: 100px;
}

	  
</style>
	</head>	
<body>
	<div id="particles-js"></div>
		<div class="wrap-container-main-form">
			<div class="form-large wrapper">
				<div class="container">
				<!--check step 1-->
					<div class="row step1 step index2" >
						<div class="col-md-12 text-center">
							<h1 class="ttle">
								I am looking for an opportunity to
							</h1>
						</div>
						<div class="col-md-12">
							<div class="row select-type" id="choose">
								<div class="col-md-2 col-xs-8 col-sm-6 col-xs-offset-2 col-sm-offset-4 col-md-offset-3">
									<label class="type-choices">
										<h3 class="leads">Link and be a part of a thriving startup</h3>
										<input type="radio" name="choices-type" id="leads" value="Link and be a part of a thriving startup" />
									</label>
								</div>
								<div class="col-md-2 col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-6 col-md-offset-0">
									<label class="type-choices">
										<h3 class="employee">Partner with a brand</h3>
										<input type="radio" name="choices-type" id="emp" value="Partner with a brand" />
									</label>
								</div>
								<div class="col-md-2 col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-6 col-md-offset-0">
									<label class="type-choices">
										<h3 class="manager">Invest in a brand</h3>
										<input type="radio" name="choices-type" id="man" value="Invest in a brand" />
									</label>
								</div>
							</div>
							<input type="hidden" id="opportunity" name="opportunity">
						</div>
						<div class="col-md-4 col-md-offset-4">
							<div class="form-group">
								<a href="" class="btn btn-success btn-lg btn-block fnt-700 btn-step1">
									NEXT
								</a>
							</div>
						</div>
					</div>
					<!--step 2-->
					<div class="row step2 step index2">
						<div class="col-md-12 text-center">
							<h1 class="ttle">
								Create A Free Account
							</h1>
							<p class="desc">
								Create your free account at Contrib and build or join your first Startup Company. 
							</p>
						</div>
						
						<div class="col-md-4 col-md-offset-4 form-marg-top">
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Email Address *" name="emailadd" id="emailadd"/>
								<small class="emailadd-msg"></small>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="First Name *" name="fname" id="fname" />
								<small class="fname-msg"></small>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Last Name *" name="lname" id="lname" />
								<small class="lname-msg"></small>
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-lg" placeholder="Create Password *" name="cpass" id="cpass" />
								<small class="cpass-msg"></small>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-info btn-lg btn-block fnt-700 btn-step2-back">
											BACK
										</a>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-success btn-lg btn-block fnt-700 btn-step2">
											NEXT
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--check step 3-->
					<div class="row step3 step index2">
						<div class="col-md-12 text-center">
							<h1 class="ttle">
								Create A Free Account
							</h1>
							<p class="desc">
								Create your free account at Contrib and build or join your first Startup Company.
							</p>
						</div>
						<div class="col-md-4 col-md-offset-4 form-marg-top">
							<div class="form-group">
								<select class="form-control input-lg" name="scountry" id="country_id">
									<option value="">Select Country</option>
										<?php for($ci=0;$ci<sizeof($countriesarray);$ci++){ ?>											
									     <option value="<?=$countriesarray[$ci]['country_id']?>"><?=$countriesarray[$ci]['name']?></option>
									   <?php } ?>
								</select>
								<small class="scountry-msg"></small>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg " placeholder="City *" name="city" id="city" class="working" />
								<small class="city-msg"></small>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Phone (optional) " name="phone" id="phone" />
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Website (optional)" name="website" id="website" />
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-info btn-lg btn-block fnt-700 btn-step3-back">
											BACK
										</a>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-success btn-lg btn-block fnt-700 btn-step3">
											NEXT
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--step 4-->
					<div class="row step4 step index2">
						<div class="col-md-12 text-center">
							<h1 class="ttle">
								Your Industry Details
							</h1>
							<p class="desc">
								Describe as, your industry, and experience level.
							</p>
						</div>
						<div class="col-md-4 col-md-offset-4 form-marg-top">
							<div class="form-group">
								<select name="expertise" class="form-control input-lg" id="role_ids">
									<option value="">Select you expertise</option>
									<?php for ($ci=0; $ci<sizeof($rolesarray);$ci++){?>
									<option value="<?=$rolesarray[$ci]['role_id']?>"><?=$rolesarray[$ci]['role_name']?></option>
									<?php } ?>
								</select>
								<small class="expertise-msg"></small>
							</div>
							<div class="form-group">
								<select name="industry" class="form-control input-lg" id="IndustryIds">
									<option value="">Select your industry</option>
									<?php for($ci=0;$ci<sizeof($industriesarray);$ci++){ ?>											
									<option value="<?=$industriesarray[$ci]['IndustryId']?>"><?=$industriesarray[$ci]['Name']?></option>
									<?php } ?>
								</select>
								<small class="industry-msg"></small>
							</div>
							<div class="form-group">
								<label class="control-label">
									Experience level
								</label>
								

								<table class="cust-table-rating" cellspacing="0" cellpadding="5" border="0" class="ratetable">
								<tbody>
									<!--name of the experience-->
											<?php for($ci=0;$ci<sizeof($experiencesarray);$ci++) { ?>
									<tr id="skill_<?=$experiencesarray[$ci]['skill_id']?>" class="ratetr">
											<td align="center" style="border-left:1px solid #D7D7D7; border-right:1px solid #D7D7D7;">
												<span><?=$experiencesarray[$ci]['experience']?></span>
											</td>
											<!--rating tr-->
											<td align="center" class="ratetd">
												<?php for ($i=01; $i <6 ; $i++) { ?> 
													<input name="star-skill<?=$experiencesarray[$ci]['skill_id']?>"type="radio" class="star" value="<?php echo $i?>">
												 <?php } ?>
												 <input type="hidden" id="skill_id<?=$experiencesarray[$ci]['skill_id']?>" value="<?=$experiencesarray[$ci]['skill_id']?>" class="rateinput">
											</td>	
									</tr>
										<?php }?>	
										</tbody>
								</table>
						</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-info btn-lg btn-block fnt-700 btn-step4-back">
											BACK
										</a>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-success btn-lg btn-block fnt-700 btn-step4">
											NEXT
										</a>
									</div>
								</div>
							</div> <!--end of the row -->
						</div>
					</div>
					<!-- star of the step5-->
					<div class="row step4-2 step index2">
						<div class="col-md-12 text-center">
							<h1 class="ttle">
								What are you looking for
							</h1>
						</div>
						<div class="col-md-4 col-md-offset-4 form-marg-top">
							<div class="form-group">
								<select name="joingteam" class="input-lg form-control" id="joiningteam">
									<option value="1">Open to joining a team</option>
									<option value="2">Looking to build a startup from an idea</option>
								</select>
								<small class="joingteam-msg"></small>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-info btn-lg btn-block fnt-700 btn-step4-2-back">
											BACK
										</a>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-success btn-lg btn-block fnt-700 btn-step4-2">
											NEXT
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--step 6-->
						<div class="row step4-3 step index2">
							<div class="col-md-12 text-center">
								<h1 class="ttle">
									Choose a photo
								</h1>
							</div>
						<div class="col-md-4 col-md-offset-4 form-marg-top">
								 <form id="uploadimage" action="" method="post" enctype="multipart/form-data" >
										<div id="image_preview" class="wrap-userphoto-container" >
											<img id="previewing" onclick="$('#file').click()"  src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/no-photo.png" />
										</div>
										<p class="meta-desc-imgPhoto text-center" onclick="$('#file').click()">Click to add</p>
									<div id="selectImage" style="display:none;">
										<input type="file" class="btn btn-info" class="file" name="file" id="file" required/>
									</div>
										<input type="submit" class="btn btn-warning save" value="Upload" class="submit"/>
										<p class="meta-desc-imgPhoto text-center waiting">Please Wait ... </p>
										<input type="hidden" id="pic_url" name="pic_url">	
								</form>	
									 
									<div id="success"></div>                                   
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<a href="" class="btn btn-info btn-lg btn-block fnt-700 btn-step4-3-back">
												BACK
											</a>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<a href="" class="btn btn-success btn-lg btn-block fnt-700 btn-step4-3" id="save">
												NEXT
											</a>
										</div>
									</div>
							</div>
							
						</div>	
					</div>
					<!--step 7-->
					<div class="row step5 step index2">
						<div class="col-md-12 text-center">
							<h1 class="ttle">
								Almost there 
							</h1>
							<p class="desc">
								Fill 3 keywords in the inputs.
							</p>
						</div>
						<div class="col-md-4 col-md-offset-4 form-marg-top">
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Keyword *" name="keywrd1" id="keywrd1" />
								<small class="keywrd1-msg"></small>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Keyword *" name="keywrd2" id="keywrd2" />
								<small class="keywrd2-msg"></small>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Keyword *" name="keywrd3" id="keywrd3" />
								<small class="keywrd3-msg"></small>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<a href="" class="btn btn-info btn-lg btn-block fnt-700 btn-step5-back">
											BACK
										</a>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<a href="#" class="btn btn-success btn-lg btn-block fnt-700 btn-step5">
											<i class="fa fa-check"></i>
											SUBMIT
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--thank you page -->
					<br/>
					<br/>
					<br/>
					<br/>
					<div class="row step6 step index2 hide">
						<div class="col-md-12 text-center">
								<div class="col-md-8 col-md-offset-2 thanks-container">
										<img src="https://s3.amazonaws.com/assets.zipsite.net/icons/icon-thankyou-800x400.png" style="height:200px; margin:0 auto;">
										<h2>for signing up!</h2>
										<hr>
										<p>Thank you for signing up, Share <?php echo ucfirst($domain)?> with you friends to move up in Linking people, skills and opportunities.</p>
										<div class="form-group col-md-4 col-md-offset-4">
											<a href="loadbrands.php" id="oppoturnity" class="btn btn-success btn-lg btn-block fnt-700">
												<i class="fa fa-check"></i>
												Browse Opportunity now !
											</a>
										</div>
								</div>
					  	</div>
					</div>

	<script type="text/javascript"src="js/jquery.rating-short.js"></script>	
	<script type="text/javascript" src="js/jquery.rateit.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/rateit.css">
	<script type="text/javascript" src="js/nprogress/nprogress.js"></script>
	<link rel="stylesheet" type="text/css" href="js/nprogress/nprogress.css">

	<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>

	</body>

		<script>
			$(document).ready(function(){
				$('#city').keyup(function(){
					var country_name = $('#country_id option:selected').text();
					$('#city').autocomplete({
						search  : function(){$(this).addClass('working');},
						open    : function(){	
									$(this).removeClass('working');
									$('ul.ui-menu').css({'z-index':'1000','border-radius':'0','border-color':'#fff'});
								},
						source: 'http://www.contrib.com/network/autocompleteCity/'+country_name,
						minLength: 2,
						select: function (event, ui) {   
							var selectedObj = ui.item;
							var cityname = selectedObj.value;
							$('#city').text(cityname);	
							$(this).removeClass('working');
						}
					});
				});
		});						
	</script>
	
	<script type="text/javascript">
		
						$('.save').hide();
						$('.waiting').hide();

						$(document).ready(function (e) {
							$("#uploadimage").on('submit',(function(e) {
								e.preventDefault();
								$('.waiting').show();
								 NProgress.set(0.5)

							$.ajax
								({
									url: "php/image.php", 
									type: "POST",         		
									data: new FormData(this), 
									contentType: false,       
									cache: false,             
									processData:false,        
									success: function(data)   
									{	
										NProgress.done()
										$('#pic_url').val(data);
										swal("Image Loaded Succesfully!","Success", "success");
										$('.waiting').hide();
									}
									
									});
							}));


							// Function to preview image after validation
							$(function() {
							$("#file").change(function() {
								$("#message").empty(); // To remove the previous error message
									var file = this.files[0];
									var imagefile = file.type;
									var match= ["image/jpeg","image/png","image/jpg"];
								if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
								{
									$('#previewing').attr('src','https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/no-photo.png');
									swal("Invalid Image Type!","Error", "error");
									return false;
								}
								else
								{
									var reader = new FileReader();
									reader.onload = imageIsLoaded;
									reader.readAsDataURL(this.files[0]);
									$('.save').show();
									$('.meta-desc-imgPhoto').hide();
								}
								});
							});
							function imageIsLoaded(e) {
								$("#file").css("color","green");
								$('#image_preview').css("display", "block");
								$('#previewing').attr('src', e.target.result);
							};
							});


		</script>
</html>	